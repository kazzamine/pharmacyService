<?php

namespace App\Entity;

use App\Entity\PConditionReglement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PConditionReglement|null find($id, $lockMode = null, $lockVersion = null)
 * @method PConditionReglement|null findOneBy(array $criteria, array $orderBy = null)
 * @method PConditionReglement[]    findAll()
 * @method PConditionReglement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PConditionReglementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PConditionReglement::class);
    }

    // /**
    //  * @return PConditionReglement[] Returns an array of PConditionReglement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PConditionReglement
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
