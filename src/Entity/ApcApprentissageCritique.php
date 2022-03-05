<?php
/*
 * Copyright (c) 2021. | David Annebicque | IUT de Troyes  - All Rights Reserved
 * @file /Users/davidannebicque/htdocs/intranetV3/src/Entity/ApcApprentissageCritique.php
 * @author davidannebicque
 * @project intranetV3
 * @lastUpdate 05/06/2021 17:31
 */

namespace App\Entity;

use App\Repository\ApcApprentissageCritiqueRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApcApprentissageCritiqueRepository::class)]
#[ORM\HasLifecycleCallbacks]
class ApcApprentissageCritique
{
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    #[ORM\Id]
    private ?int $id;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $libelle = null;

    #[ORM\Column(type: Types::STRING, length: 20)]
    private ?string $code = null;

    #[ORM\ManyToOne(targetEntity: ApcNiveau::class, inversedBy: 'apcApprentissageCritiques')]
    private ?ApcNiveau $niveau;

    public function __construct(?ApcNiveau $niveau = null)
    {
        $this->niveau = $niveau;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = trim($code);

        return $this;
    }

    public function getCompetence(): ?ApcCompetence
    {
        if (null !== $this->getNiveau()) {
            return $this->getNiveau()->getCompetence();
        }

        return null;
    }

    public function getNiveau(): ?ApcNiveau
    {
        return $this->niveau;
    }

    public function setNiveau(?ApcNiveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }
}
