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

    public function getDemandes($patient = null, $service = null, $date = null, $dossier = null) {
        $conn = $this->getEntityManager()->getConnection();
    
        // Start with the base SQL query
        $sql = "
            SELECT 
                dsc.id AS demandCabID,
                dsc.date AS date,
                dsc.di AS di,
                dsc.patient AS patient,
                dsc.ipp AS ipp,
                a.id AS article_id,
                a.titre AS article_name,
                dsd.qte AS quantity,
                COALESCE(um.prix, 0) AS price,
                (dsd.qte * COALESCE(um.prix, 0)) AS total_price_for_article
            FROM 
                demand_stock_cab dsc
                JOIN demande_stock_det dsd ON dsc.id = dsd.demande_cab_id
                JOIN uantenne ua ON dsc.uantenne_id = ua.id
                JOIN udepot dep ON ua.depot_id = dep.id
                JOIN p_dossier d ON dep.dossier_id = d.id   
                 JOIN uarticle a ON dsd.uarticle_id = a.id
                 JOIN umouvement_antenne um ON a.id = um.article_id
            WHERE 
                dsc.user_created = :user
                
        ";
    
        $params = [
            'user' => 122
        ];
    
        // Dynamically append conditions and parameters
        if ($patient!=='' && $patient!==null) {
            $sql .= ' AND (dsc.patient LIKE :patient OR dsc.ipp LIKE :patient)';
            $params['patient'] = '%' . $patient . '%';
        }
    
        if ($date!=='' && $date!==null ) {
            $sql .= ' AND dsc.date LIKE :date';
            $params['date'] = '%' . $date . '%';
        }
    
        if ($service!=='' && $service!==null) {
            $sql .= ' AND d.id = :dossier';
            $params['dossier'] = $service;
        }
    
       
        $sql .= ' LIMIT 10';
    
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery($params); 
        $results = $resultSet->fetchAllAssociative();
        $response = [];
        $currentDemandCabID = null;
        $demandData = [];
    
        foreach ($results as $row) {
            if ($currentDemandCabID !== $row['demandCabID']) {
                if ($currentDemandCabID !== null) {
                    $response[] = $demandData;
                }
                $demandData = [
                    'demandCabID' => $row['demandCabID'],
                    'date' => $row['date'],
                    'di' => $row['di'],
                    'patient' => $row['patient'],
                    'ipp' => $row['ipp'],
                    'articles' => [],
                    'total_price' => 0
                ];
                $currentDemandCabID = $row['demandCabID'];
            }
            if ($row['article_id']) {
                $totalPriceForArticle = $row['total_price_for_article'];
    
                $demandData['articles'][] = [
                    'article_name' => $row['article_name'],
                    'article_id' => $row['article_id'],
                    'quantity' => $row['quantity'],
                    'price' => $row['price'],
                    'total_price' => $totalPriceForArticle
                ];
    
                $demandData['total_price'] += $totalPriceForArticle;
            }
        }
    
        if ($currentDemandCabID !== null) {
            $response[] = $demandData;
        }
    
        return $response;
    }
    
    // public function getDemandes($patient=null,$service=null,$date=null,$dossier=null){
    //     $umouvementRepository = $this->entityManager->getRepository(UmouvementAntenne::class);
    //     $demandStockCabRepository = $this->entityManager->getRepository(DemandStockCab::class);

    //     $qb = $demandStockCabRepository->createQueryBuilder('dsc')
    //         ->join('dsc.uantenne', 'ua') // Join with uantenne
    //         ->join('ua.depot', 'ud') // Join with udepot
    //         ->join('ud.dossier', 'd')
    //         ->where('dsc.userCreated = :user')
    //         //->andWhere('dsc.uantenne = :antenne')
           
    //         //->setParameter('antenne', 9)
    //         ->setParameter('user', 122)
           
    //         ->setMaxResults(10);

    //         if($patient){
    //             $qb->andWhere(
    //                 $qb->expr()->orX(
    //                     $qb->expr()->like('dsc.patient', ':patient'),
    //                     $qb->expr()->like('dsc.ipp', ':patient')
    //                 )
    //             )
    //             ->setParameter('patient', '%' . $patient . '%');
    //         }
    //         if($date){
    //             $qb->andWhere('dsc.date like :date')
    //                 ->setParameter('date','%'. $date .'%');
    //         }
    //         if($service){
    //             $qb ->andWhere('d.id = :dossier')
    //             ->setParameter('dossier',$service);
    //         }
    //         $demandStockCabs = $qb->getQuery()->getResult();

    //         $response = [];

    //         // Loop through each demand stock cab
    //         foreach ($demandStockCabs as $demandStockCab) {
    //             $demandData = [
    //                 'demandCabID'=>$demandStockCab->getID(),
    //                 'date' => $demandStockCab->getDate()->format('Y-m-d'),
    //                 'di'=>$demandStockCab->getDi(),
    //                 'patient' => $demandStockCab->getPatient(),
    //                 'ipp' => $demandStockCab->getIpp(),
    //                 'articles' => [],
    //                 'total_price' => 0
    //             ];

    //             // Loop through each demand detail
    //             foreach ($demandStockCab->getDemandeStockDets() as $demandeDet) {
    //                 $article = $demandeDet->getUarticle();
    //                 $articleId = $article->getId();
    //                 $quantity = $demandeDet->getQte();
    //                 $articleName=$article->getTitre();
    //                 // Fetch the price for the current article
    //                 $umouvement = $umouvementRepository->findOneBy(['article' => $articleId]);
    //                 $price = $umouvement ? $umouvement->getPrix() : 0;

    //                 $totalPriceForArticle = $quantity * $price;
    //                 $demandData['total_price'] += $totalPriceForArticle;

    //                 $demandData['articles'][] = [
    //                     'article_name'=>$articleName,
    //                     'article_id' => $articleId,
    //                     'quantity' => $quantity,
    //                     'price' => $price,
    //                     'total_price' => $totalPriceForArticle
    //                 ];
    //             }
    //             $response[] = $demandData;
    //         }
    //         return $response;
    // }

}
