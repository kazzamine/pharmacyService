<?php

namespace App\Repository;

use App\Entity\UvFacturecab;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\DBAL\Connection;// use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ManagerRegistry;

use \App\Service\AppService;

/**
 * @method UvFacturecab|null find($id, $lockMode = null, $lockVersion = null)
 * @method UvFacturecab|null findOneBy(array $criteria, array $orderBy = null)
 * @method UvFacturecab[]    findAll()
 * @method UvFacturecab[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UvFacturecabRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, Connection $connection, AppService  $AppService)
    {
        $this->connection = $connection;
        parent::__construct($registry, UvFacturecab::class);
        $this->registry = $registry;
        $this->appService = $AppService;
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
    //  * @return UvFacturecab[] Returns an array of UvFacturecab objects
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
    public function findOneBySomeField($value): ?UvFacturecab
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findCodeSearch($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.code = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
        ;

    }


    public function GetLastCode($cat,$avoir = null)
    {
        $date = substr(date("Y"), 2);


        /* Le dossier COurant Connecté */
        $dossier = $this->appService->getDossierCourant();

        /* Récupérer les informations de dernier code inséré dans la base de données */
        $sql = "select max(tab.code) as code , tab.id from (SELECT id, (LEFT(RIGHT(code ,9) , 6)) as code ,  RIGHT(code ,2) as annee , p_dossier_id  FROM uv_facturecab) tab where tab.annee = ? and tab.p_dossier_id = ?
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
        if($avoir) {
            $degin = "AFC";
        } else {
            $degin = "FAC";
        }

        /* Le code Actuel a Insérer pour cet enregistrement */

        $code =$degin . $cat . '-' . $dossier->getAbreviation() . '-' . substr('000000000' . (string) ltrim($Lastcode), -6) . "_" .  $date;
        $codeinbase= $this->registry->getRepository(UvFacturecab::class)->findOneBy(['code'=>$code]);
        if ($codeinbase) {
            dd('Veuilelz contacter l\'administrateur!');
        }

        return $code;
    }
    public function GetLastCodeDossier($dossier, $cat, $type = "FAC")
    {
        $date = substr(date("Y"), 2);


        /* Le dossier COurant Connecté */

        /* Récupérer les informations de dernier code inséré dans la base de données */
        $sql = "select max(tab.code) as code , tab.id from (SELECT id, (LEFT(RIGHT(code ,9) , 6)) as code ,  RIGHT(code ,2) as annee , p_dossier_id  FROM uv_facturecab) tab where tab.annee = ? and tab.p_dossier_id = ?
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

        $code = $type . $cat . '-' . $dossier->getAbreviation() . '-' . substr('000000000' . (string) ltrim($Lastcode), -6) . "_" .  $date;
        $codeinbase= $this->registry->getRepository(UvFacturecab::class)->findOneBy(['code'=>$code]);
        if ($codeinbase) {
            dd('Veuilelz contacter l\'administrateur!');
        }


        return $code;
    }


    public function GetLastCode2()
    {
        $date = substr(date("Y"), 2);


        /* Le dossier COurant Connecté */
        $dossier = $this->appService->getDossierCourant();

        /* Récupérer les informations de dernier code inséré dans la base de données */
        $sql = "select max(tab.code_proforma) as code_proforma, tab.id  from (SELECT (LEFT(RIGHT(code_proforma ,9) , 6)) as code_proforma , id,  RIGHT(code_proforma ,2) as annee , p_dossier_id  FROM uv_facturecab) tab where tab.annee = ? and tab.p_dossier_id = ?
       order by tab.id desc limit 1";
        $statement = $this->connection->prepare($sql);
        $statement->execute(array($date, $dossier->getId()));
        $getLastCode = $statement->fetch();

        $Lastcode = 1;
        if (isset($getLastCode)) {
            if (!strstr($getLastCode['code_proforma'], '/')) {
                $Lastcode = $getLastCode['code_proforma'] + 1;
            }
        }

        /* Le code Actuel a Insérer pour cet enregistrement */
        $code = "FPCP" . "-" . $dossier->getAbreviation() . "-" . substr('000000000' . (string) ltrim($Lastcode), -6) . "_" . $date;
        $codeinbase= $this->registry->getRepository(UvFacturecab::class)->findOneBy(['code'=>$code]);
        if ($codeinbase) {
            dd('Veuilelz contacter l\'administrateur!');
        }


        return $code;
    }
}
