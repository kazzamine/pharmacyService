<?php
namespace App\Controller;

use App\Entity\CommandeType;
use App\Entity\DemandeStockDet;
use App\Entity\DemandStatus;
use App\Entity\DemandStockCab;
use App\Entity\PDossier;
use App\Entity\StockActual;
use App\Entity\Uantenne;
use App\Entity\Uarticle;
use App\Entity\Ufamille;
use App\Entity\UmouvementAntenne;
use App\Service\CartServices;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Twig\Environment;
 #[Route('/app')]
class ConsommationPatientController extends AbstractController
{
    private $entityManager;
    private $httpClient; 
    public function __construct(EntityManagerInterface $entityManager,HttpClientInterface $httpClient)
    {
        $this->entityManager=$entityManager;
        $this->httpClient=$httpClient;
    }

    #[Route('/consommation_patient', name: 'app_consommation_patient')]
    public function index(Request $request,SessionInterface $session): Response
    {
        $dossier=$request->getSession()->get('selectedDossier');
        $famille =$this->entityManager->getRepository(Ufamille::class)->findAll();
        $articles=$this->entityManager->getRepository(Uarticle::class)->getArticlesByCat($dossier->getId(),null,null);
        $cart = $session->get('cart', []);

        $totalQuantity = 0;
        $totalPrice = 0.0;

        foreach ($cart as $item) {
            $totalQuantity += $item['quantity'];
            $totalPrice += $item['quantity'] * $item['article']->getPrix();
        }
        $session->set('totalPrice',$totalPrice);
        $userID=$this->getUser();
        $userDossier=$this->entityManager->getRepository(PDossier::class)->getDossierByUser($userID->getId());
        return $this->render('consommation_patient/index.html.twig', [
            'famille' => $famille,
            'articles'=>$articles,
            'user_dossier'=>$userDossier,
            'cart'=>$cart
        ]);
    }

    #[Route('/consommation_patient/byfam', name: 'app_consommation_patient_byfam')]
    public function articlesByFamille(Request $request): JsonResponse
    {
        $dossier=$request->getSession()->get('selectedDossier');
        $familleID=$request->request->get('famId');
        $articles=$this->entityManager->getRepository(Uarticle::class)->getArticlesByCat($dossier->getId(),$familleID,null);
        $returnedHtml= $this->render('consommation_patient/produit.html.twig', [
            'articles'=>$articles
        ]);
       
        return new JsonResponse($returnedHtml->getContent());
    }

    #[Route('/consommation_patient/bySearch', name: 'app_consommation_patient_bysearch')]
    public function articlesbySearch(Request $request): JsonResponse
    {
        $dossier=$request->getSession()->get('selectedDossier');
        $search=$request->request->get('search');
        $articles=$this->entityManager->getRepository(Uarticle::class)->getArticlesByCat($dossier->getId(),null,$search);
        $returnedHtml= $this->render('consommation_patient/produit.html.twig', [
            'articles'=>$articles
        ]);
       
        return new JsonResponse($returnedHtml->getContent());
    }

    #[Route('/consommation_patient/addCart', name: 'app_consommation_addCart')]
    public function addArtCart( Request $request,  CartServices $cartService,  SessionInterface $session,  Environment $twig): JsonResponse 
    {
        $articleID = $request->request->get('articleID');
        $quantity = (int) $request->request->get('quantity');
        $article = $this->entityManager->getRepository(UmouvementAntenne::class)
                                    ->findOneBy(['article' => $articleID, 'antenne' => 9]);
        $articleData = $this->entityManager->getRepository(StockActual::class)
                                        ->findOneBy(['article' => $articleID, 'antenne' => 9]);

        if ($articleData->getQuantite() == 0) {
            return new JsonResponse(['error' => 'vendu']);
        } elseif ($quantity > $articleData->getQuantite()) {
            return new JsonResponse(['error' => 'supQuantite']);
        } elseif ($quantity <= $articleData->getQuantite() && $quantity != 0) {
            $result = $cartService->addToCart($article, $quantity, $session);

        if ($result == 'success') {
            $cart = $session->get('cart', []);
            $totalQuantity = 0;
            $totalPrice = 0.0;
            $cartHtml = '';
            $updatedQuantity = 0;

            foreach ($cart as $cartItem) {
                $totalQuantity += $cartItem['quantity'];
                $totalPrice += $cartItem['quantity'] * $cartItem['article']->getPrix();
                if ($cartItem['article']->getArticle()->getId() == $articleID) {
                    $updatedQuantity = $cartItem['quantity'];
                }
                $cartHtml .= $twig->render('consommation_patient/cart_item.html.twig', ['cartItem' => $cartItem]);
            }
            $session->set('totalPrice', $totalPrice);
            return new JsonResponse([
                'success' => 'success',
                'cartHtml' => $cartHtml,
                'totalPrice' => $totalPrice,
                'updatedQuantity' => $updatedQuantity,  
                'articleID' => $articleID, 
            ]);
        }
        else {
            return new JsonResponse(['error' => 'supQuantite']);
        }
        }
        return new JsonResponse(['error' => 'unknown']);
    }

