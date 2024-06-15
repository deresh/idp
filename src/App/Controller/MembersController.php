<?php

namespace App\Controller;

use Domain\Member\Model\MembersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MembersController extends AbstractController
{

    private MembersRepository $repository;

    public function __construct(MembersRepository $repository) {
        $this->repository = $repository;
    }
    #[Route('/')]
    public function indexAction(): Response
    {

        $members = $this->repository->all();

        return $this->render('members/index.html.twig', ['members' => $members]);
    }

    #[Route('/details/{memberId}','details')]
    public function detailsAction(int $memberId): Response
    {
        $member = $this->repository->byId($memberId);
        return $this->render('members/details.html.twig', ['member' => $member]);
    }
}