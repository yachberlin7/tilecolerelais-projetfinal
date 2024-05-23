<?php

namespace App\Entity;

use App\Repository\DossierScolaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DossierScolaireRepository::class)]
class DossierScolaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: "id_ds")]
    private ?int $idDS = null;

    #[ORM\Column(length: 255)]
    private ?string $Parcoursscolaire = null;

    #[ORM\Column(length: 255)]
    private ?string $Classe = null;

    #[ORM\OneToOne(inversedBy: 'dossierScolaire', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?Enfant $enfants = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDS(): ?int
    {
        return $this->idDS;
    }

    public function setIdDS(int $idDS): static
    {
        $this->idDS = $idDS;

        return $this;
    }

    public function getParcoursscolaire(): ?string
    {
        return $this->Parcoursscolaire;
    }

    public function setParcoursscolaire(string $Parcoursscolaire): static
    {
        $this->Parcoursscolaire = $Parcoursscolaire;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->Classe;
    }

    public function setClasse(string $Classe): static
    {
        $this->Classe = $Classe;

        return $this;
    }

    public function getEnfants(): ?Enfant
    {
        return $this->enfants;
    }

    public function setEnfants(Enfant $enfants): static
    {
        $this->enfants = $enfants;

        return $this;
    }
}