<?php

namespace App\Repository;

use App\Entity\DemandeStockDet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DemandeStockDet|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandeStockDet|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandeStockDet[]    findAll()
 * @method DemandeStockDet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeStockDetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandeStockDet::class);
    }

    // /**
    //  * @return DemandeStockDet[] Returns an array of DemandeStockDet objects
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
    public function findOneBySomeField($value): ?DemandeStockDet
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
