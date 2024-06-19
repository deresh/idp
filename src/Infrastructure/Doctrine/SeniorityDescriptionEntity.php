<?php

namespace Infrastructure\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use Domain\Member\Model\Seniority;

#[ORM\Entity()]
class SeniorityDescriptionEntity
{
    #[ORM\Id]
    #[ORM\Column]
    private Seniority $id;

    #[ORM\Column(type: 'string', length: 1500)]
    private ?string $description = null;

    public function getId(): Seniority
    {
        return $this->id;
    }

    public function setId(Seniority $id): void
    {
        $this->id = $id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }


}
