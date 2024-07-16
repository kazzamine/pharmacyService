<?php

namespace App\Repository;

use App\Entity\UvLivraisondet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UvLivraisondet|null find($id, $lockMode = null, $lockVersion = null)
 * @method UvLivraisondet|null findOneBy(array $criteria, array $orderBy = null)
 * @method UvLivraisondet[]    findAll()
 * @method UvLivraisondet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UvLivraisondetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UvLivraisondet::class);
    }

    // /**
    //  * @return UvLivraisondet[] Returns an array of UvLivraisondet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UvLivraisondet
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
