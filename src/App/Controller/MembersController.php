<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MembersController extends AbstractController
{

    #[Route('/members')]
    public function indexAction(): Response
    {
        $members = [
            [
                'id' => 1,
                'email' => 'kreso.kunjas@mstart.hr',
                'first_name' => 'Krešo',
                'last_name' => 'Kunjas',
                'role' => 'director',
                'seniority' => 'principal',
                'team' => 'team 1',
            ],
            [
                'id' => 2,
                'email' => 'marko.vusak@mstart.hr',
                'first_name' => 'Marko',
                'last_name' => 'Vusak',
                'role' => 'backend developer',
                'seniority' => 'senior',
                'team' => 'team 1',
            ]
        ];
        return $this->render('members/index.html.twig', ['members' => $members]);
    }

    #[Route('/details/{memberId}','details',)]
    public function detailsAction(int $memberId): Response
    {
        $member = [
            'id' => 1,
            'email' => 'kreso.kunjas@mstart.hr',
            'first_name' => 'Krešo',
            'last_name' => 'Kunjas',
            'role' => 'director',
            'seniority' => 'principal',
            'team' => 'team 1',
        ];
        return $this->render('members/details.html.twig', ['member' => $member]);
    }
}