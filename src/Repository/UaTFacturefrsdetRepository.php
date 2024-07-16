<?php

namespace App\Repository;

use App\Entity\UaTFacturefrsdet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UaTFacturefrsdet|null find($id, $lockMode = null, $lockVersion = null)
 * @method UaTFacturefrsdet|null findOneBy(array $criteria, array $orderBy = null)
 * @method UaTFacturefrsdet[]    findAll()
 * @method UaTFacturefrsdet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UaTFacturefrsdetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UaTFacturefrsdet::class);
    }

    // /**
    //  * @return UaTFacturefrsdet[] Returns an array of UaTFacturefrsdet objects
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
    public function findOneBySomeField($value): ?UaTFacturefrsdet
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
