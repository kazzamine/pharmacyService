<?php

namespace App\Repository;

use App\Entity\GrsEmploye;
use App\Entity\PDepartement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PDepartement|null find($id, $lockMode = null, $lockVersion = null)
 * @method PDepartement|null findOneBy(array $criteria, array $orderBy = null)
 * @method PDepartement[]    findAll()
 * @method PDepartement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PDepartementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PDepartement::class);
    }

    // /**
    //  * @return PDepartement[] Returns an array of PDepartement objects
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
    public function findOneBySomeField($value): ?PDepartement
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function GetDepartement($id) {
        try {

            $query = $this->getEntityManager()->getRepository(PDepartement::class)->findAll();

            $result = "<option value =''>Choix departement ...</option>";
            foreach ($query as $key => $value) {
                $selected = ($id == $value->getId()) ? "selected='selected'" : '';
                $result .= "<option $selected value='" . $value->getId() . "'>" . $value->getDesignation() . "</option>";
            }
            return $result;
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
    public function GetEmploye($pDepartement, $id) {
        try {
            $query = $this->getEntityManager()->getRepository(GrsEmploye::class)->findBy(array('departement' => $pDepartement, 'active' => 1));
            $result = "<option value =''>Choix employe ...</option>";
            foreach ($query as $key => $value) {
                $selected = ($id == $value->getId()) ? "selected='selected'" : '';
                $result .= "<option $selected value='" . $value->getId() . "'>" . $value->getNom() . "</option>";
            }
            return $result;
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
