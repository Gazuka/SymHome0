<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlimentRepository")
 */
class Aliment
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
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeAliment", inversedBy="aliments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeAliment;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Produit", mappedBy="aliment")
     */
    private $produits;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ingredient", mappedBy="aliment")
     */
    private $ingredients;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Unite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $uniteDefault;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
        $this->ingredients = new ArrayCollection();
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

    public function getTypeAliment(): ?TypeAliment
    {
        return $this->typeAliment;
    }

    public function setTypeAliment(?TypeAliment $typeAliment): self
    {
        $this->typeAliment = $typeAliment;

        return $this;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setAliment($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->contains($produit)) {
            $this->produits->removeElement($produit);
            // set the owning side to null (unless already changed)
            if ($produit->getAliment() === $this) {
                $produit->setAliment(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->nom;
    }

    /**
     * @return Collection|Ingredient[]
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
            $ingredient->setAliment($this);
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        if ($this->ingredients->contains($ingredient)) {
            $this->ingredients->removeElement($ingredient);
            // set the owning side to null (unless already changed)
            if ($ingredient->getAliment() === $this) {
                $ingredient->setAliment(null);
            }
        }

        return $this;
    }

    public function getUniteDefault(): ?Unite
    {
        return $this->uniteDefault;
    }

    public function setUniteDefault(?Unite $uniteDefault): self
    {
        $this->uniteDefault = $uniteDefault;

        return $this;
    }
}
