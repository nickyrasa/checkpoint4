<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PostRepository $postsRepository): Response
    {
        $showPosts = $postsRepository->findBy(
            [], // No specific conditions
            ['id' => 'DESC'],
            3 // Limit to 3 recipes
        );

        return $this->render('home/index.html.twig', [
            'showPosts' => $showPosts,
           ]);
    }
}
