<?php

namespace App\Controller\Admin;

use Domain\Member\Model\Role;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Infrastructure\Doctrine\MemberAssesmentEntity;
use Infrastructure\Doctrine\MemberEntity;
use Infrastructure\Doctrine\MemberToolEntity;
use Infrastructure\Doctrine\RoleEntity;
use Infrastructure\Doctrine\TeamEntity;
use Infrastructure\Doctrine\ToolEntity;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Team managment / Individual development plans')
            ->renderContentMaximized()
        ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Članovi');
        yield MenuItem::linkToCrud('Lista članova', 'fas fa-users', MemberEntity::class);
        yield MenuItem::section('Podaci');
        yield MenuItem::linkToCrud('Timovi', 'fas fa-people-group', TeamEntity::class);
        yield MenuItem::linkToCrud('Alati', 'fas fa-building', ToolEntity::class);
        yield MenuItem::linkToCrud('Role', 'fas fa-flag', RoleEntity::class);
        yield MenuItem::section('Razvojni plan');
        yield MenuItem::linkToCrud('Procjene po članovima', 'fas fa-plane', MemberAssesmentEntity::class);
        yield MenuItem::linkToCrud('Alati po članovima', 'fas fa-users', MemberToolEntity::class);

    }
}
