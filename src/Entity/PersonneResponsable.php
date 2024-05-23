<?php

namespace App\Entity;

use App\Repository\PersonneResponsableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonneResponsableRepository::class)]
class PersonneResponsable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name:"id_rp")]
    private ?int $idRP = null;

    #[ORM\Column(length: 55)]
    private ?string $NomPR = null;

    #[ORM\Column(length: 25)]
    private ?string $PrenomPR = null;

    #[ORM\Column]
    private ?int $TelephonePR = null;

    #[ORM\OneToMany(mappedBy: 'idpersonneresponsable', targetEntity: Enfant::class)]
    private Collection $enfants;

    public function __construct()
    {
        $this->enfants = new ArrayCollection();
    }

    
    
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdRP(): ?int
    {
        return $this->idRP;
    }

    public function setIdRP(int $idRP): static
    {
        $this->idRP = $idRP;

        return $this;
    }

    public function getNomPR(): ?string
    {
        return $this->NomPR;
    }

    public function setNomPR(string $NomPR): static
    {
        $this->NomPR = $NomPR;

        return $this;
    }

    public function getPrenomPR(): ?string
    {
        return $this->PrenomPR;
    }

    public function setPrenomPR(string $PrenomPR): static
    {
        $this->PrenomPR = $PrenomPR;

        return $this;
    }

    public function getTelephonePR(): ?int
    {
        return $this->TelephonePR;
    }

    public function setTelephonePR(int $TelephonePR): static
    {
        $this->TelephonePR = $TelephonePR;

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
            $enfant->setIdpersonneresponsable($this);
        }

        return $this;
    }

    public function removeEnfant(Enfant $enfant): static
    {
        if ($this->enfants->removeElement($enfant)) {
            // set the owning side to null (unless already changed)
            if ($enfant->getIdpersonneresponsable() === $this) {
                $enfant->setIdpersonneresponsable(null);
            }
        }

        return $this;
    }

    
    
}