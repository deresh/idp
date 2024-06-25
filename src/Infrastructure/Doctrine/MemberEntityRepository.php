<?php

namespace Infrastructure\Doctrine;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Domain\Member\Model\Member;
use Domain\Member\Model\MembersRepository;

/**
 * @extends ServiceEntityRepository<MemberEntity>
 */
class MemberEntityRepository extends ServiceEntityRepository implements MembersRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MemberEntity::class);
    }

    public function all(): array
    {
        $all = $this->createQueryBuilder('m')->orderBy('m.hireDate')->getQuery()->getResult();
        $members = [];

        foreach ($all as $member) {
            $members[] = Member::fromEntity($member);
        }

        return $members;
    }

    public function byId(int $memberId): ?Member
    {
        $entity = $this->find($memberId);

        return Member::fromEntity($entity);
    }

    public function persist(Member $member): void
    {
        $memberEntity = $this->find($member->id);
        if (null === $memberEntity) {
            return;
        }

        $memberEntity->setEmail($member->email);
        $memberEntity->setFirstName($member->firstName);
        $memberEntity->setLastName($member->lastName);
        $memberEntity->setSeniority($member->seniority);

        $this->getEntityManager()->persist($memberEntity);
    }
}
