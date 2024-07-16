<?php

namespace App\Repository;

use App\Entity\Udepot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Udepot|null find($id, $lockMode = null, $lockVersion = null)
 * @method Udepot|null findOneBy(array $criteria, array $orderBy = null)
 * @method Udepot[]    findAll()
 * @method Udepot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UdepotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Udepot::class);
    }

    // /**
    //  * @return Udepot[] Returns an array of Udepot objects
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
    public function findOneBySomeField($value): ?Udepot
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
