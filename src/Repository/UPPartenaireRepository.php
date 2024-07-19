<?php
namespace App\Repository;

use App\Entity\UPPartenaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UPPartenaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UPPartenaire::class);
    }

    public function searchByName($query)
    {
        return $this->createQueryBuilder('p')
            ->where('p.societe LIKE :query')
            ->setParameter('query', '%' . $query . '%')
            ->setMaxResults(15)
            ->getQuery()
            ->getResult();
    }
}
