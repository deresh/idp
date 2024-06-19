<?php

namespace Infrastructure\Doctrine;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Entity(repositoryClass: MemberEntityRepository::class)]
class MemberPerformanceReviewEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ManyToOne(targetEntity: MemberEntity::class, inversedBy: 'goals')]
    private MemberEntity $member;

    #[ORM\OneToOne(targetEntity: MemberEntity::class)]
    private MemberEntity $mentor;

    #[ORM\Column(type: 'datetime_immutable')]
    private DateTimeImmutable $srmDate;

    #[ORM\Column(type: 'string', length: 2500)]
    private ?string $feedback = null;

    #[ORM\Column(type: 'string', length: 2500)]
    private ?string $response = null;

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

    public function getMentor(): MemberEntity
    {
        return $this->mentor;
    }

    public function setMentor(MemberEntity $mentor): void
    {
        $this->mentor = $mentor;
    }

    public function getSrmDate(): DateTimeImmutable
    {
        return $this->srmDate;
    }

    public function setSrmDate(DateTimeImmutable $srmDate): void
    {
        $this->srmDate = $srmDate;
    }

    public function getFeedback(): ?string
    {
        return $this->feedback;
    }

    public function setFeedback(?string $feedback): void
    {
        $this->feedback = $feedback;
    }

    public function getResponse(): ?string
    {
        return $this->response;
    }

    public function setResponse(?string $response): void
    {
        $this->response = $response;
    }
}
