<?php

namespace App\Entity;

use App\Repository\AdherentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdherentRepository::class)
 */
class Adherent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cotisation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCotisation(): ?bool
    {
        return $this->cotisation;
    }

    public function setCotisation(bool $cotisation): self
    {
        $this->cotisation = $cotisation;

        return $this;
    }
}
