<?php

namespace Infrastructure\Doctrine;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
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

    #[ORM\Column(type: 'date')]
    private ?DateTime $hireDate = null;



    #[ORM\Column(type: 'string', enumType: Seniority::class)]
    private Seniority $seniority;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image = null;

    #[OneToMany(targetEntity: MemberEntity::class, mappedBy: 'mentor')]
    private Collection $mentees;

    /** One Student has One Mentor. */
    #[ORM\ManyToOne(targetEntity: MemberEntity::class, inversedBy: 'mentees')]
    private MemberEntity $mentor;

    #[ORM\OneToOne(targetEntity: TeamEntity::class)]
    #[ORM\JoinColumn(name: 'team_id', referencedColumnName: 'id')]
    private ?TeamEntity $team;

    #[OneToMany(targetEntity: MemberToolEntity::class, mappedBy: 'member')]
    private Collection $tools;

    #[OneToMany(targetEntity: MemberGoalEntity::class, mappedBy: 'member')]
    private Collection $goals;

    #[ORM\ManyToMany(targetEntity: RoleEntity::class)]
    private Collection $roles;

    public function getHireDate(): ?DateTime
    {
        return $this->hireDate;
    }

    public function setHireDate(?DateTime $hireDate): void
    {
        $this->hireDate = $hireDate;
    }

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

    public function getMentor(): MemberEntity
    {
        return $this->mentor;
    }

    public function setMentor(MemberEntity $mentor): void
    {
        $this->mentor = $mentor;
    }

    public function getTeam(): ?TeamEntity
    {
        return $this->team;
    }

    public function setTeam(?TeamEntity $team): void
    {
        $this->team = $team;
    }

    public function getTools(): Collection
    {
        return $this->tools;
    }

    public function setTools(Collection $tools): void
    {
        $this->tools = $tools;
    }

    public function getGoals(): Collection
    {
        return $this->goals;
    }

    public function setGoals(Collection $goals): void
    {
        $this->goals = $goals;
    }

    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function setRoles(Collection $roles): void
    {
        $this->roles = $roles;
    }
    public function __toString(): string
    {
        return (string) $this->first_name . ' ' . $this->last_name;
    }

    public function getMentees(): Collection
    {
        return $this->mentees;
    }

    public function setMentees(Collection $mentees): void
    {
        $this->mentees = $mentees;
    }
}
