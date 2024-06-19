<?php

namespace Infrastructure\Doctrine;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Domain\Tools\Status;

#[ORM\Entity(repositoryClass: MemberEntityRepository::class)]
class MemberGoalEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ManyToOne(targetEntity: MemberEntity::class, inversedBy: 'goals')]
    private MemberEntity $member;

    #[ORM\Column(type: 'datetime_immutable')]
    private DateTimeImmutable $start;

    #[ORM\Column(type: 'datetime_immutable')]
    private DateTimeImmutable $end;

    #[ORM\Column(type: 'string', length: 1500)]
    private ?string $sucessMeasures = null;

    #[ORM\Column(type: 'string', length: 1500)]
    private ?string $opportunities = null;

    #[ORM\Column(type: 'string', length: 1500)]
    private ?string $supportNeeded = null;

    #[ORM\Column(type: 'string', length: 2500)]
    private ?string $actionsTaken = null;

    #[ORM\Column(type: 'string', enumType: Status::class)]
    private Status $status = Status::ToDo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getMember(): MemberEntity
    {
        return $this->member;
    }

    public function setMember(MemberEntity $member): void
    {
        $this->member = $member;
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

    public function getSucessMeasures(): ?string
    {
        return $this->sucessMeasures;
    }

    public function setSucessMeasures(?string $sucessMeasures): void
    {
        $this->sucessMeasures = $sucessMeasures;
    }

    public function getOpportunities(): ?string
    {
        return $this->opportunities;
    }

    public function setOpportunities(?string $opportunities): void
    {
        $this->opportunities = $opportunities;
    }

    public function getSupportNeeded(): ?string
    {
        return $this->supportNeeded;
    }

    public function setSupportNeeded(?string $supportNeeded): void
    {
        $this->supportNeeded = $supportNeeded;
    }

    public function getActionsTaken(): ?string
    {
        return $this->actionsTaken;
    }

    public function setActionsTaken(?string $actionsTaken): void
    {
        $this->actionsTaken = $actionsTaken;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }
}
