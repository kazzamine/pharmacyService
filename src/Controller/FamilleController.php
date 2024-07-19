<?php

namespace App\Controller;

use App\Entity\Ufamille;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class FamilleController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }
    
    #[Route('/famille/bySearch', name: 'app_famille_by_search')]
    public function familleBySearch(Request $request): JsonResponse
    {
        $searchTerm=$request->request->get('search');
        $familles=$this->entityManager->getRepository(Ufamille::class)->getFamille($searchTerm);
        $returnedHtml=$this->render('includes/familleCard.html.twig',[
            'famille'=>$familles
        ]);
        return new JsonResponse($returnedHtml->getContent());
    }
}
