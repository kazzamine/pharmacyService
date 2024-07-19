<?php

namespace App\Repository;

use App\Entity\TAchatdemandeinternedet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class TAchatdemandeinternedetRepository extends ServiceEntityRepository {

    //private $session;

    public function __construct(\Doctrine\Persistence\ManagerRegistry $registry) {
        parent::__construct($registry, TAchatdemandeinternedet::class);
    }


}
