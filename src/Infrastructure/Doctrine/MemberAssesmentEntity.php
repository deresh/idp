<?php

namespace Infrastructure\Doctrine;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Domain\Member\Model\SeniorityLevel;
use Domain\Tools\ProgressStatus;

#[ORM\Entity()]
class MemberAssesmentEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ManyToOne(targetEntity: MemberEntity::class, inversedBy: 'goals')]
    private MemberEntity $member;

    #[ORM\Column(type: 'datetime_immutable')]
    private DateTimeImmutable $dateTime;

    #[ORM\Column(type: 'string', enumType: SeniorityLevel::class)]
    private SeniorityLevel $selfAssessedSeniority;

    #[ORM\Column(type: 'string', enumType: SeniorityLevel::class)]
    private SeniorityLevel $agreedSeniority;

    #[ORM\Column(type: 'string', nullable: true, enumType: ProgressStatus::class)]
    private ProgressStatus $progressStatus = ProgressStatus::OnBoarding;

    #[ORM\Column(type: 'json', nullable: true)]
    private array $strengths;
    #[ORM\Column(type: 'json', nullable: true)]
    private array $weaknesses;


    public function __construct()
    {
        $this->weaknesses = [];
        $this->strengths = [];
    }

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

    public function getDateTime(): DateTimeImmutable
    {
        return $this->dateTime;
    }

    public function setDateTime(DateTimeImmutable $dateTime): void
    {
        $this->dateTime = $dateTime;
    }

    public function getProgressStatus(): ProgressStatus
    {
        return $this->progressStatus;
    }

    public function setProgressStatus(ProgressStatus $progressStatus): void
    {
        $this->progressStatus = $progressStatus;
    }

    public function getStrengths(): array
    {
        return $this->strengths;
    }

    public function setStrengths(array $strengths): void
    {
        $this->strengths = $strengths;
    }

    public function getWeaknesses(): array
    {
        return $this->weaknesses;
    }

    public function setWeaknesses(array $weaknesses): void
    {
        $this->weaknesses = $weaknesses;
    }

    public function getSelfAssessedSeniority(): SeniorityLevel
    {
        return $this->selfAssessedSeniority;
    }

    public function setSelfAssessedSeniority(SeniorityLevel $selfAssessedSeniority): void
    {
        $this->selfAssessedSeniority = $selfAssessedSeniority;
    }

    public function getAgreedSeniority(): SeniorityLevel
    {
        return $this->agreedSeniority;
    }

    public function setAgreedSeniority(SeniorityLevel $agreedSeniority): void
    {
        $this->agreedSeniority = $agreedSeniority;
    }
}
