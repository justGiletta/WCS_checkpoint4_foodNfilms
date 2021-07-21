<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\BlogRepository;
use App\Repository\FilmRepository;
use App\Repository\RecipeRepository;
use App\Repository\SerieRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
     /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/film", name="film")
     */
    public function filmIndex(FilmRepository $filmRepository): Response
    {
        return $this->render('film/index.html.twig', [
            'films' => $filmRepository->findAll(),
        ]);
    }

    /**
     * @Route("/recipe", name="recipe")
     */
    public function recipeIndex(RecipeRepository $recipeRepository): Response
    {
        return $this->render('recipe/index.html.twig', [
            'recipes' => $recipeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/serie", name="serie")
     */
    public function serieIndex(SerieRepository $serieRepository): Response
    {
        return $this->render('serie/index.html.twig', [
            'series' => $serieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function blogIndex(BlogRepository $blogRepository): Response
    {
        return $this->render('blog/index.html.twig', [
            'articles' => $blogRepository->findAll(),
        ]);
    }

    /**
     * @Route("/my_account/{id}", name="my_account")
     */
    public function myAccount(UserRepository $userRepository, User $user): Response
    {
        return $this->render('home/my_account.html.twig', [
            'user' => $user,
        ]);
    }

}
