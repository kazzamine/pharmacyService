<?php

namespace App\Repository;

use App\Entity\UaTLivraisonfrsdet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UaTLivraisonfrsdet|null find($id, $lockMode = null, $lockVersion = null)
 * @method UaTLivraisonfrsdet|null findOneBy(array $criteria, array $orderBy = null)
 * @method UaTLivraisonfrsdet[]    findAll()
 * @method UaTLivraisonfrsdet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UaTLivraisonfrsdetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UaTLivraisonfrsdet::class);
    }

    // /**
    //  * @return UaTLivraisonfrsdet[] Returns an array of UaTLivraisonfrsdet objects
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
    public function findOneBySomeField($value): ?UaTLivraisonfrsdet
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
