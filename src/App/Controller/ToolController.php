<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ToolController extends AbstractController
{
    #[Route('/tool', name: 'tool')]
    public function indexAction(): Response
    {
        return $this->render('tool/index.html.twig', );
    }

}