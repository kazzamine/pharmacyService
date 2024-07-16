<?php

namespace App\Repository;

use App\Entity\UvCommandedet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UvCommandedet|null find($id, $lockMode = null, $lockVersion = null)
 * @method UvCommandedet|null findOneBy(array $criteria, array $orderBy = null)
 * @method UvCommandedet[]    findAll()
 * @method UvCommandedet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UvCommandedetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UvCommandedet::class);
    }

    // /**
    //  * @return UvCommandedet[] Returns an array of UvCommandedet objects
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
    public function findOneBySomeField($value): ?UvCommandedet
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
