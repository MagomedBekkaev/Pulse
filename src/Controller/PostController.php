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

    #[Route('/post/{id}', name: 'app_post')]
    public function index(int $id): Response
    {
        $post = $this->postRepository->find($id);

        if (!$post) {
            throw $this->createNotFoundException('The post does not exist');
        }

        return $this->render('post/post.html.twig', [
            'post' => $post,
        ]);
    }
}
