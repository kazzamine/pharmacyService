<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils,Request $request): Response
    { 
        $userID=$this->getUser();
       
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        if($userID){ 
            return $this->redirectToRoute('app_home');
        }
       
        return $this->render('security/index.html.twig', [
           'last_username' => $lastUsername,
           'error'         => $error,
        ]);
    }
    
    #[Route("/logout",name:"app_logout")]
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}