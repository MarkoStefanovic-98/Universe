<?php

namespace App\Entity;

use App\Repository\TrounoirRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrounoirRepository::class)
 */
class Trounoir
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Galaxie::class, inversedBy="idt")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idg;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdg(): ?Galaxie
    {
        return $this->idg;
    }

    public function setIdg(?Galaxie $idg): self
    {
        $this->idg = $idg;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}
