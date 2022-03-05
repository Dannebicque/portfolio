<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: TeacherRepository::class)]
class Teacher extends User
{
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    #[ORM\Id]
    private ?int $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
