<?php

namespace App\Repository;

use App\Entity\Ufamille;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ufamille>
 */
class UfamilleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ufamille::class);
    }

    public function getFamille($search)
    {
        $searchTerm='%'.$search.'%';
        $sql = '
         SELECT * from ufamille
          
            ';
            $params=[];
        if($search!==null){
            $sql.='WHERE ufamille.designation LIKE :search';
            $params['search']=$searchTerm;
        }
        $conn = $this->getEntityManager()->getConnection();

        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery($params);

        return $resultSet->fetchAllAssociative();
    }
}
