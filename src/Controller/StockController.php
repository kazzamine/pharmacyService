<?php

namespace App\Controller;

use App\Entity\Uarticle;
use App\Entity\Ufamille;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StockController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }
    #[Route('/stock', name: 'app_stock')]
    public function index(): Response
    {
        $famille = $this->entityManager->getRepository(Ufamille::class)->findAll();
        $articles=$this->entityManager->getRepository(Uarticle::class)->findBy(
                                                                                ['active'=>1], 
                                                                                [], 
                                                                                10,
                                                                                0
                                                                            );
        // dd($articles);
        return $this->render('stock/index.html.twig', [
            'famille' =>  $famille,
            'articles'=>$articles
        ]);
    }
}
