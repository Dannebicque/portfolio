<?php
/*
 * Copyright (c) 2021. | David Annebicque | IUT de Troyes  - All Rights Reserved
 * @file /Users/davidannebicque/htdocs/intranetV3/src/Entity/Diplome.php
 * @author davidannebicque
 * @project intranetV3
 * @lastUpdate 22/09/2021 12:08
 */

namespace App\Entity;

use App\Repository\DiplomeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiplomeRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Diplome
{
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    #[ORM\Id]
    private ?int $id;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $libelle = null;

    /**
     * @var \Doctrine\Common\Collections\Collection<int, \App\Entity\Annee>
     */
    #[ORM\OneToMany(mappedBy: 'diplome', targetEntity: Annee::class)]
    #[ORM\OrderBy(value: ['libelle' => 'ASC'])]
    private Collection $annees;

    #[ORM\Column(type: Types::STRING, length: 40)]
    private ?string $sigle = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $actif = true;

    /**
     * @var \Doctrine\Common\Collections\Collection<int, \App\Entity\ApcCompetence>
     */
    #[ORM\OneToMany(mappedBy: 'diplome', targetEntity: ApcCompetence::class)]
    private Collection $apcComptences;

    /**
     * @var \Doctrine\Common\Collections\Collection<int, \App\Entity\ApcParcours>
     */
    #[ORM\OneToMany(mappedBy: 'diplome', targetEntity: ApcParcours::class)]
    private Collection $apcParcours;

    public function __construct()
    {
        $this->annees = new ArrayCollection();
        $this->apcComptences = new ArrayCollection();
        $this->apcParcours = new ArrayCollection();
    }

    public function getDisplay(): ?string
    {
        if (null !== $this->getTypeDiplome()) {
            return $this->getTypeDiplome()->getSigle() . ' ' . $this->libelle;
        }

        return $this->libelle;
    }

    public function addAnnee(Annee $annee): self
    {
        if (!$this->annees->contains($annee)) {
            $this->annees[] = $annee;
            $annee->setDiplome($this);
        }

        return $this;
    }

    public function removeAnnee(Annee $annee): self
    {
        if ($this->annees->contains($annee)) {
            $this->annees->removeElement($annee);
            // set the owning side to null (unless already changed)
            if ($annee->getDiplome() === $this) {
                $annee->setDiplome(null);
            }
        }

        return $this;
    }

    public function getSigle(): ?string
    {
        return $this->sigle;
    }

    public function setSigle(string $sigle): self
    {
        $this->sigle = $sigle;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
    }

    /**
     * @return Collection|Annee[]
     */
    public function getAnnees(): Collection
    {
        return $this->annees;
    }

    public function getApcComptences(): Collection
    {
        return $this->apcComptences;
    }

    public function addApcComptence(ApcCompetence $apcComptence): self
    {
        if (!$this->apcComptences->contains($apcComptence)) {
            $this->apcComptences[] = $apcComptence;
            $apcComptence->setDiplome($this);
        }

        return $this;
    }

    public function removeApcComptence(ApcCompetence $apcComptence): self
    {
        if ($this->apcComptences->contains($apcComptence)) {
            $this->apcComptences->removeElement($apcComptence);
            // set the owning side to null (unless already changed)
            if ($apcComptence->getDiplome() === $this) {
                $apcComptence->setDiplome(null);
            }
        }

        return $this;
    }

    public function getApcParcours(): Collection
    {
        return $this->apcParcours;
    }

    public function addApcParcour(ApcParcours $apcParcour): self
    {
        if (!$this->apcParcours->contains($apcParcour)) {
            $this->apcParcours[] = $apcParcour;
            $apcParcour->setDiplome($this);
        }

        return $this;
    }

    public function removeApcParcour(ApcParcours $apcParcour): self
    {
        // set the owning side to null (unless already changed)
        if ($this->apcParcours->removeElement($apcParcour) && $apcParcour->getDiplome() === $this) {
            $apcParcour->setDiplome(null);
        }

        return $this;
    }
}