    #[Route('/consommation_patient/remove/{id}', name: 'app_consommation_cart_remove')]
    public function removeFromCart($id, SessionInterface $session,CartServices $cartService)
    {
        $cartService->removeFromCart($id, $session);
        return $this->redirectToRoute('app_consommation_patient');
    }

    #[Route('/consommation_patient/updateQte', name: 'app_consommation_updateQte')]
    public function updateQte(SessionInterface $session,CartServices $cartService,Request $request)
    {
        $id=$request->request->get('articleID');
        $operation=$request->request->get('operation');
        $data['res']=$cartService->updateCart($id,$session,$operation);
        $cart = $session->get('cart', []);
        $data['qte']=$cart[$id]['quantity'];
        return new JsonResponse($data);
    }

    #[Route('/consommation_patient/findPatient/{ipp}',name:'app_consommation_find_patient')]
    public function findPatient($ipp,Request $request):JsonResponse
    {
        $method = $request->getMethod();
        $body = $request->getContent();
        $headers = $request->headers->all();
        $queryParams = $request->query->all();
        $apiUrl = 'http://52.213.254.104/api/upharma/dossier/imputation/' . $ipp;
        $response = $this->httpClient->request($method, $apiUrl, [
            'headers' => $headers,
            'body' => $body,
            'query' => $queryParams,
        ]);
        $statusCode = $response->getStatusCode();
        if($statusCode != 500){
            if($statusCode==200){
                return new JsonResponse(
                    json_decode($response->getContent())
                ); 
            }else if($statusCode==404){
                return new JsonResponse(
                    ['error' => '404']
                ); 
            }
        }else{
            return new JsonResponse([
                'error' => '500',
            ]);
        }
    }

    #[Route('/consommation_patient/validatePatient',name:'app_consommation_validate_patient')]
    public function validatePatient(Request $request,SessionInterface $session):JsonResponse
    {
        $content = $request->request->get('patient');
        if($content !== null){
            $data = $content;
            $session->set('patient',json_decode($data));
            return new JsonResponse([
              'success'=>'validated'
              ]
            );
        }
        
        return new JsonResponse([
          'error'=>'empty'
          ]
        );
    }

    #[Route('/consommation_patient/addDemande',name:'app_consommation_add_demande')]
    public function addDemande(Request $request,SessionInterface $session)
    {
        $patient=$session->get('patient');
        $articles=$session->get('cart');
        $currentDateTime = new \DateTime();
        $commandeType=$this->entityManager->getRepository(CommandeType::class)->find(2);
        $dossierid=$request->getSession()->get('selectedDossier')->getId();
        $dossier=$this->entityManager->getRepository(PDossier::class)->find($dossierid);
        $antenne=$this->entityManager->getRepository(Uantenne::class)->find(9);
        $status=$this->entityManager->getRepository(DemandStatus::class)->find(4);
        $user = $this->getUser();

        $this->entityManager->beginTransaction();
        if($articles){
            try{
            $demandeCab=new DemandStockCab();
            $demandeCab->setIpp($patient->ipp);
            $demandeCab->setDi($patient->di);
            $demandeCab->setCode($patient->codeOrg);
            $demandeCab->setPatient($patient->patient);
            $demandeCab->setDossierPatient($patient->dossier);
            $demandeCab->setTipoFacturac($patient->idtipofacturac);
            $demandeCab->setDate($currentDateTime);
            $demandeCab->setUrgent(0);
            $demandeCab->setCommandeType($commandeType);
            $demandeCab->setUserCreated( $user);
            $demandeCab->setDemandeur($dossier);
            $demandeCab->setStatus($status);
            $demandeCab->setUantenne($antenne);
            $demandeCab->setAntenneDemandeur($antenne);
            $this->entityManager->persist($demandeCab);
            $this->entityManager->flush();
            foreach ($articles as $article) {
            $demandDet=new DemandeStockDet();
            $demandDet->setDemandeCab($demandeCab);
            $articleData=$this->entityManager->getRepository(Uarticle::class)->find($article['article']->getArticle());
            $demandDet->setUarticle($articleData);
            $demandDet->setQte($article['quantity']);
            $this->entityManager->persist($demandDet);
            $this->entityManager->flush();

            $stockActual=$this->entityManager->getRepository(StockActual::class)->findOneBy(['article'=>$article['article']->getArticle()->getId(),'antenne'=>$antenne]);
            $artStockactual=$stockActual->getQuantite();
            $stockActual->setQuantite($artStockactual-$article['quantity']);
            $this->entityManager->persist($stockActual);
            $this->entityManager->flush();

            $umouvAnt=$this->entityManager->getRepository(UmouvementAntenne::class)->findOneBy(['article'=>$articleData,'antenne'=>$antenne]);
            $umouvStock=$stockActual->getQuantite();
            $umouvAnt->setQuantite($umouvStock-$article['quantity']);
            $umouvAnt->setAjoSup($umouvStock-$article['quantity']);
            $this->entityManager->persist($umouvAnt);
            $this->entityManager->flush();
            } 

            $this->entityManager->commit();
            $session->remove('cart');
            $session->remove('patient');
                }catch (Exception $e) {
                    $this->entityManager->rollBack();
                    throw $e;
                }
        }else{
            return new JsonResponse([
                'failed'=>'no data'
            ]);
        }
        return new JsonResponse([
            'success'=>'added successfully'
        ]);
        
    }
}
