<?php

namespace App\Entity;

use App\Repository\ProfileRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfileRepository::class)]
class Profile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $fileName = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $technicalSkills = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $trainings = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $reference = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $personnelProjects = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $language = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $professionalExperience = null;

    #[ORM\Column(length: 255)]
    private ?string $logo = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $head = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $footer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getTechnicalSkills(): ?string
    {
        return $this->technicalSkills;
    }

    public function setTechnicalSkills(string $technicalSkills): self
    {
        $this->technicalSkills = $technicalSkills;

        return $this;
    }

    public function getTrainings(): ?string
    {
        return $this->trainings;
    }

    public function setTrainings(string $trainings): self
    {
        $this->trainings = $trainings;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getPersonnelProjects(): ?string
    {
        return $this->personnelProjects;
    }

    public function setPersonnelProjects(string $personnelProjects): self
    {
        $this->personnelProjects = $personnelProjects;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getProfessionalExperience(): ?string
    {
        return $this->professionalExperience;
    }

    public function setProfessionalExperience(string $professionalExperience): self
    {
        $this->professionalExperience = $professionalExperience;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getHead(): ?string
    {
        return $this->head;
    }

    public function setHead(string $head): self
    {
        $this->head = $head;

        return $this;
    }

    public function getFooter(): ?string
    {
        return $this->footer;
    }

    public function setFooter(string $footer): self
    {
        $this->footer = $footer;

        return $this;
    }
}
