<?php

namespace App\Repository;

use App\Entity\Uantenne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UmouvementStockEncours|null find($id, $lockMode = null, $lockVersion = null)
 * @method UmouvementStockEncours|null findOneBy(array $criteria, array $orderBy = null)
 * @method UmouvementStockEncours[]    findAll()
 * @method UmouvementStockEncours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UantenneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Uantenne::class);
    }
    
    
      
    // /**
    //  * @return UmouvementStockEncours[] Returns an array of UmouvementStockEncours objects
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
    public function findOneBySomeField($value): ?UmouvementStockEncours
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
