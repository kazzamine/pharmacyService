<?php

namespace App\Repository;

use App\Entity\DemandStockCab;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DemandStockCab|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandStockCab|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandStockCab[]    findAll()
 * @method DemandStockCab[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandStockCabRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandStockCab::class);
    }

    // /**
    //  * @return DemandStockCab[] Returns an array of DemandStockCab objects
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
    public function findOneBySomeField($value): ?DemandStockCab
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
