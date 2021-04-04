<?php

namespace App\Entity;

use App\Repository\GalaxieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GalaxieRepository::class)
 */
class Galaxie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Univers::class, inversedBy="idu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Systeme::class, mappedBy="idg")
     */
    private $idg;

    /**
     * @ORM\OneToMany(targetEntity=Trounoir::class, mappedBy="idg")
     */
    private $idt;

    public function __construct()
    {
        $this->idg = new ArrayCollection();
        $this->idt = new ArrayCollection();
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

    public function getIdu(): ?Univers
    {
        return $this->idu;
    }

    public function setIdu(?Univers $idu): self
    {
        $this->idu = $idu;

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
     * @return Collection|Systeme[]
     */
    public function getIdg(): Collection
    {
        return $this->idg;
    }

    public function addIdg(Systeme $idg): self
    {
        if (!$this->idg->contains($idg)) {
            $this->idg[] = $idg;
            $idg->setIdg($this);
        }

        return $this;
    }

    public function removeIdg(Systeme $idg): self
    {
        if ($this->idg->removeElement($idg)) {
            // set the owning side to null (unless already changed)
            if ($idg->getIdg() === $this) {
                $idg->setIdg(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Trounoir[]
     */
    public function getIdt(): Collection
    {
        return $this->idt;
    }

    public function addIdt(Trounoir $idt): self
    {
        if (!$this->idt->contains($idt)) {
            $this->idt[] = $idt;
            $idt->setIdg($this);
        }

        return $this;
    }

    public function removeIdt(Trounoir $idt): self
    {
        if ($this->idt->removeElement($idt)) {
            // set the owning side to null (unless already changed)
            if ($idt->getIdg() === $this) {
                $idt->setIdg(null);
            }
        }

        return $this;
    }
}
