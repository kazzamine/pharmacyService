<?php

namespace App\Repository;

use App\Entity\PDossier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PDossier>
 */
class PDossierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PDossier::class);
    }

    public function getDossierByUser($userId){
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
           SELECT dossier.id as dossierID, dossier.nom_dossier as dossierName FROM `p_dossier` dossier
            JOIN udepot depot on dossier.id=depot.dossier_id
            JOIN uantenne antenne on antenne.depot_id=depot.id
            JOIN user_antenne uant on uant.uantenne_id=antenne.id
            JOIN puser user on user.id=uant.user_id
            WHERE user.id= :userId
            AND dossier.active=1
            GROUP BY dossierName,dossierID;
            ';

        $resultSet = $conn->executeQuery($sql, ['userId' => $userId]);

        return $resultSet->fetchAllAssociative();
    }

//    /**
//     * @return PDossier[] Returns an array of PDossier objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PDossier
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
