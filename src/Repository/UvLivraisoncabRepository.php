<?php

namespace App\Repository;

use App\Entity\UvLivraisoncab;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\DBAL\Connection;use Doctrine\Persistence\ManagerRegistry;
use \App\Service\AppService;

/**
 * @method UvLivraisoncab|null find($id, $lockMode = null, $lockVersion = null)
 * @method UvLivraisoncab|null findOneBy(array $criteria, array $orderBy = null)
 * @method UvLivraisoncab[]    findAll()
 * @method UvLivraisoncab[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UvLivraisoncabRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry, Connection $connection, AppService  $AppService)
    {
        $this->connection = $connection;
        $this->appService = $AppService;
        parent::__construct($registry, UvLivraisoncab::class);
    }
    public function dossierInterneCheckSigne($dossier)
    {
        $requete =  $this->createQueryBuilder('t')
        ->select('count(t.id) total')
        ->innerJoin('t.client', 'client')
        ->innerJoin('client.categorie', 'categorie')
        ->Where('t.dossier IN (:dossier)')
        ->andWhere('t.statutsig = 0')
        ->andWhere('t.active = 1')
        ->andWhere('categorie.id = 56')
        ->setParameter('dossier', $dossier)
        ->getQuery()
        ->getOneOrNullResult();
        return $requete['total'];
    }

    // /**
    //  * @return UvLivraisoncab[] Returns an array of UvLivraisoncab objects
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
    public function findOneBySomeField($value): ?UvLivraisoncab
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function GetLastCode($cat)
    {

        $date = substr(date("Y"), 2);

        /* Le dossier COurant Connecté */
        $dossier = $this->appService->getDossierCourant();

        /* Récupérer les informations de dernier code inséré dans la base de données */
        $sql = "select max(tab.code) as code , tab.id from (SELECT id ,(LEFT(RIGHT(code ,9) , 6)) as code ,  RIGHT(code ,2) as annee , p_dossier_id  FROM uv_livraisoncab) tab where tab.annee = ? and tab.p_dossier_id = ?
        order by tab.id desc limit 1";
        $statement = $this->connection->prepare($sql);
        $statement->execute(array($date, $dossier->getId()));
        $getLastCode = $statement->fetch();


        $Lastcode = 1;
        if (isset($getLastCode)) {
            if (!strstr($getLastCode['code'], '/')) {
                $Lastcode = $getLastCode['code'] + 1;
            }
        }

        /* Le code Actuel a Insérer pour cet enregistrement */

        $code = "BLV" . $cat . '-' . $dossier->getAbreviation() . "-" . substr('000000000' . (string) ltrim($Lastcode), -6) . "_" . $date;


        return $code;
    }
    public function GetLastCodeDossier($dossier, $cat)
    {

        $date = substr(date("Y"), 2);

        /* Le dossier COurant Connecté */

        /* Récupérer les informations de dernier code inséré dans la base de données */
        $sql = "select max(tab.code) as code , tab.id from (SELECT id ,(LEFT(RIGHT(code ,9) , 6)) as code ,  RIGHT(code ,2) as annee , p_dossier_id  FROM uv_livraisoncab) tab where tab.annee = ? and tab.p_dossier_id = ?
        order by tab.id desc limit 1";
        $statement = $this->connection->prepare($sql);
        $statement->execute(array($date, $dossier->getId()));
        $getLastCode = $statement->fetch();


        $Lastcode = 1;
        if (isset($getLastCode)) {
            if (!strstr($getLastCode['code'], '/')) {
                $Lastcode = $getLastCode['code'] + 1;
            }
        }

        /* Le code Actuel a Insérer pour cet enregistrement */

        $code = "BLV" . $cat . '-' . $dossier->getAbreviation() . "-" . substr('000000000' . (string) ltrim($Lastcode), -6) . "_" . $date;


        return $code;
    }
}
