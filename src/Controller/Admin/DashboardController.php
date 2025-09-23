<?php

namespace App\Controller\Admin;

use App\Entity\Parcelle;
use App\Entity\Animal;
use App\Entity\Machine;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Option A: laisse l'accueil EasyAdmin S'IL Y A un menu (ce sera le cas juste après)
        return parent::index();

        // Option B: pour rediriger direct vers Parcelles, dé-commente :
        // $url = $this->container->get(AdminUrlGenerator::class)
        //     ->setController(\App\Controller\Admin\ParcelleCrudController::class)
        //     ->generateUrl();
        // return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()->setTitle('Agri-Cult');
    }

    /** IMPORTANT: ce nom ET la signature doivent être EXACTS */
    public function configureMenuItems(): iterable
    {
        // un lien simple pour prouver que le menu apparaît
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        // liens CRUD (assure-toi d’avoir les CrudControllers correspondants)
        yield MenuItem::linkToCrud('Parcelles', 'fa fa-seedling', Parcelle::class);
        yield MenuItem::linkToCrud('Animaux', 'fa fa-cow', Animal::class);
        yield MenuItem::linkToCrud('Machines', 'fa fa-tractor', Machine::class);

        // (test) un lien URL pour être sûr que le menu est vu par EA
        // yield MenuItem::linkToUrl('Retour au site', 'fa fa-globe', '/');
    }
}
