<?php

namespace App\Entity;

use App\Repository\UniversRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UniversRepository::class)
 */
class Univers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_galaxie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Galaxie::class, mappedBy="idu")
     */
    private $idu;

    public function __construct()
    {
        $this->idu = new ArrayCollection();
    }

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

    public function getNbGalaxie(): ?int
    {
        return $this->nb_galaxie;
    }

    public function setNbGalaxie(int $nb_galaxie): self
    {
        $this->nb_galaxie = $nb_galaxie;

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

    /**
     * @return Collection|Galaxie[]
     */
    public function getIdu(): Collection
    {
        return $this->idu;
    }

    public function addIdu(Galaxie $idu): self
    {
        if (!$this->idu->contains($idu)) {
            $this->idu[] = $idu;
            $idu->setIdu($this);
        }

        return $this;
    }

    public function removeIdu(Galaxie $idu): self
    {
        if ($this->idu->removeElement($idu)) {
            // set the owning side to null (unless already changed)
            if ($idu->getIdu() === $this) {
                $idu->setIdu(null);
            }
        }

        return $this;
    }
}
