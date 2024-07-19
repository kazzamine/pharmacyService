<?php

namespace App\Repository;

use App\Entity\LivraisonStockCab;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LivraisonStockCab|null find($id, $lockMode = null, $lockVersion = null)
 * @method LivraisonStockCab|null findOneBy(array $criteria, array $orderBy = null)
 * @method LivraisonStockCab[]    findAll()
 * @method LivraisonStockCab[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivraisonStockCabRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LivraisonStockCab::class);
    }

    // /**
    //  * @return LivraisonStockCab[] Returns an array of LivraisonStockCab objects
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
    public function findOneBySomeField($value): ?LivraisonStockCab
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
