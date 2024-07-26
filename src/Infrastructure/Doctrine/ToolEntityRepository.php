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
        parent::__construct($registry, ToolEntity::class);
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

}