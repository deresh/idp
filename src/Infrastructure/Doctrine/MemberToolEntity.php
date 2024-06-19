<?php

namespace Infrastructure\Doctrine;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToOne;
use Domain\Tools\Priority;
use Domain\Tools\Status;

#[ORM\Entity(repositoryClass: MemberEntityRepository::class)]
class MemberToolEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ManyToOne(targetEntity: MemberEntity::class, inversedBy: 'tools')]
    private MemberEntity $member;

    #[OneToOne(targetEntity: ToolEntity::class)]
    private ToolEntity $tool;

    #[ORM\Column(type: 'string', enumType: Priority::class)]
    private Priority $priority;

    #[ORM\Column(type: 'string', enumType: Status::class)]
    private Status $status;

    #[ORM\Column(type: 'datetime_immutable')]
    private DateTimeImmutable $start;

    #[ORM\Column(type: 'datetime_immutable')]
    private DateTimeImmutable $end;

    #[ORM\Column(type: 'string', length: 1024, nullable: true)]
    private string $comments = "";

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getMember(): MemberEntity
    {
        return $this->member;
    }

    public function setMember(MemberEntity $member): void
    {
        $this->member = $member;
    }

    public function getTool(): ToolEntity
    {
        return $this->tool;
    }

    public function setTool(ToolEntity $tool): void
    {
        $this->tool = $tool;
    }

    public function getPriority(): Priority
    {
        return $this->priority;
    }

    public function setPriority(Priority $priority): void
    {
        $this->priority = $priority;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    public function getStart(): DateTimeImmutable
    {
        return $this->start;
    }

    public function setStart(DateTimeImmutable $start): void
    {
        $this->start = $start;
    }

    public function getEnd(): DateTimeImmutable
    {
        return $this->end;
    }

    public function setEnd(DateTimeImmutable $end): void
    {
        $this->end = $end;
    }

    public function getComments(): string
    {
        return $this->comments;
    }

    public function setComments(string $comments): void
    {
        $this->comments = $comments;
    }
}
