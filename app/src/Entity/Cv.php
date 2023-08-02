<?php

namespace App\Entity;

use App\Repository\CvRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CvRepository::class)]
class Cv
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $fileName = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $headerTitle = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?int $experienceYear = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $headerSkills = null;

    #[ORM\OneToMany(mappedBy: 'cv', targetEntity: Theme::class, cascade: ['persist'])]
    private Collection $theme;

    #[ORM\OneToMany(mappedBy: 'cv', targetEntity: Trainning::class, cascade: ['persist'])]
    private Collection $trainning;

    #[ORM\OneToMany(mappedBy: 'cv', targetEntity: Certification::class, cascade: ['persist'])]
    private Collection $certification;

    #[ORM\OneToMany(mappedBy: 'cv', targetEntity: TechnicalSkills::class, cascade: ['persist'])]
    private Collection $skills;

    #[ORM\OneToMany(mappedBy: 'cv', targetEntity: Experience::class, cascade: ['persist'])]
    private Collection $experience;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Ce champ ne doit pas être vide')]
    private ?string $footer = null;

    #[ORM\Column]
    private ?bool $isSynergie = null;

    public function __construct()
    {
        $this->theme = new ArrayCollection();
        $this->trainning = new ArrayCollection();
        $this->certification = new ArrayCollection();
        $this->skills = new ArrayCollection();
        $this->experience = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeaderTitle(): ?string
    {
        return $this->headerTitle;
    }

    public function setHeaderTitle(string $headerTitle): self
    {
        $this->headerTitle = $headerTitle;

        return $this;
    }

    public function getHeaderSkills(): ?string
    {
        return $this->headerSkills;
    }

    public function setHeaderSkills(string $headerSkills): self
    {
        $this->headerSkills = $headerSkills;

        return $this;
    }

    /**
     * @return Collection<int, Theme>
     */
    public function getTheme(): Collection
    {
        return $this->theme;
    }

    public function addTheme(Theme $theme): self
    {
        if (!$this->theme->contains($theme)) {
            $this->theme->add($theme);
            $theme->setCv($this);
        }

        return $this;
    }

    public function removeTheme(Theme $theme): self
    {
        if ($this->theme->removeElement($theme)) {
            // set the owning side to null (unless already changed)
            if ($theme->getCv() === $this) {
                $theme->setCv(null);
            }
        }

        return $this;
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

    /**
     * @return Collection<int, Trainning>
     */
    public function gettrainning(): Collection
    {
        return $this->trainning;
    }

    public function addtrainning(Trainning $trainning): self
    {
        if (!$this->trainning->contains($trainning)) {
            $this->trainning->add($trainning);
            $trainning->setCv($this);
        }

        return $this;
    }

    public function removetrainning(Trainning $trainning): self
    {
        if ($this->trainning->removeElement($trainning)) {
            // set the owning side to null (unless already changed)
            if ($trainning->getCv() === $this) {
                $trainning->setCv(null);
            }
        }

        return $this;
    }

    public function getExperienceYear(): ?int
    {
        return $this->experienceYear;
    }

    public function setExperienceYear(int $experienceYear): self
    {
        $this->experienceYear = $experienceYear;

        return $this;
    }

    /**
     * @return Collection<int, Certification>
     */
    public function getCertification(): Collection
    {
        return $this->certification;
    }

    public function addCertification(Certification $certification): self
    {
        if (!$this->certification->contains($certification)) {
            $this->certification->add($certification);
            $certification->setCv($this);
        }

        return $this;
    }

    public function removeCertification(Certification $certification): self
    {
        if ($this->certification->removeElement($certification)) {
            // set the owning side to null (unless already changed)
            if ($certification->getCv() === $this) {
                $certification->setCv(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TechnicalSkills>
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(TechnicalSkills $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills->add($skill);
            $skill->setCv($this);
        }

        return $this;
    }

    public function removeSkill(TechnicalSkills $skill): self
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getCv() === $this) {
                $skill->setCv(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Experience>
     */
    public function getExperience(): Collection
    {
        return $this->experience;
    }

    public function addExperience(Experience $experience): self
    {
        if (!$this->experience->contains($experience)) {
            $this->experience->add($experience);
            $experience->setCv($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): self
    {
        if ($this->experience->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getCv() === $this) {
                $experience->setCv(null);
            }
        }

        return $this;
    }

    public function getFooter(): ?string
    {
        return $this->footer;
    }

    public function setFooter(?string $footer): self
    {
        $this->footer = $footer;

        return $this;
    }

    public function isIsSynergie(): ?bool
    {
        return $this->isSynergie;
    }

    public function setIsSynergie(bool $isSynergie): self
    {
        $this->isSynergie = $isSynergie;

        return $this;
    }
}
