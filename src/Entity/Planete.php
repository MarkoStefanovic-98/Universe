<?php

namespace App\Entity;

use App\Repository\PlaneteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlaneteRepository::class)
 */
class Planete
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Systeme::class, inversedBy="ids")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ids;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_lune;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_satelite;

    /**
     * @ORM\Column(type="integer")
     */
    private $distance_etoile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * Transform to string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getId();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIds(): ?Systeme
    {
        return $this->ids;
    }

    public function setIds(?Systeme $ids): self
    {
        $this->ids = $ids;

        return $this;
    }

    public function getNbLune(): ?int
    {
        return $this->nb_lune;
    }

    public function setNbLune(int $nb_lune): self
    {
        $this->nb_lune = $nb_lune;

        return $this;
    }

    public function getNbSatelite(): ?int
    {
        return $this->nb_satelite;
    }

    public function setNbSatelite(int $nb_satelite): self
    {
        $this->nb_satelite = $nb_satelite;

        return $this;
    }

    public function getDistanceEtoile(): ?int
    {
        return $this->distance_etoile;
    }

    public function setDistanceEtoile(int $distance_etoile): self
    {
        $this->distance_etoile = $distance_etoile;

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
