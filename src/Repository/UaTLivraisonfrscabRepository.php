<?php

namespace App\Repository;

use App\Entity\UaTLivraisonfrscab;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

use Doctrine\Persistence\ManagerRegistry;
use \App\Service\AppService;

class UaTLivraisonfrscabRepository extends ServiceEntityRepository
{

    //private $session;

    public function __construct(ManagerRegistry $registry, AppService  $AppService)
    {
        $this->appService = $AppService;
        parent::__construct($registry, UaTLivraisonfrscab::class);
    }

    // public function GetLastCode($cat)
    // {
    //     $Date = substr(date("Y"), 2);


    //     /* Le dossier COurant Connecté */
    //     $dossier = $this->appService->getDossierCourant();
    //     // dump("select MAX(tab.code) as code from (SELECT (LEFT(RIGHT(code ,11) , 6)) as code ,  RIGHT(code ,4) as annee , p_dossier_id  FROM ua_t_livraisonfrscab) tab where tab.annee = ? and tab.p_dossier_id = ?");
    //     // dd(date('Y'), $dossier->getId());
    //     /* Récupérer les informations de dernier code inséré dans la base de données */
    //     $sql = "select tab.code as code , tab.id from (SELECT id ,(LEFT(RIGHT(code ,9) , 6)) as code ,  RIGHT(code ,2) as annee , p_dossier_id  FROM ua_t_livraisonfrscab) tab where tab.annee = ? and tab.p_dossier_id = ?
    //     order by tab.id desc limit 1";
    //     $statement = $this->connection->prepare($sql);
    //     $statement->execute(array($Date, $dossier->getId()));
    //     $getLastCode = $statement->fetch();

    //     $Lastcode = 1;
    //     if (isset($getLastCode)) {
    //         if (!strstr($getLastCode['code'], '/')) {
    //             $Lastcode = $getLastCode['code'] + 1;
    //         }
    //         // dump($getLastCode['code']);
    //     }

    //     /* Le code Actuel a Insérer pour cet enregistrement */


    //     $code = "BRC" . $cat . '-' . $dossier->getAbreviation() . "-" . substr('000000000' . (string) ltrim($Lastcode), -6) . "_" . $Date;

    //     // dd($code);
    //     return $code;
    // }

    // public function GetLastCodeDossier($dossier, $cat)
    // {
    //     $Date = substr(date("Y"), 2);


    //     /* Le dossier COurant Connecté */
    //     // $dossier = $this->appService->getDossierCourant();
    //     // dump("select MAX(tab.code) as code from (SELECT (LEFT(RIGHT(code ,11) , 6)) as code ,  RIGHT(code ,4) as annee , p_dossier_id  FROM ua_t_livraisonfrscab) tab where tab.annee = ? and tab.p_dossier_id = ?");
    //     // dd(date('Y'), $dossier->getId());
    //     /* Récupérer les informations de dernier code inséré dans la base de données */
    //     $sql = "select tab.code as code , tab.id from (SELECT id ,(LEFT(RIGHT(code ,9) , 6)) as code ,  RIGHT(code ,2) as annee , p_dossier_id  FROM ua_t_livraisonfrscab) tab where tab.annee = ? and tab.p_dossier_id = ?
    //     order by tab.id desc limit 1";
    //     $statement = $this->connection->prepare($sql);
    //     $statement->execute(array($Date, $dossier->getId()));
    //     $getLastCode = $statement->fetch();

    //     $Lastcode = 1;
    //     if (isset($getLastCode)) {
    //         if (!strstr($getLastCode['code'], '/')) {
    //             $Lastcode = $getLastCode['code'] + 1;
    //         }
    //         // dump($getLastCode['code']);
    //     }

    //     /* Le code Actuel a Insérer pour cet enregistrement */


    //     $code = "BRC" . $cat . '-' . $dossier->getAbreviation() . "-" . substr('000000000' . (string) ltrim($Lastcode), -6) . "_" . $Date;

    //     // dd($code);
    //     return $code;
    // }

    // public function GetLastCode2($dossier, $cat)
    // {


    //     /* Le dossier COurant Connecté */
    //     //$dossier = $this->session->get('dossierCourantUgouvAchat');

    //     /* Le dossier COurant Connecté */
    //     // $dossier = $this->appService->getDossierCourant();

    //     /* Récupérer les informations de dernier code inséré dans la base de données */
    //     $sql = "select tab.code as code , tab.id from (SELECT id, (LEFT(RIGHT(code ,9) , 6)) as code ,  RIGHT(code ,2) as annee , p_dossier_id  FROM ua_t_livraisonfrscab) tab where tab.annee = ? and tab.p_dossier_id = ?
    //     order by tab.id desc
    //     limit 1";

    //     $date = substr(date("Y"), 2);
    //     $statement = $this->connection->prepare($sql);
    //     $statement->execute(array($date, $dossier->getId()));
    //     $getLastCode = $statement->fetch();

    //     $Lastcode = 1;
    //     if (isset($getLastCode)) {
    //         if (!strstr($getLastCode['code'], '/')) {
    //             $Lastcode = $getLastCode['code'] + 1;
    //         }
    //     }

    //     /* Le code Actuel a Insérer pour cet enregistrement */

    //     $code = "BRD" . "" . $cat . '-' . $dossier->getAbreviation() . '-' .  substr('000000000' . (string) ltrim($Lastcode), -6) . "_" . $date;


    //     return $code;
    // }





    // public function GetLastCodeAvoir()
    // {

    //     $date = substr(date("Y"), 2);
    //     /* Le dossier COurant Connecté */
    //     $dossier = $this->appService->getDossierCourant();

    //     /* Récupérer les informations de dernier code inséré dans la base de données */
    //     $sql = "select tab.code as code ,tab.id from (SELECT id ,(LEFT(RIGHT(code ,9) , 6)) as code ,  RIGHT(code ,2) as annee , p_dossier_id  FROM ua_t_livraisonfrscab) tab where tab.annee = ? and tab.p_dossier_id = ?
    //     order by tab.id desc limit 1";
    //     $statement = $this->connection->prepare($sql);
    //     $statement->execute(array($date, $dossier->getId()));
    //     $getLastCode = $statement->fetch();

    //     $Lastcode = 1;
    //     if (isset($getLastCode)) {
    //         $Lastcode = $getLastCode['code'] + 1;
    //     }

    //     /* Le code Actuel a Insérer pour cet enregistrement */

    //     $code =  "BRA" . $dossier->getAbreviation() . substr('000000000' . (string) ltrim($Lastcode), -6) . "_" . $date;


    //     return $code;
    // }
    // public function findByDossierInterne($dossier)
    // {
    //     $requete = $this->createQueryBuilder('t')
    //     ->select('count(t.id) total')
    //     ->innerJoin('t.fournisseur', 'fournisseur')
    //     ->innerJoin('fournisseur.categorie', 'categorie')
    //     ->Where('t.dossier IN (:dossier)')
    //     ->andWhere('t.statutsig = 0')
    //     ->andWhere('t.active = 1')
    //     ->andWhere('categorie.id = 56')
    //     ->setParameter('dossier', $dossier)
    //     ->getQuery()
    //     ->getOneOrNullResult();
    //     return $requete['total'];
    // }
}
