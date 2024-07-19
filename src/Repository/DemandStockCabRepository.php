<?php

namespace App\Repository;

use App\Entity\DemandStockCab;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DemandStockCab|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandStockCab|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandStockCab[]    findAll()
 * @method DemandStockCab[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandStockCabRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandStockCab::class);
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


    // /**
    //  * @return DemandStockCab[] Returns an array of DemandStockCab objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DemandStockCab
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
