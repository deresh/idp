<?php

namespace Domain\Seniority;


interface SeniorityRepository
{
    function all(): array;

    public function byId(int $seniorityId);
}