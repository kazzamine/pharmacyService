<?php

namespace App\Repository;

use App\Entity\PArticleNiveau;
use App\Entity\Uarticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Uarticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uarticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uarticle[]    findAll()
 * @method Uarticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UarticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Uarticle::class);
    }

    public function getArticlesByCat($dossier,$famille)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
          SELECT uarticle.id , uarticle.titre,stock_actual.quantite FROM `uarticle` 
          JOIN udepot on udepot.id = uarticle.depot_id JOIN p_dossier on p_dossier.id=udepot.dossier_id 
          JOIN stock_actual ON stock_actual.u_article_id=uarticle.id 
          WHERE 1 
          AND p_dossier.id=:dossier 
          AND uarticle.famille=:famille
          AND stock_actual.uantenne_id=9 
          AND uarticle.active=1
            ';

        $resultSet = $conn->executeQuery($sql, ['dossier' => $dossier,'famille'=>$famille]);

        return $resultSet->fetchAllAssociative();
    }

    // /**
    //  * @return Uarticle[] Returns an array of Uarticle objects
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
    public function findOneBySomeField($value): ?Uarticle
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function GetNiveau($id,$placeholder) {
        try {

            $query = $this->getEntityManager()->getRepository(PArticleNiveau::class)->findBy(['parentId'=>$id]);
            $nv = $id + 1;
            $result = "<option value =''>".$placeholder."</option>";
            foreach ($query as $key => $value) {
                $selected = ($id == $value->getId()) ? "selected='selected'" : '';
                $result .= "<option $selected value='" . $value->getId() . "'>" . $value->getDesignation() . "</option>";
            }
            return $result;
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
