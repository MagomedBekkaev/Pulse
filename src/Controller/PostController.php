<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PostController extends AbstractController
{
    private $postRepository;
    

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    #[Route('/post', name: 'app_post')]
    public function index(): Response
    {
        $posts = $this->postRepository->findAll();

        return $this->render('post/post.html.twig', [
            'posts' => $posts,
        ]);
    }

}