<?php

namespace Domain\Tools;

use DateTimeImmutable;
use Infrastructure\Doctrine\MemberToolEntity;

class MemberTool
{
    public Tool $tool;

    public Priority $priority;

    public Status $status;

    public DateTimeImmutable $startDate;

    public DateTimeImmutable $endDate;

    public ?string $comments = "";

    /**
     * @param Tool $tool
     * @param Priority $priority
     * @param Status $status
     * @param DateTimeImmutable $startDate
     * @param DateTimeImmutable $endDate
     * @param string|null $comments
     */
    public function __construct(Tool $tool, Priority $priority, Status $status, DateTimeImmutable $startDate, DateTimeImmutable $endDate, ?string $comments)
    {
        $this->tool = $tool;
        $this->priority = $priority;
        $this->status = $status;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->comments = $comments;
    }

    public static function fromEntity(MemberToolEntity $entity): self
    {
        return new self(
            Tool::fromEntity($entity->getTool()),
            $entity->getPriority(),
            $entity->getStatus(),
            $entity->getStartDate(),
            $entity->getEndDate(),
            $entity->getComments(),
        );
    }
}