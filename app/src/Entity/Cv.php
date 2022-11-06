<?php

namespace App\Entity;

use App\Repository\CvRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CvRepository::class)]
class Cv
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $headerTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $headerSkills = null;

    #[ORM\OneToMany(mappedBy: 'cv', targetEntity: Theme::class, cascade: ['persist'])]
    private Collection $theme;

    #[ORM\Column(length: 255)]
    private ?string $fileName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nameSociety = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commercialInformation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $websiteSociety = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $color = null;

    public function __construct()
    {
        $this->theme = new ArrayCollection();
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getNameSociety(): ?string
    {
        return $this->nameSociety;
    }

    public function setNameSociety(?string $nameSociety): self
    {
        $this->nameSociety = $nameSociety;

        return $this;
    }

    public function getCommercialInformation(): ?string
    {
        return $this->commercialInformation;
    }

    public function setCommercialInformation(?string $commercialInformation): self
    {
        $this->commercialInformation = $commercialInformation;

        return $this;
    }

    public function getWebsiteSociety(): ?string
    {
        return $this->websiteSociety;
    }

    public function setWebsiteSociety(?string $websiteSociety): self
    {
        $this->websiteSociety = $websiteSociety;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }
}
