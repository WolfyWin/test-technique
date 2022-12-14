<?php

namespace App\Entity;

use App\Repository\NumberRepository;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

#[ORM\Entity(repositoryClass: NumberRepository::class)]
class Number implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $value = null;

    // On indique comment le nombre doit être transformé en JSON
    // cette méthode est appelée automatiquement par la méthode json_encode() de PHP
    public function jsonSerialize()
    {
        // Ici on se contente de retourner la valeur de la propriété "value"
        return $this->value;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }
}
