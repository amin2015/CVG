<?php

namespace App\Entity;

use App\Repository\SubThemeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubThemeRepository::class)]
class SubTheme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $year = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $qualification = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $skillsTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $skillsDescription = null;

    #[ORM\ManyToOne(inversedBy: 'subTheme')]
    private ?Theme $theme = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getQualification(): ?string
    {
        return $this->qualification;
    }

    public function setQualification(?string $qualification): self
    {
        $this->qualification = $qualification;

        return $this;
    }

    public function getSkillsTitle(): ?string
    {
        return $this->skillsTitle;
    }

    public function setSkillsTitle(?string $skillsTitle): self
    {
        $this->skillsTitle = $skillsTitle;

        return $this;
    }

    public function getSkillsDescription(): ?string
    {
        return $this->skillsDescription;
    }

    public function setSkillsDescription(?string $skillsDescription): self
    {
        $this->skillsDescription = $skillsDescription;

        return $this;
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }
}
