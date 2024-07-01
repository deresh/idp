<?php

namespace Domain\Seniority;


interface SeniorityRepository
{
    /**
     * @return array|Seniority[]
     */
    function all(): array;

    public function byId(int $seniorityId);
}