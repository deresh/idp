<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class NavigationController extends AbstractController
{
    public function main(string $active): Response
    {
        $items = [
            [
                'name' => 'Member list',
                'route' => 'members',
            ],
            [
                'name' => 'Seniority',
                'route' => 'seniority',
            ],
            [
                'name' => 'Roles',
                'route' => 'role',
            ],
            [
                'name' => 'Tools',
                'route' => 'tool',
            ],
        ];

        foreach ($items as &$item) {
            $item['active'] = false;
            if ($active === $item['route']) {
                $item['active'] = true;
            }
        }

        return $this->render('navigation/_main.html.twig', ['nav' => $items]);
    }

}