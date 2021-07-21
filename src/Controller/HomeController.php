<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
     /**
     * @Route("/", name="landing")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'FilmController',
        ]);
    }

    /**
     * @Route("/film", name="film")
     */
    public function filmIndex(): Response
    {
        return $this->render('film/index.html.twig', [
            'controller_name' => 'FilmController',
        ]);
    }

    /**
     * @Route("/recipe", name="recipe")
     */
    public function recipeIndex(): Response
    {
        return $this->render('recipe/index.html.twig', [
            'controller_name' => 'RecipeController',
        ]);
    }

    /**
     * @Route("/serie", name="serie")
     */
    public function serieIndex(): Response
    {
        return $this->render('serie/index.html.twig', [
            'controller_name' => 'SerieController',
        ]);
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function blogIndex(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

}
