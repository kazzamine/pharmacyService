<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ConsommationPatientController extends AbstractController
{
    #[Route('/consommation_patient', name: 'app_consommation_patient')]
    public function index(): Response
    {
        return $this->render('consommation_patient/index.html.twig', [
            'controller_name' => 'VenteController',
        ]);
    }
}
