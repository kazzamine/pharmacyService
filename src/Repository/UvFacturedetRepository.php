<?php

namespace App\Repository;

use App\Entity\UvFacturedet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UvFacturedet|null find($id, $lockMode = null, $lockVersion = null)
 * @method UvFacturedet|null findOneBy(array $criteria, array $orderBy = null)
 * @method UvFacturedet[]    findAll()
 * @method UvFacturedet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UvFacturedetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UvFacturedet::class);
    }

    // /**
    //  * @return UvFacturedet[] Returns an array of UvFacturedet objects
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
    public function findOneBySomeField($value): ?UvFacturedet
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
