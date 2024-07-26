<?php

namespace App\Controller;

use Domain\Tools\ToolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ToolController extends AbstractController
{

    private ToolRepository $toolRepository;

    /**
     * @param ToolRepository $toolRepository
     */
    public function __construct(ToolRepository $toolRepository)
    {
        $this->toolRepository = $toolRepository;
    }


    #[Route('/tool', name: 'tool')]
    public function indexAction(): Response
    {
        $tools = $this->toolRepository->all();


        return $this->render('tool/index.html.twig', ['tools' => $tools] );
    }

}