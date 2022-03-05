<?php

namespace App\Entity;

use App\Repository\TraceFileRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TraceFileRepository::class)]
class TraceFile extends Trace
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 50)]
    private ?string $fichier;

    #[ORM\Column(type: 'float')]
    private ?float $taille;

    #[ORM\Column(type: 'string', length: 20)]
    private ?string $typeFichier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(string $fichier): self
    {
        $this->fichier = $fichier;

        return $this;
    }

    public function getTaille(): ?float
    {
        return $this->taille;
    }

    public function setTaille(float $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getTypeFichier(): ?string
    {
        return $this->typeFichier;
    }

    public function setTypeFichier(string $typeFichier): self
    {
        $this->typeFichier = $typeFichier;

        return $this;
    }
}
