<?php

namespace App\Controller;

use App\Entity\Uarticle;
use App\Entity\Ufamille;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/app')]
class StockController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }
    #[Route('/suivi_stock', name: 'app_stock')]
    public function index(Request $request): Response
    {
        $dossier=$request->getSession()->get('selectedDossier');
        $famille =$this->entityManager->getRepository(Ufamille::class)->findAll();
        $articles=$this->entityManager->getRepository(Uarticle::class)->getArticlesByCat($dossier->getId(),null,null);
        return $this->render('stock/index.html.twig', [
            'famille' => $famille,
            'articles'=>$articles
        ]);
    }

    #[Route('/suivi_stock/byfam', name: 'app_stock_byfam')]
    public function articlesByFamille(Request $request): JsonResponse
    {
        $dossier=$request->getSession()->get('selectedDossier');
        $familleID=$request->request->get('famId');
        $search='';
        $articles=$this->entityManager->getRepository(Uarticle::class)->getArticlesByCat($dossier->getId(),$familleID,null);
        $returnedHtml= $this->render('stock/produit.html.twig', [
            'articles'=>$articles
        ]);
       
        return new JsonResponse($returnedHtml->getContent());
    }

    #[Route('/suivi_stock/bySearch', name: 'app_stock_bysearch')]
    public function articlesbySearch(Request $request): JsonResponse
    {
        $dossier=$request->getSession()->get('selectedDossier');
        $search=$request->request->get('search');
        $articles=$this->entityManager->getRepository(Uarticle::class)->getArticlesByCat($dossier->getId(),null,$search);
        $returnedHtml= $this->render('stock/produit.html.twig', [
            'articles'=>$articles
        ]);
        return new JsonResponse($returnedHtml->getContent());
    }

    #[Route('/suivi_stock/articleDet', name: 'app_stock_articleDet')]
    public function articleDetail(Request $request): JsonResponse
    {
        $articleID=$request->request->get('articleID');
        $article=$this->entityManager->getRepository(Uarticle::class)->find($articleID);
        $articleData['titre']=$article->getTitre();
        $articleData['description']=$article->getDescription();
        $articleData['code_barre']=$article->getcodeBarre();
        $articleData['image']=$article->getImage();
        $articleData['famille']=$article->getUfamille()->getDesignation();
        return new JsonResponse($articleData);
    }
}