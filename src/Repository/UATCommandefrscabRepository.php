<?php

namespace App\Repository;

use App\Entity\UATCommandefrscab;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\Persistence\ManagerRegistry;
use \App\Service\AppService;

class UATCommandefrscabRepository extends ServiceEntityRepository
{

    //private $session;

    public function __construct(ManagerRegistry $registry,  AppService  $AppService)
    {
        $this->appService = $AppService;
        parent::__construct($registry, UATCommandefrscab::class);
    }

//     public function GetLastCode($cat)
//     {
//         $DAte = substr(date('Y'), 2);


//         /* Le dossier COurant Connecté */
//         $dossier = $this->appService->getDossierCourant();

//         /* Récupérer les informations de dernier code inséré dans la base de données */
//         $sql = "select max(tab.code) as code , tab.id from (SELECT id, (LEFT(RIGHT(code ,9) , 6)) as code ,  RIGHT(code ,2) as annee , p_dossier_id FROM ua_t_commandefrscab) tab where tab.annee = ? and tab.p_dossier_id = ?
//         order by tab.id desc  limit 1";
//         $statement = $this->connection->prepare($sql);
//         $statement->execute(array($DAte, $dossier->getId()));
//         $getLastCode = $statement->fetch();


//         $Lastcode = 1;

//         if (isset($getLastCode)) {
//             if (!strstr($getLastCode['code'], '/')) {
//                 $Lastcode = $getLastCode['code'] + 1;
//             }
//         }

//         // dd($getLastCode['code']);

//         /* Le code Actuel a Insérer pour cet enregistrement */

//         $code = "BCD" . $cat . '-' . $dossier->getAbreviation() . "-" . substr('000000000' . (string) ltrim($Lastcode), -6) . "_" . $DAte;


//         return $code;
//     }

//     public function GetLastCodeDossier($dossier, $cat)
//     {
//         $DAte = substr(date('Y'), 2);


//         /* Le dossier COurant Connecté */
//         // $dossier = $this->appService->getDossierCourant();

//         /* Récupérer les informations de dernier code inséré dans la base de données */
//         $sql = "select max(tab.code) as code , tab.id from (SELECT id, (LEFT(RIGHT(code ,9) , 6)) as code ,  RIGHT(code ,2) as annee , p_dossier_id FROM ua_t_commandefrscab) tab where tab.annee = ? and tab.p_dossier_id = ?
//         order by tab.id desc  limit 1";
//         $statement = $this->connection->prepare($sql);
//         $statement->execute(array($DAte, $dossier->getId()));
//         $getLastCode = $statement->fetch();


//         $Lastcode = 1;

//         if (isset($getLastCode)) {
//             if (!strstr($getLastCode['code'], '/')) {
//                 $Lastcode = $getLastCode['code'] + 1;
//             }
//         }

//         // dd($getLastCode['code']);

//         /* Le code Actuel a Insérer pour cet enregistrement */

//         $code = "BCD" . $cat . '-' . $dossier->getAbreviation() . "-" . substr('000000000' . (string) ltrim($Lastcode), -6) . "_" . $DAte;


//         return $code;
//     }


//     public function GetLastCode2($dossier, $cat)
//     {


//         /* Le dossier COurant Connecté */
//         //$dossier = $this->session->get('dossierCourantUgouvAchat');

//         /* Le dossier COurant Connecté */
//         // $dossier = $this->appService->getDossierCourant();
//         $date = substr(date('Y'), 2);

//         /* Récupérer les informations de dernier code inséré dans la base de données */
//         $sql = "select max(tab.code) as code , tab.id from (SELECT id, (LEFT(RIGHT(code ,9) , 6)) as code ,  RIGHT(code ,2) as annee , p_dossier_id  FROM ua_t_commandefrscab) tab where tab.annee = ? and tab.p_dossier_id = ?
//         order by tab.id desc, tab.code desc
//         limit 1";
//         $statement = $this->connection->prepare($sql);
//         $statement->execute(array($date, $dossier->getId()));
//         $getLastCode = $statement->fetch();


//         $Lastcode = 1;
//         if (isset($getLastCode)) {
//             $Lastcode = $getLastCode['code'] + 1;
//         }

//         /* Le code Actuel a Insérer pour cet enregistrement */

//         $code = "BCD" . $cat . '-' . $dossier->getAbreviation() . "-" . substr('000000000' . (string) ltrim($Lastcode), -6) . "_" . $date;


//         return $code;
//     }



//     /* select SUM(det.quantite) as qtt from ua_t_livraisonfrsdet det
//       inner join ua_t_livraisonfrscab cab on cab.id = det.ua_t_livraisonfrscab_id
//       INNER JOIN ua_t_commandefrscab cmd on cmd.id=cab.ua_t_commandefrscab_id
//       INNER join uarticle ar on ar.id=det.u_article_id
//       left join udepot dep on dep.id=ar.depot_id
//       left join (select * from umouvement_stock  st where st.source = 'UAL' and st.dossier_id =194) tab on tab.source_id = cab.id and det.u_article_id = tab.article_id
//       where ar.gerer_en_stock=1  and tab.id is null and cab.p_dossier_id =194
//       group by det.u_article_id */

//     public function QuantiteEncoursAchat($article, $dossier): array
//     {
//         // dump( $article);

//         //s   dump( $dossier);




//         $sql = "select SUM(det.quantite) as qtt from ua_t_livraisonfrsdet det
//         inner join ua_t_livraisonfrscab cab on cab.id = det.ua_t_livraisonfrscab_id
//         INNER JOIN ua_t_commandefrscab cmd on cmd.id=cab.ua_t_commandefrscab_id
//         INNER join uarticle ar on ar.id=det.u_article_id
//         left join udepot dep on dep.id=ar.depot_id
//         left join (select * from umouvement_stock  st where st.source = 'UAL' and st.p_dossier_id =" . $dossier . ") tab on tab.source_id = cab.id and det.u_article_id = tab.article_id
//         where ar.gerer_en_stock=1  and tab.id is null and cab.p_dossier_id =" . $dossier . "
//        and det.u_article_id=" . $article . "
//         group by det.u_article_id";


//         $statement = $this->connection->prepare($sql);
//         $statement->execute();
//         $quantite = $statement->fetch();


//         if (isset($quantite)) {
//             // die("dd"); 
//         }
//         //dump($quantite);die();  
//         //  dump(  $quantite['qtt']);
//         // die;
//         //  if($quantite){
//         if ($quantite == false or $quantite['qtt'] == null) {
//             $nb['nb'] = 0;
//         } else {
//             $nb['nb'] = $quantite['qtt'];
//         }
//         // }
//         return $nb;
//     }

//     public function QuantiteEncoursVente($article, $dossier): array
//     {
//         // dump( $article);
//         //   dump( $dossier);




//         $sql = " select SUM(det.quantite) as qtt from uv_livraisondet det
//      inner join uv_livraisoncab cab on cab.id = det.uv_livraisoncab_id
//      INNER JOIN uv_commandecab dv on dv.id=cab.uv_commandecab_id
//      INNER join uarticle ar on ar.id=det.u_article_id
//      left join udepot dep on dep.id=ar.depot_id
//      left join (select * from umouvement_stock  st where st.source = 'UVL' and st.p_dossier_id =" . $dossier . ") tab on tab.source_id = cab.id and det.u_article_id = tab.article_id
//      where ar.gerer_en_stock=1  and tab.id is null and cab.p_dossier_id =" . $dossier . "
//     and det.u_article_id=" . $article . "
//      group by det.u_article_id";


//         $statement = $this->connection->prepare($sql);
//         $statement->execute();
//         $quantite = $statement->fetch();

//         if ($quantite == false or $quantite['qtt'] == null) {
//             $nb['nb'] = 0;
//         } else {
//             $nb['nb'] = $quantite['qtt'];
//         }
//         return $nb;

//         // returns an array of Product objects
//         //   return $query->getSingleResult();
//     }

//     public function ExistLivFacReg($commande,SessionInterface $session)
//     {


//         $entityManager = $this->getEntityManager();

//         $query = $entityManager->createQuery(
//             'SELECT count(liv.commande) as exist_livraison ,  count(fac.livraison) as exist_facture  , count(reg.factureFournisseur) as exist_reglement
//             FROM App\Entity\UaTLivraisonfrscab liv
//             LEFT JOIN liv.factures fac 
//             LEFT JOIN fac.tReglementfrs reg 
//             WHERE liv.commande = :commande
            
//             '
//         )->setParameter('commande', $commande);

//         // returns an array of Product objects
//         return $query->setMaxResults(1)->getOneOrNullResult();

//         //        SELECT cab.id , cab.datecommande ,   cab.code , cab.refdocasso , cab.observation , frn.societe , st.couleur , st.statut , 
//         //            case when cab.cdc = true then 'fa-check-square-o' else 'fa-square-o' end as cdc , 
//         //            case when cab.cdv = true then 'fa-check-square-o' else 'fa-square-o' end as cdv , 
//         //            case when cab.bec = true then 'fa-check-square-o' else 'fa-square-o' end as bec , 
//         //            case when cab.bev = true then 'fa-check-square-o' else 'fa-square-o' end as bev , 
//         //            SUM(det.quantite*det.prixunitaire) as MtHt , SUM(det.quantite*det.prixunitaire*((det.tva/100))) MtTva ,SUM(det.prixttc) MtTot , count(liv.commande) as exist_livraison ,  count(fac.livraison) as exist_facture  , count(reg.factureFournisseur) as exist_reglement  
//         //            
//         //            FROM App\Entity\UATCommandefrscab cab 
//         //            JOIN cab.details det
//         //            
//         //            LEFT JOIN cab.livraisons liv
//         //            LEFT JOIN liv.factures fac 
//         //            LEFT JOIN fac.tReglementfrs reg 
//         //            
//         //           
//         //            LEFT JOIN cab.fournisseur frn
//         //            LEFT JOIN cab.statut st
//         //            WHERE cab.dossier = :dossier
//         //            GROUP BY cab.id , cab.datecommande ,  cab.code , cab.refdocasso , cab.observation , frn.societe , st.couleur , st.statut , cab.cdc ,   cab.cdv , cab.bec , cab.bev 
//         //            ORDER BY cab.id DESC

//         /* Le dossier COurant Connecté */
//         $dossier = $session->get('dossierCourantUgouvAchat');

//         /* Récupérer les informations de dernier code inséré dans la base de données */
//         $sql = "select MAX(tab.code) as code from (SELECT (LEFT(RIGHT(code ,11) , 6)) as code ,  RIGHT(code ,4) as annee , p_dossier_id  FROM ua_t_commandefrscab) tab where tab.annee = ? and tab.p_dossier_id = ?";
//         $statement = $this->connection->prepare($sql);
//         $statement->execute(array(date('Y'), $dossier->getId()));
//         $getLastCode = $statement->fetch();


//         return $code;
//     }

//     public function GetMontantCommandeEtAcompte($id)
//     {
//         $sql = "SELECT cab.id , SUM(det.prixttc) montantCommande , (SUM(det.prixttc) * cab.remise)/100 as mtremise,cab.remise as remise, montantAcompte  FROM `ua_t_commandefrscab` cab 
// inner join  ua_t_commandefrsdet det on cab.id = det.ua_t_commandefrscab_id
// left join (SELECT ua_t_commandefrscab_id commande_id , SUM(montant) montantAcompte FROM `ua_t_commandefrscab_acompte` where ua_t_commandefrscab_id = :id   group by ua_t_commandefrscab_id) tab on tab.commande_id = cab.id 
// where cab.id = :id";
//         $statement = $this->connection->prepare($sql);
//         $statement->execute(array('id' => $id));
//         return $statement->fetch();
//     }

//     public function GetMontantAcompteByCommandeSansFacture($id)
//     {
//         $sql = "SELECT ua_t_commandefrscab_id commande_id , SUM(montant) montantAcompte 
//                FROM `ua_t_commandefrscab_acompte` 
//                where ua_t_commandefrscab_id = :id  and ua_t_facturefrscab_id is null   group by ua_t_commandefrscab_id";
//         $statement = $this->connection->prepare($sql);
//         $statement->execute(array('id' => $id));
//         return $statement->fetch();
//     }

//     public function GetMontantCommande($id)
//     {
//         $sql = "SELECT cab.id , SUM(det.prixttc) montantCommande , montantAcompte  FROM `ua_t_commandefrscab` cab 
// inner join  ua_t_commandefrsdet det on cab.id = det.ua_t_commandefrscab_id where cab.id = :id";
//         $statement = $this->connection->prepare($sql);
//         $statement->execute(array('id' => $id));
//         return $statement->fetch();
//     }

//     public function CheckAcompte($id)
//     {

//         $entityManager = $this->getEntityManager();

//         $query = $entityManager->createQuery(
//             'SELECT cab
//                         FROM App\Entity\UATCommandefrscabAcompte cab
//                         WHERE cab.commande = :commande and cab.reception is null and cab.facture is null 
            
//             '
//         )->setParameter('commande', $id);

//         // returns an array of Product objects
//         return $query->getResult();
//     }
//     public function findByDossierInterne($dossier)
//     {
//         $requete =  $this->createQueryBuilder('t')
//         ->select('count(t.id) total')
//         ->innerJoin('t.fournisseur', 'fournisseur')
//         ->innerJoin('fournisseur.categorie', 'categorie')
//         ->Where('t.dossier IN (:dossier)')
//         ->andWhere('t.statutsig = 0')
//         ->andWhere('t.active = 1')
//         ->andWhere('categorie.id = 56')
//         ->setParameter('dossier', $dossier)
//         ->getQuery()
//         ->getOneOrNullResult();
//         return $requete['total'];
//     }
}
