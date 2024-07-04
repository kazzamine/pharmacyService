<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SuiviCommandeController extends AbstractController
{
    #[Route('/suivi/commande', name: 'app_suivi_commande')]
    public function index(): Response
    {
        return $this->render('suivi_commande/index.html.twig', [
            'controller_name' => 'SuiviCommandeController',
        ]);
    }
}
