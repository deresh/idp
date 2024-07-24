<?php

namespace Domain\Tools;

use Domain\Member\Model\SeniorityLevel;
use Infrastructure\Doctrine\ToolEntity;

class Tool
{
    public string $name;

    public string $description;
    public SeniorityLevel $seniority;

    /**
     * @param string $name
     * @param string $description
     * @param SeniorityLevel $seniority
     */
    public function __construct(string $name, string $description, SeniorityLevel $seniority)
    {
        $this->name = $name;
        $this->description = $description;
        $this->seniority = $seniority;
    }

    public static function fromEntity(ToolEntity $tool)
    {
        return new static($tool->getName(), $tool->getDescription(), $tool->getSeniority());
    }
}