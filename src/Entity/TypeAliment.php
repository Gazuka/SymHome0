<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeAlimentRepository")
 */
class TypeAliment
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
     * @ORM\OneToMany(targetEntity="App\Entity\Aliment", mappedBy="typeAliment")
     */
    private $aliments;

    public function __construct()
    {
        $this->aliments = new ArrayCollection();
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

    /**
     * @return Collection|Aliment[]
     */
    public function getAliments(): Collection
    {
        return $this->aliments;
    }

    public function addAliment(Aliment $aliment): self
    {
        if (!$this->aliments->contains($aliment)) {
            $this->aliments[] = $aliment;
            $aliment->setTypeAliment($this);
        }

        return $this;
    }

    public function removeAliment(Aliment $aliment): self
    {
        if ($this->aliments->contains($aliment)) {
            $this->aliments->removeElement($aliment);
            // set the owning side to null (unless already changed)
            if ($aliment->getTypeAliment() === $this) {
                $aliment->setTypeAliment(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->nom;
    }
}
