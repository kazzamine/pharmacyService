<?php

namespace App\Repository;

use App\Entity\LivraisonStockDetail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LivraisonStockDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method LivraisonStockDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method LivraisonStockDetail[]    findAll()
 * @method LivraisonStockDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivraisonStockDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LivraisonStockDetail::class);
    }

    // /**
    //  * @return LivraisonStockDetail[] Returns an array of LivraisonStockDetail objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LivraisonStockDetail
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
