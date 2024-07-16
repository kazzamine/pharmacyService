<?php

namespace App\Repository;

use App\Entity\TAchatdemandeinternedet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Connection;

class TAchatdemandeinternedetRepository extends ServiceEntityRepository {

    public function __construct(\Doctrine\Persistence\ManagerRegistry $registry, Connection $connection) {
        $this->connection = $connection;
        parent::__construct($registry, TAchatdemandeinternedet::class);
    }


   
}
