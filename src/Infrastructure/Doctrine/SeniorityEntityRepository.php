<?php

namespace Infrastructure\Doctrine;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Domain\Seniority\SeniorityRepository;

class SeniorityEntityRepository extends ServiceEntityRepository implements SeniorityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SeniorityEntity::class);
    }

    function all(): array
    {
        return $this->findAll();
    }

    public function byId(int $seniorityId)
    {
        return $this->find($seniorityId);
    }


}