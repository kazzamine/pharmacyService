<?php

namespace App\Controller;

use App\Entity\DemandStockCab;
use App\Entity\Ufamille;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        $famille = $this->entityManager->getRepository(Ufamille::class)->findAll();

        $demandes= $this->entityManager->getRepository(DemandStockCab::class)->getPatientDemands();
        dd($demandes);
        return $this->render('suivi_commande/index.html.twig', [
            'famille' =>  $famille,
        ]);
    }
}
