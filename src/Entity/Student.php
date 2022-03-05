<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student extends User
{
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    #[ORM\Id]
    private ?int $id;

    #[ORM\OneToMany(mappedBy: "student", targetEntity: Trace::class)]
    private ArrayCollection $traces;

    public function __construct()
    {
        $this->traces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTraces(): Collection
    {
        return $this->traces;
    }

    public function addTrace(Trace $trace): self
    {
        if (!$this->traces->contains($trace)) {
            $this->traces[] = $trace;
            $trace->setStudent($this);
        }

        return $this;
    }

    public function removeTrace(Trace $trace): self
    {
        if ($this->traces->removeElement($trace)) {
            // set the owning side to null (unless already changed)
            if ($trace->getStudent() === $this) {
                $trace->setStudent(null);
            }
        }

        return $this;
    }
}
