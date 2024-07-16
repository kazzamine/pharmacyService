<?php

namespace App\Repository;

use App\Entity\PProjetSous;
use App\Entity\TAchatdemandeinternecab;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\DBAL\Connection;use \App\Service\AppService;

/**
 * @method TypeUATCommandefrscab|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeUATCommandefrscab|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeUATCommandefrscab[]    findAll()
 * @method TypeUATCommandefrscab[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TAchatdemandeinternecabRepository extends ServiceEntityRepository
{

    //private $session;

    public function __construct(\Doctrine\Persistence\ManagerRegistry $registry, Connection $connection, AppService  $AppService)
    {
        $this->connection = $connection;
        $this->appService = $AppService;
        parent::__construct($registry, TAchatdemandeinternecab::class);
    }

    public function GetLastCode($cat)
    {


        /* Le dossier COurant Connecté */
        //$dossier = $this->session->get('dossierCourantUgouvAchat');

        /* Le dossier COurant Connecté */
        $dossier = $this->appService->getDossierCourant();
        $DAte = substr(date('Y'), 2);
        /* Récupérer les informations de dernier code inséré dans la base de données */
        // $sql = "select MAX(tab.code) as code from (SELECT (LEFT(RIGHT(code ,11) , 6)) as code ,  RIGHT(code ,2) as annee , p_dossier_id  FROM t_achatdemandeinternecab) tab where tab.annee = ? and tab.p_dossier_id = ?";
        $sql = "select max(tab.code) as code , id from (SELECT id ,(LEFT(RIGHT(code ,9) , 6)) as code , RIGHT(code ,2) as annee , p_dossier_id FROM t_achatdemandeinternecab) tab where tab.annee = ? and tab.p_dossier_id = ?
        ORDER BY tab.id DESC
        LIMIT 1";
        $statement = $this->connection->prepare($sql);
        $statement->execute(array($DAte, $dossier->getId()));
        $getLastCode = $statement->fetch();
        // dd($getLastCode);
        // dd($getLastCode, $DAte, $dossier->getId());

        $Lastcode = 1;
        if (isset($getLastCode)) {
            if (!strstr($getLastCode['code'], '/')) {
                $Lastcode = $getLastCode['code'] + 1;
            }
        }
        /* Le code Actuel a Insérer pour cet enregistrement */
        // $DAte = substr(date('Y'),2);

        $code = "DMA" . $cat . '-' . $dossier->getAbreviation() . "-" . substr('000000000' . (string) ltrim($Lastcode), -6) . "_" . $DAte;


        return $code;
    }

    public function GetLastCodeDossier($dossier, $cat)
    {


        /* Le dossier COurant Connecté */
        //$dossier = $this->session->get('dossierCourantUgouvAchat');

        /* Le dossier COurant Connecté */
        // $dossier = $this->appService->getDossierCourant();
        $DAte = substr(date('Y'), 2);
        /* Récupérer les informations de dernier code inséré dans la base de données */
        // $sql = "select MAX(tab.code) as code from (SELECT (LEFT(RIGHT(code ,11) , 6)) as code ,  RIGHT(code ,2) as annee , p_dossier_id  FROM t_achatdemandeinternecab) tab where tab.annee = ? and tab.p_dossier_id = ?";
        $sql = "select max(tab.code) as code , id from (SELECT id ,(LEFT(RIGHT(code ,9) , 6)) as code , RIGHT(code ,2) as annee , p_dossier_id FROM t_achatdemandeinternecab) tab where tab.annee = ? and tab.p_dossier_id = ?
        ORDER BY tab.id DESC
        LIMIT 1";
        $statement = $this->connection->prepare($sql);
        $statement->execute(array($DAte, $dossier->getId()));
        $getLastCode = $statement->fetch();
        // dd($getLastCode);
        // dd($getLastCode, $DAte, $dossier->getId());

        $Lastcode = 1;
        if (isset($getLastCode)) {
            if (!strstr($getLastCode['code'], '/')) {
                $Lastcode = $getLastCode['code'] + 1;
            }
        }
        /* Le code Actuel a Insérer pour cet enregistrement */
        // $DAte = substr(date('Y'),2);

        $code = "DMA" . $cat . '-' . $dossier->getAbreviation() . "-" . substr('000000000' . (string) ltrim($Lastcode), -6) . "_" . $DAte;

        return $code;
    }

    public function GetLastCode2($dossier, $cat)
    {


        /* Le dossier COurant Connecté */
        //$dossier = $this->session->get('dossierCourantUgouvAchat');

        /* Le dossier COurant Connecté */
        // $dossier = $this->appService->getDossierCourant();
        $DAte2 = substr(date('Y'), 2);

        /* Récupérer les informations de dernier code inséré dans la base de données */
        $sql = "select max(tab.code) as code , id from (SELECT id ,(LEFT(RIGHT(code ,9) , 6)) as code , RIGHT(code ,2) as annee , p_dossier_id FROM t_achatdemandeinternecab) tab where tab.annee = ? and tab.p_dossier_id = ?
        ORDER BY tab.id DESC
        LIMIT 1";
        $statement = $this->connection->prepare($sql);
        $statement->execute(array($DAte2, $dossier->getId()));
        $getLastCode = $statement->fetch();

        $Lastcode = 1;
        if (isset($getLastCode)) {
            $Lastcode = $getLastCode['code'] + 1;
        }

        /* Le code Actuel a Insérer pour cet enregistrement */


        $code = "DMA" . $cat . '-' . $dossier->getAbreviation() . "-" . substr('000000000' . (string) ltrim($Lastcode), -6) . "_" . $DAte2;


        return $code;
    }



    public function getDevisClient()
    {


        /* Le dossier COurant Connecté */
        $dossier = $this->appService->getDossierCourant();

        /* Récupérer les informations de dernier code inséré dans la base de données */
        $sql = "select MAX(tab.code) as code from (SELECT (LEFT(RIGHT(code ,11) , 6)) as code ,  RIGHT(code ,4) as annee , p_dossier_id  FROM t_achatdemandeinternecab) tab where tab.annee = ? and tab.p_dossier_id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute(array(date('Y'), $dossier->getId()));
        $getLastCode = $statement->fetch();

        $Lastcode = 1;
        if (isset($getLastCode)) {
            $Lastcode = $getLastCode['code'] + 1;
        }

        /* Le code Actuel a Insérer pour cet enregistrement */

        $code = $dossier->getAbreviation() . "-DM" . substr('000000000' . (string) ltrim($Lastcode), -6) . "/" . date('Y');


        return $code;
    }


    public function GetSousProjet($id, $placeholder)
    {
        try {

            $query = $this->getEntityManager()->getRepository(PProjetSous::class)->findBy(['projet' => $id]);

            $result = "<option value =''>" . $placeholder . "</option>";
            foreach ($query as $key => $value) {
                //$selected = ($id == $value->getId()) ? "selected='selected'" : '';
                $result .= "<option  value='" . $value->getId() . "'>" . $value->getDesignation() . "</option>";
            }
            return $result;
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
    public function findByDossierInterne($dossier)
    {
        $requete = $this->createQueryBuilder('t')
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
    

    /*
      public function findOneBySomeField($value): ?TypePartenaire
      {
      return $this->createQueryBuilder('t')
      ->andWhere('t.exampleField = :val')
      ->setParameter('val', $value)
      ->getQuery()
      ->getOneOrNullResult()
      ;
      }
     */
}
