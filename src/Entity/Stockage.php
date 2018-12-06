<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StockageRepository")
 */
class Stockage
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Stockage", inversedBy="stockages")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stockage", mappedBy="parent")
     */
    private $stockages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Produit", mappedBy="stockage")
     */
    private $produits;

    public function __construct()
    {
        $this->stockages = new ArrayCollection();
        $this->produits = new ArrayCollection();
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

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getStockages(): Collection
    {
        return $this->stockages;
    }

    public function addStockage(self $stockage): self
    {
        if (!$this->stockages->contains($stockage)) {
            $this->stockages[] = $stockage;
            $stockage->setParent($this);
        }

        return $this;
    }

    public function removeStockage(self $stockage): self
    {
        if ($this->stockages->contains($stockage)) {
            $this->stockages->removeElement($stockage);
            // set the owning side to null (unless already changed)
            if ($stockage->getParent() === $this) {
                $stockage->setParent(null);
            }
        }

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
            $produit->setStockage($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->contains($produit)) {
            $this->produits->removeElement($produit);
            // set the owning side to null (unless already changed)
            if ($produit->getStockage() === $this) {
                $produit->setStockage(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->nom;
    }
}
