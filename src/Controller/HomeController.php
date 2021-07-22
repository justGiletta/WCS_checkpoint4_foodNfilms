<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ContactType;
use App\Repository\BlogRepository;
use App\Repository\FilmRepository;
use App\Repository\RecipeRepository;
use App\Repository\SerieRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
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

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();

            $message = (new Email())
                ->from($this->getParameter('mailer_from'))
                ->to('your_email@example.com')
                ->subject('Food\'n Films : vous avez reçu un email')
                ->html($this->renderView('home/contactEmail.html.twig', ['contactFormData' => $contactFormData]));
            $mailer->send($message);
            $this->addFlash('success', 'Votre message a bien été envoyé');

            return $this->redirectToRoute('home');
        }

        return $this->render('home/contact.html.twig', [
            'contactForm' => $form->createView(),
        ]);
    }

}
