<?php

namespace Domain\Seniority;

use Domain\Member\Model\SeniorityLevel;
use Infrastructure\Doctrine\SeniorityEntity;

readonly class Seniority
{

    public SeniorityLevel $level;

    public string $description;

    public function __construct(SeniorityLevel $seniorityLevel, string $description)
    {
        $this->level = $seniorityLevel;

        $lines = array_filter(
            explode("\n", $description),
        );
        $this->description = implode("\n", $lines);
    }

    public static function fromEntity(SeniorityEntity $seniorityEntity): self
    {
        return new self(
            $seniorityEntity->getSeniority(),
            $seniorityEntity->getDescription()
        );
    }
}