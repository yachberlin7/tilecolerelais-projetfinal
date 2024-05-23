<?php

namespace App\Entity;

use App\Repository\FamilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FamilleRepository::class)]
class Famille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: "id_e")]
    private ?int $idE = null;

    #[ORM\Column(length: 55)]
    private ?string $Nompere = null;

    #[ORM\Column(length: 25)]
    private ?string $Prenompere = null;

    #[ORM\Column(length: 55)]
    private ?string $Nommere = null;

    #[ORM\Column(length: 25)]
    private ?string $Prenommere = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Fratrie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $relation = null;

    #[ORM\ManyToMany(targetEntity: Enfant::class)]
    private Collection $enfants;

    public function __construct()
    {
        $this->enfants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdE(): ?int
    {
        return $this->idE;
    }

    public function setIdF(int $idE): static
    {
        $this->idE = $idE;

        return $this;
    }

    public function getNompere(): ?string
    {
        return $this->Nompere;
    }

    public function setNompere(string $Nompere): static
    {
        $this->Nompere = $Nompere;

        return $this;
    }

    public function getPrenompere(): ?string
    {
        return $this->Prenompere;
    }

    public function setPrenompere(string $Prenompere): static
    {
        $this->Prenompere = $Prenompere;

        return $this;
    }

    public function getNommere(): ?string
    {
        return $this->Nommere;
    }

    public function setNommere(string $Nommere): static
    {
        $this->Nommere = $Nommere;

        return $this;
    }

    public function getPrenommere(): ?string
    {
        return $this->Prenommere;
    }

    public function setPrenommere(string $Prenommere): static
    {
        $this->Prenommere = $Prenommere;

        return $this;
    }

    public function getFratrie(): ?string
    {
        return $this->Fratrie;
    }

    public function setFratrie(?string $Fratrie): static
    {
        $this->Fratrie = $Fratrie;

        return $this;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(?string $relation): static
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * @return Collection<int, Enfant>
     */
    public function getEnfants(): Collection
    {
        return $this->enfants;
    }

    public function addEnfant(Enfant $enfant): static
    {
        if (!$this->enfants->contains($enfant)) {
            $this->enfants->add($enfant);
        }

        return $this;
    }

    public function removeEnfant(Enfant $enfant): static
    {
        $this->enfants->removeElement($enfant);

        return $this;
    }
}