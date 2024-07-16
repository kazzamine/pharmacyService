<?php

namespace App\Service;


class AppService {

//     private $twig;

//     public function __construct( Environment $twig, Breadcrumbs $breadcrumbs) {

//         $this->twig = $twig;
//         $this->breadcrumbs = $breadcrumbs;
//     }


//     public function getStatut($position) {
//         $statut="";
//                 if($position=='creer'){
//                     $statut='crée';
//                 }
             
//                 elseif($position=='valider'){
//                     $statut='validée';
//                 }
//                 elseif($position=='commander'){
//                     $statut='commandée';

//                 }
//                 elseif($position=='generer'){
//                     $statut='généré';

//                 }
//                 elseif($position=='livrer'){
//                     $statut='livrée';

//                 }
//                 elseif($position=='cloturer'){
//                     $statut='clôturer';

//                 }
//                 elseif($position=='annuler'){
//                     $statut='annulée';

//                 }
                
//                 elseif($position=='achat_demande_paiement'){
//                     $statut='demande paiement';
//                 }
//                 elseif($position=='vente_valider'){
//                     $statut='validée';
//                 }
//                 elseif($position=='achat_valider'){
//                     $statut='validée';
//                 }
//                 elseif($position=='achat_generer'){
//                     $statut='généré';
//                 }
//                 elseif($position=='vente_generer'){
//                     $statut='généré';
//                 }
//                 elseif($position=='mouvement_generer'){
//                     $statut='généré';
//                 }
//                 elseif($position=='mouvement_valider'){
//                     $statut='validée';
//                 }
//         return $statut;
//             }

//     public function getDossiers(SessionInterface $session) {
//      //   dump($this->session);
//        // die;
//         if (!$session->get('dossiers')) {
//             throw $this->createNotFoundException('Dossiers Not Existes');
//         } else {
//             return $session->get('dossiers');
//         }
//     }

//     public function getDossiersIds($modulePrefix,SessionInterface $session) {
// //        dump($this->session->get('dossiers'));
// //        die();
//         $ids = array();
//         foreach ($session->get('dossiers') as $key => $dossier) {
//             if (isset($dossier['modules'])) {
//                 foreach ($dossier['modules'] as $key => $module) {
//                     if ($module['prefix'] == $modulePrefix) {

//                         //echo $modulePrefix.'  '.$dossier['id']; 
//                         array_push($ids, $dossier['id']);
//                     }
//                 }
//             }
//         }
//         //die();
//         return $ids;
//     }

//     public function getDossierCourant(SessionInterface $session) {
//         if (!$session->get('dossierCourant')) {
//             throw $this->createNotFoundException('Dossier courant non trouvé');
//         } else {
//             return $session->get('dossierCourant');
//         }
//     }


//     public function getSousModule($module, $sousModule) {
//         $dossiers = $this->getDossiers();
//         $dc = $this->getDossierCourant();
//         //dump($dossiers[$dc->getPrefix()]);
//         //die;
//         if (!isset($dossiers[$dc->getPrefix()]['modules'][$module]['sousModules'][$sousModule])) {
//             $htmlContents = $this->twig->render('error/error.html.twig');
//             echo $htmlContents;
//             die();
//         } else {
           
            
           
//             return $dossiers[$dc->getPrefix()]['modules'][$module]['sousModules'][$sousModule];
//         }
//     }



//     public function getOperations($module, $sousModule, $operation, $Breadcrumbs) {
//         $dossiers = $this->getDossiers();
//         $dc = $this->getDossierCourant();

//         if (!isset($dossiers[$dc->getPrefix()]['modules'][$module]['sousModules'][$sousModule]['operations'][$operation])) {
//             $htmlContents = $this->twig->render('error/error.html.twig');
//             echo $htmlContents;
//             die();
//         } else {
           
//             $this->getBreadcrumbs($module, $sousModule, $operation, $Breadcrumbs);
           
//             return $dossiers[$dc->getPrefix()]['modules'][$module]['sousModules'][$sousModule]['operations'];
//         }
//     }


//     public function getOperationsParametrage($module, $sousModule, $operation, $Breadcrumbs,$object) {
//         $dossiers = $this->getDossiers();
//         $dc = $this->getDossierCourant();
// //        dump($dossiers[$dc->getPrefix()]['modules'][$module]['sousModules']);
// //        die;
//         if (!isset($dossiers[$dc->getPrefix()]['modules'][$module]['sousModules'][$sousModule]['operations'][$operation])) {
//             $delete = 0;
//             if (isset($dossiers[$dc->getPrefix()]['modules'][$module]['sousModules'][$sousModule]['operations']['_delete'])) {
//                 $delete=1;
//             }
//             $htmlContents = $this->twig->render('error/errorparametrage.html.twig', [
//                 'object' => $object,
//                 'delete'=>$delete
//             ]);
//             echo $htmlContents;
//             die();
//         } else {
//             $this->getBreadcrumbs($module, $sousModule, $operation, $Breadcrumbs);
//             return $dossiers[$dc->getPrefix()]['modules'][$module]['sousModules'][$sousModule]['operations'];
//         }
//     }

//     public function getBreadcrumbs($module, $sousModule, $operation, $Breadcrumbs) {
//         $dossiers = $this->getDossiers();
//         $dc = $this->getDossierCourant();
//         $Bcrumbs = $existParam1 = null;

//         if (is_array($Breadcrumbs)) {
//             $Bcrumbs = $Breadcrumbs[0];
//             $existParam1 = $Breadcrumbs[1];
//         } else {
//             $Bcrumbs = $Breadcrumbs;
//         }

//         $mc = $dossiers[$dc->getPrefix()]['modules'][$module];
//         $smc = $dossiers[$dc->getPrefix()]['modules'][$module]['sousModules'][$sousModule];
//         $opc = $dossiers[$dc->getPrefix()]['modules'][$module]['sousModules'][$sousModule]['operations'][$operation];
//       //  dump($dossiers[$dc->getPrefix()]['modules'][$module]);
//        // die;
//         if ($Breadcrumbs == true) {
//             $mc = $dossiers[$dc->getPrefix()]['modules'][$module];
//          //  dump($mc);

//         // die; 
//         // $this->breadcrumbs->prependRouteItem("Applications"/*, "solutions"*/);

//             $this->breadcrumbs->addItem("Applications"/*, "solutions"*/);

//             // $this->breadcrumbs->addRouteItem($mc['titre'], $mc['route']);
//             $this->breadcrumbs->addItem($mc['titre']);
         
//            // $this->breadcrumbs->addRouteItem($smc['titre'], $smc['route']);
//            $this->breadcrumbs->addItem($smc['titre']);

//             if ($existParam1 != null) {
//                 $this->breadcrumbs->addItem($existParam1.' > '.$opc['titre']);
//             }else {
//                $this->breadcrumbs->addItem($opc['titre']);  
//             }
           
//         }
//     }




 
//     public function getRestCommandeVente (UATCommandefrscabRepository $rep,$commande){
        
     

            
//         $dc = $this->getDossierCourant();
//         $array_data = array();
//         $prixHtReste = 0;
//         $prixTotalTtcReste = 0;
//         $prixRemiseReste = 0;
//         $prixTvaReste = 0;

//         foreach ($commande->getDetails() as $key => $detailscommande) {


//             $array_data[$key]['id'] = $detailscommande->getArticle()->getId();
//             $array_data[$key]['titre'] = $detailscommande->getArticle()->getTitre();
//             if ($detailscommande->getArticle()->getGererEnStock() == true) {
//                 $array_data[$key]['gerer'] = 'Oui';
//             } else {
//                 $array_data[$key]['gerer'] = 'Non';
//             }
//             $somme = 0;
//             //    dump($detailscommande->getArticle()->getUmouvementStocks());
//             //  die;
//             foreach ($detailscommande->getArticle()->getUmouvementStocks() as $key1 => $mouv) {
//                 //   dump($detailscommande->getArticle());
//                 if ($mouv->getDossier()->getId() == $dc->getId()) {
//                     $somme += $mouv->getQuantite() * $mouv->getAjoSup();
//                 }
//             }
//             $array_data[$key]['code'] =  $detailscommande->getArticle()->getCode();
//             $array_data[$key]['somme'] =  $somme;

//             $array_data[$key]['prixUnitaire'] = $detailscommande->getPrixUnitaire();
//             $array_data[$key]['tva'] = $detailscommande->getTva();
//             $array_data[$key]['quantite'] = $detailscommande->getQuantite();
//             $array_data[$key]['remise'] = $detailscommande->getRemise();

           
//             $quantiteLivre =$commande->getQuantiteLivre($detailscommande);
             

//             $array_data[$key]['quantiteEncoursVente'] =  $rep->QuantiteEncoursVente($detailscommande->getArticle()->getId(), $dc->getId())['nb'];
//             $array_data[$key]['quantiteEncoursAchat'] =  $rep->QuantiteEncoursAchat($detailscommande->getArticle()->getId(), $dc->getId())['nb'];
//         //    die;

//             $array_data[$key]['quantiteLivre'] = $quantiteLivre;
//             $reste = $detailscommande->getQuantite() - $quantiteLivre;
//             $array_data[$key]['reste'] = $reste;

//             $UvCommandedet = new UvCommandedet();
//             $UvCommandedet->setQuantite($reste);
//             $UvCommandedet->setPrixUnitaire($detailscommande->getPrixUnitaire());
//             $UvCommandedet->setTva($detailscommande->getTva());
//             $UvCommandedet->setRemise($detailscommande->getRemise());
//             $prixHtReste = $prixHtReste + $UvCommandedet->getPrixHt();
//             $prixTvaReste = $prixTvaReste + $UvCommandedet->getPrixTva();
//             $prixRemiseReste = $prixRemiseReste + $UvCommandedet->getPrixRemise();
//             $prixTotalTtcReste = $prixTotalTtcReste + $UvCommandedet->getPrixTTcAvecRemise();
//         }
//         //  die;

//         $data = serialize($array_data);
        
//         $dataSerialize['array_data'] = $array_data;
//         $dataSerialize['dataSerialize'] = htmlentities($data);
//         $dataSerialize['prixHtReste']=   number_format((float)$prixHtReste, 2) . ' ' . $commande->getDevise()->getDesignation();
//         $dataSerialize['prixTvaReste']=  number_format((float)$prixTvaReste, 2) . ' ' . $commande->getDevise()->getDesignation();
//         $dataSerialize['prixRemiseReste']= $prixRemiseReste != 0 ? number_format((float)$prixRemiseReste, 2) . ' ' . $commande->getDevise()->getDesignation() : null;
//         $dataSerialize['prixTotalTtcReste']= number_format((float)$prixTotalTtcReste, 2) . ' ' . $commande->getDevise()->getDesignation();

//         //dump($data);die();

//         return  $dataSerialize;

 
//     }   





//     public function getRestCommandeAchat (UATCommandefrscabRepository $rep,$commande){
        
     

     
//         $dc = $this->getDossierCourant();
      

//         $array_data = array();
//         $prixHtReste = 0;
//         $prixTotalTtcReste = 0;
//         $prixRemiseReste = 0;
//         $prixTvaReste = 0;


//         foreach ($commande->getDetails() as $key => $detailsCommande) {

//             $array_data[$detailsCommande->getArticle()->getId()]['id'] = $detailsCommande->getArticle()->getId();
//             $array_data[$detailsCommande->getArticle()->getId()]['titre'] = $detailsCommande->getArticle()->getTitre();

//             $array_data[$detailsCommande->getArticle()->getId()]['prixUnitaire'] = $detailsCommande->getPrixUnitaire();
//             $array_data[$detailsCommande->getArticle()->getId()]['tva'] = $detailsCommande->getTva();
//             $array_data[$detailsCommande->getArticle()->getId()]['quantite'] = $detailsCommande->getQuantite();

//             if ($detailsCommande->getArticle()->getGererEnStock() == 1) {
//                 $array_data[$detailsCommande->getArticle()->getId()]['gerer'] = 'Oui';
//             } else {
//                 $array_data[$detailsCommande->getArticle()->getId()]['gerer'] = 'Non';
//             }


//             $somme = 0;

//             foreach ($detailsCommande->getArticle()->getUmouvementStocks() as $key1 => $mouv) {
//                 if ($mouv->getDossier()->getId() == $dc->getId()) {
//                     $somme += $mouv->getQuantite() * $mouv->getAjoSup();
//                 }
//             }


//             $array_data[$detailsCommande->getArticle()->getId()]['quantiteEncoursVente'] = $rep->QuantiteEncoursVente($detailsCommande->getArticle()->getId(), $dc->getId())['nb'];
//             $array_data[$detailsCommande->getArticle()->getId()]['quantiteEncoursAchat'] = $rep->QuantiteEncoursAchat($detailsCommande->getArticle()->getId(), $dc->getId())['nb'];




//             $array_data[$detailsCommande->getArticle()->getId()]['code'] = $detailsCommande->getArticle()->getCode();
//             $array_data[$detailsCommande->getArticle()->getId()]['somme'] = $somme;



//             $quantiteLivre =$commande->getQuantiteLivre($detailsCommande);

         


//             $array_data[$detailsCommande->getArticle()->getId()]['quantiteLivre'] = $quantiteLivre;
//             $reste = $detailsCommande->getQuantite() - $quantiteLivre;
//             $tva = $tva = ($detailsCommande->getTva() / 100) + 1;
//             $array_data[$detailsCommande->getArticle()->getId()]['reste'] = $reste;
//             $array_data[$detailsCommande->getArticle()->getId()]['prixTtcReste'] = $reste * $detailsCommande->getPrixUnitaire() * $tva;
//             $array_data[$detailsCommande->getArticle()->getId()]['remise'] = $detailsCommande->getRemise();

//             $UATCommandefrsdetReste = new UATCommandefrsdet();
//             $UATCommandefrsdetReste->setQuantite($reste);
//             $UATCommandefrsdetReste->setPrixUnitaire($detailsCommande->getPrixUnitaire());
//             $UATCommandefrsdetReste->setTva($detailsCommande->getTva());
//             $UATCommandefrsdetReste->setRemise($detailsCommande->getRemise());
//             $prixHtReste = $prixHtReste + $UATCommandefrsdetReste->getPrixHt();
//             $prixTvaReste = $prixTvaReste + $UATCommandefrsdetReste->getPrixTva();
//             $prixRemiseReste = $prixRemiseReste + $UATCommandefrsdetReste->getPrixRemise();
//             $prixTotalTtcReste = $prixTotalTtcReste + $UATCommandefrsdetReste->getPrixTtc();
//         }


       

//         $commande->getDevise() ? $designation = $commande->getDevise()->getDesignation() : $designation = null;


//         $data = serialize($array_data);

        
//         $dataSerialize['array_data'] = $array_data;
//         $dataSerialize['dataSerialize'] = htmlentities($data);

//         $dataSerialize['prixHtReste'] =number_format((float)$prixHtReste, 2) . ' ' . $designation;
//         $dataSerialize['prixTotalTtcReste'] = number_format((float)$prixTotalTtcReste, 2) . ' ' . $designation;
//         $dataSerialize['prixRemiseReste'] = $prixRemiseReste != 0 ? number_format((float)$prixRemiseReste, 2) . ' ' . $designation : null;
//         $dataSerialize['prixTvaReste'] = number_format((float)$prixTvaReste, 2) . ' ' . $designation;

      






//         return  $dataSerialize;

 
//     } 




//     public function getRestDemandeAchat (UATCommandefrscabRepository $rep,$demande){
        
     

     
//         $dc = $this->getDossierCourant();
      

//         $array_data = array();
//         $prixHtReste = 0;
//         $prixTotalTtcReste = 0;
//         $prixRemiseReste = 0;
//         $prixTvaReste = 0;


//         foreach ($demande->getDetails() as $key => $detailsDemande) {

//             $array_data[$detailsDemande->getArticle()->getId()]['id'] = $detailsDemande->getArticle()->getId();
//             $array_data[$detailsDemande->getArticle()->getId()]['titre'] = $detailsDemande->getArticle()->getTitre();

//             $array_data[$detailsDemande->getArticle()->getId()]['prixUnitaire'] = $detailsDemande->getPrixUnitaire();
//             $array_data[$detailsDemande->getArticle()->getId()]['tva'] = $detailsDemande->getTva();
//             $array_data[$detailsDemande->getArticle()->getId()]['quantite'] = $detailsDemande->getQuantite();

//             if ($detailsDemande->getArticle()->getGererEnStock() == 1) {
//                 $array_data[$detailsDemande->getArticle()->getId()]['gerer'] = 'Oui';
//             } else {
//                 $array_data[$detailsDemande->getArticle()->getId()]['gerer'] = 'Non';
//             }


//             $somme = 0;

//             foreach ($detailsDemande->getArticle()->getUmouvementStocks() as $key1 => $mouv) {
//                 if ($mouv->getDossier()->getId() == $dc->getId()) {
//                     $somme += $mouv->getQuantite() * $mouv->getAjoSup();
//                 }
//             }


//             $array_data[$detailsDemande->getArticle()->getId()]['quantiteEncoursVente'] = $rep->QuantiteEncoursVente($detailsDemande->getArticle()->getId(), $dc->getId())['nb'];
//             $array_data[$detailsDemande->getArticle()->getId()]['quantiteEncoursAchat'] = $rep->QuantiteEncoursAchat($detailsDemande->getArticle()->getId(), $dc->getId())['nb'];




//             $array_data[$detailsDemande->getArticle()->getId()]['code'] = $detailsDemande->getArticle()->getCode();
//             $array_data[$detailsDemande->getArticle()->getId()]['somme'] = $somme;



//             $quantiteCommander =$demande->getQuantiteCommander($detailsDemande);

         


//             $array_data[$detailsDemande->getArticle()->getId()]['quantiteCommander'] = $quantiteCommander;
//             $reste = $detailsDemande->getQuantite() - $quantiteCommander;
//             $tva = $tva = ($detailsDemande->getTva() / 100) + 1;
//             $array_data[$detailsDemande->getArticle()->getId()]['reste'] = $reste;
//             $array_data[$detailsDemande->getArticle()->getId()]['prixTtcReste'] = $reste * $detailsDemande->getPrixUnitaire() * $tva;
//             $array_data[$detailsDemande->getArticle()->getId()]['remise'] = $detailsDemande->getRemise();

//             $UATCommandefrsdetReste = new UATCommandefrsdet();
//             $UATCommandefrsdetReste->setQuantite($reste);
//             $UATCommandefrsdetReste->setPrixUnitaire($detailsDemande->getPrixUnitaire());
//             $UATCommandefrsdetReste->setTva($detailsDemande->getTva());
//             $UATCommandefrsdetReste->setRemise($detailsDemande->getRemise());
//             $prixHtReste = $prixHtReste + $UATCommandefrsdetReste->getPrixHt();
//             $prixTvaReste = $prixTvaReste + $UATCommandefrsdetReste->getPrixTva();
//             $prixRemiseReste = $prixRemiseReste + $UATCommandefrsdetReste->getPrixRemise();
//             $prixTotalTtcReste = $prixTotalTtcReste + $UATCommandefrsdetReste->getPrixTtc();
//         }


       

//         $demande->getDevise() ? $designation = $demande->getDevise()->getDesignation() : $designation = null;


//         $data = serialize($array_data);

        
//         $dataSerialize['array_data'] = $array_data;
//         $dataSerialize['dataSerialize'] = htmlentities($data);

//         $dataSerialize['prixHtReste'] =number_format((float)$prixHtReste, 2) . ' ' . $designation;
//         $dataSerialize['prixTotalTtcReste'] = number_format((float)$prixTotalTtcReste, 2) . ' ' . $designation;
//         $dataSerialize['prixRemiseReste'] = $prixRemiseReste != 0 ? number_format((float)$prixRemiseReste, 2) . ' ' . $designation : null;
//         $dataSerialize['prixTvaReste'] = number_format((float)$prixTvaReste, 2) . ' ' . $designation;

      






//         return  $dataSerialize;

 
//     }    

}
