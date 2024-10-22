<?php

namespace Web\Controller;

use App\Form\MemberType;
use Domain\Member\Model\MembersRepository;
use Domain\Member\Model\Role;
use Domain\Member\Model\SeniorityLevel;
use Domain\Seniority\Seniority;
use Infrastructure\Member\InMemoryMembersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MembersController extends AbstractController
{

    private MembersRepository $repository;

    public function __construct(MembersRepository $repository) {
        $this->repository = $repository;
    }
    #[Route('/', name: 'members')]
    public function indexAction(Request $request): Response
    {
        $filters = $request->query->all();
        $members = $this->repository->all($filters);

        $filterData = [
            'role' => Role::labels(),
            'seniority' => SeniorityLevel::labels(),
        ];

        return $this->render('members/index.html.twig', ['members' => $members, 'filterData' => $filterData]);
    }

    #[Route('/details/{memberId}','member_details')]
    public function detailsAction(int $memberId): Response
    {
        $member = $this->repository->byId($memberId);
        return $this->render('members/details.html.twig', ['member' => $member]);
    }

    #[Route('/details/{memberId}/tools','member_details_tools')]
    public function toolsAction(int $memberId): Response
    {
        $member = $this->repository->byId($memberId);
        return $this->render('members/details.html.twig', ['member' => $member]);
    }

    #[Route('/details/edit/{memberId}','member_edit', methods: ['POST', 'GET'])]
    public function detailsEditAction(int $memberId, Request $request): Response
    {
        $member = $this->repository->byId($memberId);

        $form = $this->createForm(MemberType::class, $member);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $member = $form->getData();

            $this->repository->persist($member);
            return $this->redirectToRoute('members');
        }

        return $this->render('members/edit.html.twig', ['member' => $member, 'form' => $form]);
    }

    public function teamMemberList(int $max): Response
    {
        $members = $this->repository->all();
        return $this->render('members/_teamMemberList.html.twig', ['members' => $members]);
    }
}