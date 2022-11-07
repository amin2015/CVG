<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThemeRepository::class)]
class Theme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'theme')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cv $cv = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'theme', targetEntity: SubTheme::class, cascade: ['persist'])]
    private Collection $subTheme;

    public function __construct()
    {
        $this->subTheme = new ArrayCollection();
        $this->type = 1;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCv(): ?Cv
    {
        return $this->cv;
    }

    public function setCv(?Cv $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function addSubTheme(SubTheme $subTheme): self
    {
        if (!$this->subTheme->contains($subTheme)) {
            $this->subTheme->add($subTheme);
            $subTheme->setTheme($this);
        }

        return $this;
    }

    public function removeSubTheme(SubTheme $subTheme): self
    {
        if ($this->subTheme->removeElement($subTheme)) {
            // set the owning side to null (unless already changed)
            if ($subTheme->getTheme() === $this) {
                $subTheme->setTheme(null);
            }
        }

        return $this;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getSubTheme(): ArrayCollection|Collection
    {
        return $this->subTheme;
    }

//    /**
//     * @param ArrayCollection|Collection $subTheme
//     */
//    public function setSubTheme(ArrayCollection|Collection $subTheme): void
//    {
//        $this->subTheme = $subTheme;
//    }


}
