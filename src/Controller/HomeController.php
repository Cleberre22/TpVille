<?php

namespace App\Controller;

use App\Repository\SocialNetworkRepository;
use App\Repository\ContactRepository;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ArticleRepository $articleRepository, ContactRepository $contactRepository, SocialNetworkRepository $socialNetworkRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'article' => $articleRepository->findBy([],['id'=>'DESC'], 1,0),
            'articles' => $articleRepository->findBy([],['createdAt'=>'DESC']),
            'contact' => $contactRepository->findAll(),
            'social_networks' => $socialNetworkRepository->findAll(),
        ]);
    }
}

