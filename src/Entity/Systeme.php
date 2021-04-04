<?php

namespace App\Entity;

use App\Repository\SystemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SystemeRepository::class)
 */
class Systeme
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Galaxie::class, inversedBy="idg")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idg;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etoile;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_planete;

    /**
     * @ORM\OneToMany(targetEntity=Planete::class, mappedBy="ids")
     */
    private $ids;

    public function __construct()
    {
        $this->ids = new ArrayCollection();
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

    public function getEtoile(): ?string
    {
        return $this->etoile;
    }

    public function setEtoile(string $etoile): self
    {
        $this->etoile = $etoile;

        return $this;
    }

    public function getNbPlanete(): ?int
    {
        return $this->nb_planete;
    }

    public function setNbPlanete(int $nb_planete): self
    {
        $this->nb_planete = $nb_planete;

        return $this;
    }

    /**
     * @return Collection|Planete[]
     */
    public function getIds(): Collection
    {
        return $this->ids;
    }

    public function addId(Planete $id): self
    {
        if (!$this->ids->contains($id)) {
            $this->ids[] = $id;
            $id->setIds($this);
        }

        return $this;
    }

    public function removeId(Planete $id): self
    {
        if ($this->ids->removeElement($id)) {
            // set the owning side to null (unless already changed)
            if ($id->getIds() === $this) {
                $id->setIds(null);
            }
        }

        return $this;
    }
}
