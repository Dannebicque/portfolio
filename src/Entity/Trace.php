<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\MappedSuperclass]
class Trace
{
    #[ORM\Column(type: 'text')]
    private ?string $description = '';

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $datePost;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?DateTimeInterface $dateValidated;

    #[ORM\Column(type: 'boolean')]
    private ?bool $validate = false;

    #[ORM\ManyToOne(targetEntity: Student::class, inversedBy: 'traces')]
    private ?Student $student;

    public function __construct()
    {
        $this->datePost = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDatePost(): ?DateTimeInterface
    {
        return $this->datePost;
    }

    public function setDatePost(DateTimeInterface $datePost): self
    {
        $this->datePost = $datePost;

        return $this;
    }

    public function getDateValidated(): ?DateTimeInterface
    {
        return $this->dateValidated;
    }

    public function setDateValidated(?DateTimeInterface $dateValidated): self
    {
        $this->dateValidated = $dateValidated;

        return $this;
    }

    public function getValidate(): ?bool
    {
        return $this->validate;
    }

    public function setValidate(bool $validate): self
    {
        $this->validate = $validate;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): self
    {
        $this->student = $student;

        return $this;
    }
}
