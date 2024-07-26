<?php

namespace App\Service;

use App\Entity\UmouvementAntenne;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartServices
{

    

    public function addToCart(UmouvementAntenne $article,$quantity,SessionInterface $session)
    {
        $cart = $session->get('cart', []);
        if (isset($cart[$article->getArticle()->getId()])) {
            $cart[$article->getArticle()->getId()]['quantity'] += $quantity;
        } else {
            $cart[$article->getArticle()->getId()] = ['quantity'=>$quantity,'article'=>$article,'name'=>$article->getArticle()->getTitre()];
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