<?php

namespace App\Controller\Admin;

use App\Entity\Agent;
use App\Entity\Property;
use App\Entity\User;
use App\Repository\AgentRepository;
use App\Repository\PropertyRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    protected $propertyRepository;
    protected $agentRepository;

    public function __construct(PropertyRepository $propertyRepository, AgentRepository $agentRepository)
    {
        $this->propertyRepository = $propertyRepository;
        $this->agentRepository = $agentRepository;
    }

    #[Route('/api/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig',
            ['property' => $this->propertyRepository->findAll()]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Api ImmoTep');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::linkToCrud('Biens','fa fa-money',Property::class);
        yield MenuItem::linkToCrud('Agents','fa fa-id-card',Agent::class);
        yield MenuItem::linkToCrud('Utilisateur','fa fa-users',User::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
            ->setName($user->getUsername())
            ->setGravatarEmail($user->getUsername())
            ->displayUserAvatar(true); // TODO: Change the autogenerated stub
    }
}
