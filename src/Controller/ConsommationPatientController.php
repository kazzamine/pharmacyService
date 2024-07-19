<?php

namespace App\Controller;

use App\Entity\Uarticle;
use App\Entity\Ufamille;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ConsommationPatientController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }
    #[Route('/consommation_patient', name: 'app_consommation_patient')]
    public function index(): Response
    {

        $famille =$this->entityManager->getRepository(Ufamille::class)->findAll();
        $articles=$this->entityManager->getRepository(Uarticle::class)->findBy(
            ['active'=>1], 
            [], 
            10,
            0
        );
       
        return $this->render('consommation_patient/index.html.twig', [
            'famille' => $famille,
            'articles'=>$articles
        ]);
    }

    #[Route('/consommation_patient/byfam', name: 'app_consommation_patient_byfam')]
    public function articlesByFamille(Request $request): JsonResponse
    {
        $dossier=$request->getSession()->get('selectedDossier');
        $articles=$this->entityManager->getRepository(Uarticle::class)->getArticlesByCat($dossier->id(),2);
        $returnedHtml= $this->render('consommation_patient/index.html.twig', [
            'articles'=>$articles
        ]);
        return new JsonResponse($returnedHtml->getContent());
    }
}
