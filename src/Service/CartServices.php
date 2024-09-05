<?php

namespace App\Service;

use App\Entity\StockActual;
use App\Entity\UmouvementAntenne;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartServices
{    
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }

    public function addToCart(UmouvementAntenne $article, $quantity, SessionInterface $session)
    {
        $articleData = $this->entityManager->getRepository(StockActual::class)->findOneBy(['article' => $article->getArticle()->getId(), 'antenne' => 9]);
        $cart = $session->get('cart', []);
        if (isset($cart[$article->getArticle()->getId()])) {
            $newQte = $cart[$article->getArticle()->getId()]['quantity'] + $quantity;
            if ($newQte <= $articleData->getQuantite()) {
                $cart[$article->getArticle()->getId()]['quantity'] += $quantity;
            } else {
                return 'supQuantite';
            }
        } else {
            $cart[$article->getArticle()->getId()] = [
                'quantity' => $quantity,
                'article' => $article,
                'name' => $article->getArticle()->getTitre()
            ];
        }
        $session->set('cart', $cart);
        return 'success';
    }

    public function removeFromCart($id,SessionInterface $session)
    {
        $cart = $session->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        $session->set('cart', $cart);
    }

    public function updateCart($id,SessionInterface $session,$operation)
    {
        $result='';
        $cart = $session->get('cart', []);
        if($operation=='decrease'){
             if (isset($cart[$id])) {
                    $cart[$id]['quantity']--;
                    if($cart[$id]['quantity']==0){
                        unset($cart[$id]);
                   }
                }
                $result= 'decreased';
        }else if($operation == 'increase'){
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            }
            $result= 'increased';
        }
        $session->set('cart', $cart);
        return $result;
    }
}