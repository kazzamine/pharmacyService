<?php

namespace App\Repository;

use App\Entity\DemandStockCab;
use App\Entity\UmouvementAntenne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DemandStockCab|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandStockCab|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandStockCab[]    findAll()
 * @method DemandStockCab[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandStockCabRepository extends ServiceEntityRepository
{
    private $entityManager;
    public function __construct(ManagerRegistry $registry,EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, DemandStockCab::class);
        $this->entityManager=$entityManager;   
    }


    public function getPatientDemands(){
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
               SELECT demand_stock_cab.ipp,demand_stock_cab.patient,demand_stock_cab.date ,COUNT(demande_stock_det.demande_cab_id) as total
                FROM demand_stock_cab
                JOIN demande_stock_det on demande_stock_det.demande_cab_id=demand_stock_cab.id
                JOIN uarticle on uarticle.id=demande_stock_det.uarticle_id
                JOIN umouvement_antenne on umouvement_antenne.article_id=uarticle.id
                JOIN udepot on udepot.id=uarticle.depot_id
                WHERE 1
                AND udepot.dossier_id=173
                GROUP BY demand_stock_cab.ipp,demand_stock_cab.patient,demand_stock_cab.date
                LIMIT 50  
            ';

        $resultSet = $conn->executeQuery($sql);

        return $resultSet->fetchAllAssociative();
    }
   
    public function getDemandes($patient = null, $service = null, $date = null, $dossier = null, $user = null, $limit = 28, $offset = 0)
    {
        $qb = $this->entityManager->createQueryBuilder()
            ->select('dsc.id AS demandCabID', 'dsc.date', 'dsc.di', 'dsc.patient', 'dsc.ipp')
            ->from('App\Entity\DemandStockCab', 'dsc')
            ->orderBy('dsc.id', 'DESC')
            ->setMaxResults($limit)
            ->setFirstResult($offset);

        if (!empty($patient)) {
            $qb->andWhere('dsc.patient LIKE :patient OR dsc.ipp LIKE :patient OR dsc.di LIKE :patient')
            ->setParameter('patient', '%' . $patient . '%');
        }

        if (!empty($date)) {
            $qb->andWhere('dsc.date LIKE :date')
            ->setParameter('date', '%' . $date . '%');
        }

        if (!empty($service)) {
            $qb->andWhere('dsc.demandeur = :service')
            ->setParameter('service', $service);
        }

        $results = $qb->getQuery()->getArrayResult();

        foreach ($results as &$row) {
            $row['total_price'] = $this->calculateTotalPriceForDemand($row['demandCabID']);
        }

        return $results;
    }

    private function calculateTotalPriceForDemand($demandCabID)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "
        SELECT 
            SUM(ROUND(dsd.qte * COALESCE(um.prix, 0), 2)) AS total_price
            FROM 
                demande_stock_det dsd
            JOIN 
                uarticle a ON dsd.uarticle_id = a.id
            JOIN 
                (
                    SELECT 
                        um.article_id, 
                        MIN(um.prix) AS prix 
                    FROM 
                        umouvement_antenne um
                    JOIN 
                        demand_stock_cab dsc ON um.antenne_id = dsc.uantenne_id
                    WHERE 
                        dsc.id = :demandCabID
                    GROUP BY 
                        um.article_id
                ) um ON a.id = um.article_id
            WHERE 
                dsd.demande_cab_id = :demandCabID;
        ";

        $stmt = $conn->prepare($sql);
        $result = $stmt->executeQuery(['demandCabID' => $demandCabID]);

        return $result->fetchOne();
    }   

    public function findProductsByDemandId($demandCabID)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "
                SELECT 
                    a.id AS article_id, 
                    a.image as article_image,
                    a.titre AS article_name, 
                    dsd.qte AS quantity, 
                    ROUND(MIN(COALESCE(um.prix, 0)),2) AS price, 
                    ROUND(MIN(dsd.qte * COALESCE(um.prix, 0)), 2) AS total_price_for_article 
                FROM 
                    demande_stock_det dsd 
                JOIN 
                    demand_stock_cab dsc ON dsc.id = dsd.demande_cab_id 
                JOIN 
                    uarticle a ON dsd.uarticle_id = a.id 
                JOIN 
                    umouvement_antenne um ON a.id = um.article_id 
                WHERE 
                    dsd.demande_cab_id = :demandCabID 
                    AND um.antenne_id = dsc.Uantenne_id
                GROUP BY 
                    a.id, 
                    a.titre, 
                    dsd.qte;
        ";
        $stmt = $conn->prepare($sql);
        $result = $stmt->executeQuery(['demandCabID' => $demandCabID]);

        return $result->fetchAllAssociative();
    }

}
