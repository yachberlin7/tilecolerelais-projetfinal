<?php

namespace App\Entity;

use App\Repository\DossierMedicalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DossierMedicalRepository::class)]
class DossierMedical
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: "id_dm")]
    private ?int $idDM = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Traitementcourant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Allergie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $SuiviPsychologique = null;

    #[ORM\Column]
    private ?bool $CertificatMedical = null;

    #[ORM\OneToOne(inversedBy: 'dossierMedical', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?Enfant $enfants = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDM(): ?int
    {
        return $this->idDM;
    }

    public function setIdDM(int $idDM): static
    {
        $this->idDM = $idDM;

        return $this;
    }

    public function getTraitementcourant(): ?string
    {
        return $this->Traitementcourant;
    }

    public function setTraitementcourant(?string $Traitementcourant): static
    {
        $this->Traitementcourant = $Traitementcourant;

        return $this;
    }

    public function getAllergie(): ?string
    {
        return $this->Allergie;
    }

    public function setAllergie(?string $Allergie): static
    {
        $this->Allergie = $Allergie;

        return $this;
    }

    public function getSuiviPsychologique(): ?string
    {
        return $this->SuiviPsychologique;
    }

    public function setSuiviPsychologique(?string $SuiviPsychologique): static
    {
        $this->SuiviPsychologique = $SuiviPsychologique;

        return $this;
    }

    public function isCertificatMedical(): ?bool
    {
        return $this->CertificatMedical;
    }

    public function setCertificatMedical(bool $CertificatMedical): static
    {
        $this->CertificatMedical = $CertificatMedical;

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