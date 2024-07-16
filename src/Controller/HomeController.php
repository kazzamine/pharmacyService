<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(UserRepository $userRepository): Response
    {
        $dataaa=$userRepository->findOneBy(['id'=>'3']);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'data'=>$dataaa
        ]);
    }
}
