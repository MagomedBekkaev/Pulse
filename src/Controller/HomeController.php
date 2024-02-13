<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ForumRepository;

class HomeController extends AbstractController
{

    private $forumRepository;

    public function __construct(ForumRepository $forumRepository)
    {
        $this->forumRepository = $forumRepository;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $forums = $this->forumRepository->findAll();
        $categories = $this->forumRepository->findAll(); // Assuming you have a method to fetch all categories in ForumRepository
        $posts = $this->forumRepository->findAll();

        return $this->render('home/index.html.twig', [
            'forums' => $forums,
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }
}
