<?php

namespace Infrastructure\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use Domain\Member\Model\Seniority;

#[ORM\Entity()]
class SeniorityEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private Seniority $seniority;

    #[ORM\Column(type: 'string', length: 1500)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getSeniority(): Seniority
    {
        return $this->seniority;
    }

    public function setSeniority(Seniority $seniority): void
    {
        $this->seniority = $seniority;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function __toString(): string
    {
        return $this->seniority->name;
    }


}
