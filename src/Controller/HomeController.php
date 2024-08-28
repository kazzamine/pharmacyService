<?php

namespace App\Controller;

use App\Entity\PDossier;
use App\Repository\PDossierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/app')]
class HomeController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }
    #[Route('/home', name: 'app_home')]
    public function index(PDossierRepository $pDossierRepository,Request $request ): Response
    {
        $dossier=$request->getSession()->get('selectedDossier');

        $selectedDossier=0;
        if($dossier!=null){
            $selectedDossier=1;
        }
        $userID=$this->getUser();
        $userDossier=$pDossierRepository->getDossierByUser($userID->getId());
        return $this->render('home/index.html.twig', [
            'user_dossier'=>$userDossier,
            'selectedDossier'=>$selectedDossier
        ]);
    }

    #[Route('/home/choseService/{serviceid}',name:'app_choisi_service')]
    public function choisiService($serviceid,Request $request): JsonResponse
    {
        $dossier=$this->entityManager->getRepository(PDossier::class)->find($serviceid);
        $request->getSession()->set('selectedDossier',$dossier);
        $request->getSession()->set('selectedDossierName',$dossier->getNomDossier());
        return new JsonResponse(['dossier'=>$dossier->getId()]);
    }
}