<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlatRepository")
 */
class Plat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="date")
     */
    private $datePreparation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Boite", mappedBy="plat")
     */
    private $boites;

    public function __construct()
    {
        $this->boite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDatePreparation(): ?\DateTimeInterface
    {
        return $this->datePreparation;
    }

    public function setDatePreparation(\DateTimeInterface $datePreparation): self
    {
        $this->datePreparation = $datePreparation;

        return $this;
    }

    /**
     * @return Collection|Boite[]
     */
    public function getBoite(): Collection
    {
        return $this->boite;
    }

    public function addBoite(Boite $boite): self
    {
        if (!$this->boite->contains($boite)) {
            $this->boite[] = $boite;
            $boite->setPlat($this);
        }

        return $this;
    }

    public function removeBoite(Boite $boite): self
    {
        if ($this->boite->contains($boite)) {
            $this->boite->removeElement($boite);
            // set the owning side to null (unless already changed)
            if ($boite->getPlat() === $this) {
                $boite->setPlat(null);
            }
        }

        return $this;
    }
}
