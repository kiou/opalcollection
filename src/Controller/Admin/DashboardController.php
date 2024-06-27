<?php

namespace App\Controller\Admin;

use App\Entity\Pays;
use App\Entity\User;
use App\Entity\About;
use App\Entity\Avant;
use App\Entity\Block;
use App\Entity\Galerie;
use App\Entity\Headers;
use App\Entity\Service;
use App\Entity\AboutFull;
use App\Entity\TheCollection;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('Admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="../img/logoadmin.png" style="max-width:95%;">')
            ->setFaviconPath('img/favicon.png');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Gestion');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-dot-circle', User::class)->setDefaultSort(['id' => 'DESC']);
        yield MenuItem::linkToCrud('Pays', 'fas fa-dot-circle', Pays::class)->setDefaultSort(['id' => 'DESC']);
        yield MenuItem::linkToCrud('Blocks', 'fas fa-dot-circle', Block::class)->setDefaultSort(['id' => 'DESC']);
    
        yield MenuItem::section('Contenu');
        yield MenuItem::linkToCrud('En tête accueil', 'fas fa-dot-circle', Headers::class)->setDefaultSort(['id' => 'DESC']);
        yield MenuItem::linkToCrud('The Collections', 'fas fa-dot-circle', TheCollection::class)->setDefaultSort(['id' => 'DESC']);
        yield MenuItem::linkToCrud('Galeries photos', 'fas fa-dot-circle', Galerie::class)->setDefaultSort(['id' => 'DESC']);
        yield MenuItem::linkToCrud('Mise en avant', 'fas fa-dot-circle', Avant::class)->setDefaultSort(['id' => 'DESC']);
        yield MenuItem::linkToCrud('A porpos (Accroche)', 'fas fa-dot-circle', About::class)->setDefaultSort(['id' => 'DESC']);
        yield MenuItem::linkToCrud('A porpos (Page)', 'fas fa-dot-circle', AboutFull::class)->setDefaultSort(['id' => 'DESC']);
        yield MenuItem::linkToCrud('Services', 'fas fa-dot-circle', Service::class)->setDefaultSort(['id' => 'DESC']);
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {

        return parent::configureUserMenu($user)
            ->setGravatarEmail($user->getEmail())
            ->setName($user->getPrenom().' '.$user->getNom());
    }

    public function configureActions(): Actions
    {
        return parent::configureActions()
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
}
