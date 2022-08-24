<?php

namespace App\Entity;

use App\Repository\PropertySpecificationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PropertySpecificationRepository::class)]
class PropertySpecification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $max_hostages = null;

    #[ORM\Column]
    private ?int $bathroom = null;

    #[ORM\Column]
    private ?int $bed = null;

    #[ORM\Column]
    private ?int $bedroom = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaxHostages(): ?int
    {
        return $this->max_hostages;
    }

    public function setMaxHostages(int $max_hostages): self
    {
        $this->max_hostages = $max_hostages;

        return $this;
    }

    public function getBathroom(): ?int
    {
        return $this->bathroom;
    }

    public function setBathroom(int $bathroom): self
    {
        $this->bathroom = $bathroom;

        return $this;
    }

    public function getBed(): ?int
    {
        return $this->bed;
    }

    public function setBed(int $bed): self
    {
        $this->bed = $bed;

        return $this;
    }

    public function getBedroom(): ?int
    {
        return $this->bedroom;
    }

    public function setBedroom(int $bedroom): self
    {
        $this->bedroom = $bedroom;

        return $this;
    }
}
