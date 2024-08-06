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

   
    public function getDemandes($patient = null, $service = null, $date = null, $dossier = null,$user=null)
{
    $conn = $this->getEntityManager()->getConnection();

    // Simplified SQL to fetch only high-level demand details
    $sql = "
       SELECT 
            dsc.id AS demandCabID,
            dsc.date AS date,
            dsc.di AS di,
            dsc.patient AS patient,
            dsc.ipp AS ipp
        FROM 
            demand_stock_cab dsc
          
        WHERE 
            dsc.user_created = :user
    ";

    $params = [
        'user' => $user
    ];

    // Dynamically append conditions and parameters
    if ($patient !== '' && $patient !== null) {
        $sql .= ' AND (dsc.patient LIKE :patient OR dsc.ipp LIKE :patient)';
        $params['patient'] = '%' . $patient . '%';
    }

    if ($date !== '' && $date !== null) {
        $sql .= ' AND dsc.date LIKE :date';
        $params['date'] = '%' . $date . '%';
    }

    if ($service !== '' && $service !== null) {
        $sql .= ' and dsc.demandeur_id= :dossier';
        $params['dossier'] = $service;
    }else{
        $sql .= ' and dsc.demandeur_id= :dossier';
        $params['dossier'] = $dossier;
    }

    $stmt = $conn->prepare($sql);
    $resultSet = $stmt->executeQuery($params);
    $results = $resultSet->fetchAllAssociative();

    // Calculate the total price separately
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

    // Use fetchOne() on the Result object to get the single value
    return $result->fetchOne();
    }   

    public function findProductsByDemandId($demandCabID)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "
     SELECT 
        a.id AS article_id, 
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
