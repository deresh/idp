<?php

namespace Infrastructure\Doctrine;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Domain\Member\Model\Member;
use Domain\Tools\Tool;
use Domain\Tools\ToolRepository;

/**
 * @extends ServiceEntityRepository<MemberEntity>
 */
class ToolEntityRepository extends ServiceEntityRepository implements ToolRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MemberToolEntity::class);
    }

    public function all(array $filters = []): array
    {
        $builder = $this->createQueryBuilder('t');

        $all = $builder->getQuery()->getResult();
        $tools = [];

        foreach ($all as $tool) {
            $tools[] = Tool::fromEntity($tool);
        }

        return $tools;
    }

    public function byMember(Member $member)
    {
         $builder = $this->createQueryBuilder('t')
             ->join('t.tools', 'te')
             ->where('t.member = :member', ['member' => $member->id]);

        $memberTools = [];
        foreach ($builder->getQuery()->getResult() as $memberTool) {
            $memberTools[] = Tool::fromEntity(
                $memberTool->getTool()
            );
        }

        return $memberTools;
    }


}