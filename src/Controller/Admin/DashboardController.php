<?php

namespace App\Controller\Admin;

use App\Entity\Blog;
use App\Entity\Film;
use App\Entity\Serie;
use App\Entity\Recipe;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setFaviconPath('build/images/Logos/FnF_logoSmall.png')
            ->setTitle('<a class="me-5" href="/"><img src="build/images/Logos/FnF_logo.png" width="100" height="100"></a>');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Films', 'fa fa-tags', Film::class);
        yield MenuItem::linkToCrud('Series', 'fa fa-tags', Serie::class);
        yield MenuItem::linkToCrud('Recettes', 'fa fa-tags', Recipe::class);
        yield MenuItem::linkToCrud('Blog Posts', 'fa fa-file-text', Blog::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-user-tag', User::class);
    }

    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('build/app.css');
    }
}
