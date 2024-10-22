<?php

namespace Web\Controller;

use Domain\Seniority\SeniorityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SeniorityController extends AbstractController
{

    private SeniorityRepository $repository;

    public function __construct(SeniorityRepository $repository) {
        $this->repository = $repository;
    }
    #[Route('/seniority', name: 'seniority')]
    public function indexAction(): Response
    {
        $seniority = $this->repository->all();
        return $this->render('seniority/index.html.twig', ['seniority' => $seniority]);
    }

    #[Route('/seniority/details/{seniorityId}','seniority_details')]
    public function detailsAction(int $seniorityId): Response
    {
        $member = $this->repository->byId($seniorityId);
        return $this->render('members/details.html.twig', ['member' => $member]);
    }

}