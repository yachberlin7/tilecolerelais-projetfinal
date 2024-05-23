<?php

namespace App\Entity;

use App\Repository\EnfantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnfantRepository::class)]
class Enfant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name:"id_e")]
    private ?int $idE = null;

    #[ORM\Column(length: 55)]
    private ?string $Nom = null;

    #[ORM\Column(length: 25)]
    private ?string $Prenom = null;

    #[ORM\Column]
    private ?int $Age = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse = null;

    #[ORM\ManyToOne(inversedBy: 'enfants')]
    #[ORM\JoinColumn(nullable: true    )]
    private ?PersonneResponsable $personneResponsable = null;

    #[ORM\OneToOne(mappedBy: 'enfants', cascade: ['persist', 'remove'])]
    private ?DossierMedical $dossierMedical = null;

    #[ORM\OneToOne(mappedBy: 'enfants', cascade: ['persist', 'remove'])]
    private ?DossierScolaire $dossierScolaire = null;

    #[ORM\OneToOne(mappedBy: 'enfants', cascade: ['persist', 'remove'])]
    private ?DossierStage $dossierStage = null;

    #[ORM\ManyToOne(inversedBy: 'enfants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PersonneResponsable $idRP = null;

    #[ORM\ManyToOne(inversedBy: 'enfants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PersonneResponsable $personneresponsableid = null;

    #[ORM\ManyToOne(inversedBy: 'enfants')]
    private ?PersonneResponsable $idpersonneresponsable = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdE(): ?int
    {
        return $this->idE;
    }

    public function setIdE(int $idE): static
    {
        $this->idE = $idE;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->Age;
    }

    public function setAge(int $Age): static
    {
        $this->Age = $Age;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): static
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getPersonneResponsable(): ?PersonneResponsable
    {
        return $this->personneResponsable;
    }

    public function setPersonneResponsable(?PersonneResponsable $personneResponsable): static
    {
        $this->personneResponsable = $personneResponsable;

        return $this;
    }

    public function getDossierMedical(): ?DossierMedical
    {
        return $this->dossierMedical;
    }

    public function setDossierMedical(DossierMedical $dossierMedical): static
    {
        // set the owning side of the relation if necessary
        if ($dossierMedical->getEnfants() !== $this) {
            $dossierMedical->setEnfants($this);
        }

        $this->dossierMedical = $dossierMedical;

        return $this;
    }

    public function getDossierScolaire(): ?DossierScolaire
    {
        return $this->dossierScolaire;
    }

    public function setDossierScolaire(DossierScolaire $dossierScolaire): static
    {
        // set the owning side of the relation if necessary
        if ($dossierScolaire->getEnfants() !== $this) {
            $dossierScolaire->setEnfants($this);
        }

        $this->dossierScolaire = $dossierScolaire;

        return $this;
    }

    public function getDossierStage(): ?DossierStage
    {
        return $this->dossierStage;
    }

    public function setDossierStage(?DossierStage $dossierStage): static
    {
        // unset the owning side of the relation if necessary
        if ($dossierStage === null && $this->dossierStage !== null) {
            $this->dossierStage->setEnfants(null);
        }

        // set the owning side of the relation if necessary
        if ($dossierStage !== null && $dossierStage->getEnfants() !== $this) {
            $dossierStage->setEnfants($this);
        }

        $this->dossierStage = $dossierStage;

        return $this;
    }

    public function getIdRP(): ?PersonneResponsable
    {
        return $this->idRP;
    }

    public function setIdRP(?PersonneResponsable $idRP): static
    {
        $this->idRP = $idRP;

        return $this;
    }

    public function getPersonneresponsableid(): ?PersonneResponsable
    {
        return $this->personneresponsableid;
    }

    public function setPersonneresponsableid(?PersonneResponsable $personneresponsableid): static
    {
        $this->personneresponsableid = $personneresponsableid;

        return $this;
    }

    public function getIdpersonneresponsable(): ?PersonneResponsable
    {
        return $this->idpersonneresponsable;
    }

    public function setIdpersonneresponsable(?PersonneResponsable $idpersonneresponsable): static
    {
        $this->idpersonneresponsable = $idpersonneresponsable;

        return $this;
    }
}