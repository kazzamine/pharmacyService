<?php

namespace App\Repository;

use \App\Service\AppService;
use App\Entity\UaTFacturefrscab;

use Doctrine\DBAL\Connection;use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method UaTFacturefrscab|null find($id, $lockMode = null, $lockVersion = null)
 * @method UaTFacturefrscab|null findOneBy(array $criteria, array $orderBy = null)
 * @method UaTFacturefrscab[]    findAll()
 * @method UaTFacturefrscab[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UaTFacturefrscabRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry,  Connection $connection, AppService  $AppService)
    {
        $this->connection = $connection;
        $this->appService = $AppService;
        $this->registry = $registry;
        parent::__construct($registry, UaTFacturefrscab::class);
    }

    public function dossierInterneCheckSigne($dossier)
    {
        $requete =  $this->createQueryBuilder('t')
        ->select('count(t.id) total')
            ->innerJoin('t.fournisseur', 'fournisseur')
            ->innerJoin('fournisseur.categorie', 'categorie')
            ->Where('t.dossier IN (:dossier)')
            ->andWhere('t.statutsig = 0')
            ->andWhere('t.active = 1')
            ->andWhere('categorie.id = 56')
            ->setParameter('dossier', $dossier)
            ->getQuery()
            ->getOneOrNullResult();
            return $requete['total'];
    }


    public function GetLastCode($piece, $cat, $avoir = null)
    {

        $Date = substr(date("Y"), 2);

        /* Le dossier COurant Connecté */
        $dossier = $this->appService->getDossierCourant();

        /* Récupérer les informations de dernier code inséré dans la base de données */
        $sql = "select max(tab.code) as code , tab.id from (SELECT id ,(LEFT(RIGHT(code ,9) , 6)) as code ,  RIGHT(code ,2) as annee , dossier_id , p_piece_id  FROM ua_t_facturefrscab) tab where tab.annee = ? and tab.dossier_id = ? and p_piece_id = ? 
        order by tab.id desc limit 1";
        $statement = $this->connection->prepare($sql);
        $statement->execute(array($Date, $dossier->getId(), $piece->getId()));
        $getLastCode = $statement->fetch();

        $Lastcode = 1;
        if (isset($getLastCode)) {
            if (!strstr($getLastCode['code'], '/')) {
                $Lastcode = $getLastCode['code'] + 1;
            }
        }

        if ($avoir) {
            $degin = "AFF";
        } else {
            $degin = $piece->getCode();
        }

        $code = $degin . "" . $cat . '-' . $dossier->getAbreviation() . "-" . substr('000000000' . (string) ltrim($Lastcode), -6) . "_" . $Date;

        $codeinbase= $this->registry->getRepository(UaTFacturefrscab::class)->findOneBy(['code'=>$code]);
        if ($codeinbase) {
            dd('Veuilelz contacter l\'administrateur!');
        }


        return $code;
    }
    public function GetLastCodeDossier($dossier, $piece, $cat, $abreviation = null)
    {

        $Date = substr(date("Y"), 2);

        /* Le dossier COurant Connecté */
        // $dossier = $this->appService->getDossierCourant();

        /* Récupérer les informations de dernier code inséré dans la base de données */
        $sql = "select max(tab.code) as code , tab.id from (SELECT id ,(LEFT(RIGHT(code ,9) , 6)) as code ,  RIGHT(code ,2) as annee , dossier_id , p_piece_id  FROM ua_t_facturefrscab) tab where tab.annee = ? and tab.dossier_id = ? and p_piece_id = ? 
        order by tab.id desc limit 1";
        $statement = $this->connection->prepare($sql);
        $statement->execute(array($Date, $dossier->getId(), $piece->getId()));
        $getLastCode = $statement->fetch();

        $Lastcode = 1;
        if (isset($getLastCode)) {
            if (!strstr($getLastCode['code'], '/')) {
                $Lastcode = $getLastCode['code'] + 1;
            }
        }

        if (!$abreviation) {
            $abreviation = $piece->getCode();
        }
        $code = $abreviation . "" . $cat . '-' . $dossier->getAbreviation() . "-" . substr('000000000' . (string) ltrim($Lastcode), -6) . "_" . $Date;

        $codeinbase= $this->registry->getRepository(UaTFacturefrscab::class)->findOneBy(['code'=>$code]);
        if ($codeinbase) {
            dd('Veuilelz contacter l\'administrateur!');
        }

        return $code;
    }


    public function GetLastCode2($piece, $dossier, $cat)
    {


        /* Le dossier COurant Connecté */
        //$dossier = $this->session->get('dossierCourantUgouvAchat');

        /* Le dossier COurant Connecté */
        // $dossier = $this->appService->getDossierCourant();
        $Date = substr(date("Y"), 2);

        /* Récupérer les informations de dernier code inséré dans la base de données */
        $sql = "select max(tab.code) as code , tab.id from (SELECT id , (LEFT(RIGHT(code ,9) , 6)) as code ,  RIGHT(code ,2) as annee , dossier_id  FROM ua_t_facturefrscab) tab where tab.annee = ? and tab.dossier_id = ?
        order by tab.id desc 
        limit 1";
        $statement = $this->connection->prepare($sql);
        $statement->execute(array($Date, $dossier->getId()));
        $getLastCode = $statement->fetch();

        // dd($getLastCode);

        $Lastcode = 1;
        if (isset($getLastCode)) {
            if (!strstr($getLastCode['code'], '/')) {
                $Lastcode = $getLastCode['code'] + 1;
            }
        }
        // dd($Date, $dossier->getId());


        /* Le code Actuel a Insérer pour cet enregistrement */


        $code = $piece->getCode() . "" . $cat . '-' . $dossier->getAbreviation() . "-" .  substr('000000000' . (string) ltrim($Lastcode), -6) . "_" .  $Date;
        // $code = 'FAFEE-CAS-RCD-001291_22';

        $codeinbase= $this->registry->getRepository(UaTFacturefrscab::class)->findOneBy(['code'=>$code]);
        if ($codeinbase) {
            dd('Veuilelz contacter l\'administrateur!');
        }

        return $code;
    }





    //        public function GetLastCode() {
    //
    //
    //        /* Le dossier COurant Connecté */
    //        $dossier = $this->appService->getDossierCourant();
    //
    //        /* Récupérer les informations de dernier code inséré dans la base de données */
    //        $sql = "select MAX(tab.code) as code from (SELECT (LEFT(RIGHT(code ,11) , 6)) as code ,  RIGHT(code ,4) as annee , dossier_id  FROM ua_t_facturefrscab) tab where tab.annee = ? and tab.dossier_id = ?";
    //        $statement = $this->connection->prepare($sql);
    //        $statement->execute(array(date('Y'), $dossier->getId()));
    //        $getLastCode = $statement->fetch();
    //
    //        $Lastcode = 1;
    //        if (isset($getLastCode)) {
    //            $Lastcode = $getLastCode['code'] + 1;
    //        }
    //
    //        /* Le code Actuel a Insérer pour cet enregistrement */
    //
    //        $code = $dossier->getAbreviation() . "-FAF" . substr('000000000' . (string) ltrim($Lastcode), -6) . "/" . date('Y');
    //
    //
    //        return $code;
    //    }


    public function XYX($code)
    {
        dd($code);
        return $this->createQueryBuilder('c')
            // ->select('c')
            ->leftJoin('c.operation', "operation")
            // ->innerJoin('c.devise', "devise")
            ->andWhere('operation.code = :code')
            ->setParameter('code', $code)
            ->getQuery()
            ->getResult();
    }
    public function GetLastCodeAvoir()
    {

        $date  = substr(date("Y"), 2);
        /* Le dossier COurant Connecté */
        $dossier =  $this->appService->getDossierCourant();

        /* Récupérer les informations de dernier code inséré dans la base de données */
        $sql = "select max(tab.code) as code , tab.id from (SELECT  id ,(LEFT(RIGHT(code ,9) , 6)) as code ,  RIGHT(code ,2) as annee , dossier_id  FROM ua_t_facturefrscab) tab where tab.annee = ? and tab.dossier_id = ?
        order by tab.id desc 
        limit 1";
        $statement = $this->connection->prepare($sql);
        $statement->execute(array($date, $dossier->getId()));
        $getLastCode = $statement->fetch();

        $Lastcode = 1;
        if (isset($getLastCode)) {
            $Lastcode = $getLastCode['code'] + 1;
        }

        /* Le code Actuel a Insérer pour cet enregistrement */

        $code = "FAFA" . "" . $dossier->getAbreviation() .  substr('000000000' . (string) ltrim($Lastcode), -6) . "_" . $date;
    //   $code = 'FAFEE-CAS-RCD-001291_22';
        $codeinbase= $this->registry->getRepository(UaTFacturefrscab::class)->findOneBy(['code'=>$code]);
        if ($codeinbase) {
            dd('Veuilelz contacter l\'administrateur!');
        }

        return $code;
    }

   
    public function getFacturesWithBordreau()
    {
        return $this->createQueryBuilder('c')
            ->where('c.comptaCharge = 0')
            ->andWhere('c.codeBrd is not NULL')
            ->orderBy('c.dateBrd', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function GetLastCodeBRD() {
        /* Le dossier COurant Connecté */
        $dossier = $this->appService->getDossierCourant();
        /* Récupérer les informations de dernier code inséré dans la base de données */
        $sql = "select max(tab.code_brd) as code_brd , tab.id from (SELECT id ,(LEFT(RIGHT(code_brd ,9) , 6)) as code_brd ,  RIGHT(code_brd ,2) as annee , dossier_id   FROM ua_t_facturefrscab) tab 
        where tab.annee = ? and tab.dossier_id = ? 
        order by tab.code_brd desc limit 1";
        // where tab.annee = ? and tab.dossier_id = ? 
        $date = substr(date("Y"),2);

        $statement = $this->connection->prepare($sql);
        $statement->execute(array($date, $dossier->getId()));
        $getLastCode = $statement->fetch();

        // dd($getLastCode);
        // dd($dossier->getAbreviation());

        $Lastcode = 1;
        if (isset($getLastCode)) {
            if (!strstr($getLastCode['code_brd'], '/'))
            {
                $Lastcode = $getLastCode['code_brd'] + 1;                
            }
        }
    
        
        $MP = 'BRD-';
        // dd($cat);
       
        $code = $MP .$dossier->getAbreviation() . "-" . substr('0000000000' . (string) ltrim($Lastcode), -6) . "_" . $date;
        // $codeinbase= $this->registry->getRepository(UaTFacturefrscab::class)->findOneBy(['code'=>$code]);
        // if ($codeinbase) {
        //     dd('Veuilelz contacter l\'administrateur!');
        // }
    
        return $code;
    }

}
