<?php

namespace App\Controller;

use App\Entity\DemandStockCab;
use App\Entity\PDossier;
use App\Entity\Ufamille;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SuiviCommandeController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
     $this->entityManager=$entityManager;   
    }

    #[Route('/suivi/commande', name: 'app_suivi_commande')]
    public function index(): Response
    {
        $services=$this->entityManager->getRepository(PDossier::class)->findAll();
        $famille = $this->entityManager->getRepository(Ufamille::class)->findAll();
        $demandes=$this->entityManager->getRepository(DemandStockCab::class)->getDemandes();
        return $this->render('suivi_commande/index.html.twig', [
            'famille' =>  $famille,
            'demandes'=>$demandes,
            'services'=>$services,
            'consomPat'=>0
        ]);
    }

    #[Route('/suivi/commande/byfilter', name: 'byfilter')]
    public function demandesbyfilter(Request $request): JsonResponse
    {
        $dossier=$request->getSession()->get('selectedDossier');
        $consomPatient=$request->request->get('consomPatient');
        $search=$request->request->get('search');
        $service=$request->request->get('service');
        $date=$request->request->get('date');
        $demandes=$this->entityManager->getRepository(DemandStockCab::class)->getDemandes($search,$service,$date,$dossier->getId());
        $returnedHtml= $this->render('suivi_commande/demandes.html.twig', [
            'demandes'=>$demandes,
            'consomPat'=>$consomPatient
        ]);
       
        return new JsonResponse($returnedHtml->getContent());
    }

}
