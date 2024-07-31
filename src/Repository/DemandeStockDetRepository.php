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

   
}
