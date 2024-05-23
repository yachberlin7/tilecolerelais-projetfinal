<?php

namespace App\Entity;

use App\Repository\DossierStageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DossierStageRepository::class)]
class DossierStage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: "id_dst")]
    private ?int $idDST = null;

    #[ORM\Column(length: 255)]
    private ?string $Priseencharge = null;

    #[ORM\Column(length: 255)]
    private ?string $ModuleOpt = null;

    #[ORM\OneToOne(inversedBy: 'dossierStage', cascade: ['persist', 'remove'])]
    private ?Enfant $enfants = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDST(): ?int
    {
        return $this->idDST;
    }

    public function setIdDST(int $idDST): static
    {
        $this->idDST = $idDST;

        return $this;
    }

    public function getPriseencharge(): ?string
    {
        return $this->Priseencharge;
    }

    public function setPriseencharge(string $Priseencharge): static
    {
        $this->Priseencharge = $Priseencharge;

        return $this;
    }

    public function getModuleOpt(): ?string
    {
        return $this->ModuleOpt;
    }

    public function setModuleOpt(string $ModuleOpt): static
    {
        $this->ModuleOpt = $ModuleOpt;

        return $this;
    }

    public function getEnfants(): ?Enfant
    {
        return $this->enfants;
    }

    public function setEnfants(?Enfant $enfants): static
    {
        $this->enfants = $enfants;

        return $this;
    }
}