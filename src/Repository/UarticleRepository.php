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
