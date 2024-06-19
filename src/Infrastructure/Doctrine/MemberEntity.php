<?php

namespace Infrastructure\Doctrine;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Domain\Member\Model\Seniority;

#[ORM\Entity(repositoryClass: MemberEntityRepository::class)]
class MemberEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $first_name = null;

    #[ORM\Column(length: 100)]
    private ?string $last_name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(type: 'string', enumType: Seniority::class)]
    private Seniority $seniority;

    #[ORM\Column(type: 'string')]
    private ?string $image = null;

    /** One Student has One Mentor. */
    #[ORM\OneToOne(targetEntity: MemberEntity::class)]
    #[ORM\JoinColumn(name: 'mentor_id', referencedColumnName: 'id')]
    private MemberEntity $mentor;

    #[ORM\OneToOne(targetEntity: TeamEntity::class)]
    #[ORM\JoinColumn(name: 'team_id', referencedColumnName: 'id')]
    private ?TeamEntity $team;

    #[OneToMany(targetEntity: MemberToolEntity::class, mappedBy: 'member')]
    private Collection $tools;

    #[OneToMany(targetEntity: MemberGoalEntity::class, mappedBy: 'member')]
    private Collection $goals;



    public function getSeniority(): Seniority
    {
        return $this->seniority;
    }

    public function setSeniority(Seniority $seniority): void
    {
        $this->seniority = $seniority;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): static
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): static
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}
