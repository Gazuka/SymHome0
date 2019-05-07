<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecetteRepository")
 */
class Recette
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
     * @ORM\OneToMany(targetEntity="App\Entity\Ingredient", mappedBy="recette")
     */
    private $ingredients;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $portions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Etape", mappedBy="recette")
     */
    private $etapes;

    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
        $this->etapes = new ArrayCollection();
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
     * @return Collection|ingredient[]
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(ingredient $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
            $ingredient->setRecette($this);
        }

        return $this;
    }

    public function removeIngredient(ingredient $ingredient): self
    {
        if ($this->ingredients->contains($ingredient)) {
            $this->ingredients->removeElement($ingredient);
            // set the owning side to null (unless already changed)
            if ($ingredient->getRecette() === $this) {
                $ingredient->setRecette(null);
            }
        }

        return $this;
    }

    public function getPortions(): ?int
    {
        return $this->portions;
    }

    public function setPortions(?int $portions): self
    {
        $this->portions = $portions;

        return $this;
    }

    public function __toString() {
        return $this->nom;
    }

    /**
     * @return Collection|Etape[]
     */
    public function getEtapes(): Collection
    {
        return $this->etapes;
    }

    public function addEtape(Etape $etape): self
    {
        if (!$this->etapes->contains($etape)) {
            $this->etapes[] = $etape;
            $etape->setRecette($this);
        }

        return $this;
    }

    public function removeEtape(Etape $etape): self
    {
        if ($this->etapes->contains($etape)) {
            $this->etapes->removeElement($etape);
            // set the owning side to null (unless already changed)
            if ($etape->getRecette() === $this) {
                $etape->setRecette(null);
            }
        }

        return $this;
    }

    public function afficheEtape($num)
    {        
        return $this->detailEtape($this->etapes[0]->getDescriptif());
    }

    private function detailEtape($descriptif)
    {
        $sortie = "";
        $matches = explode("[#", $descriptif);
        foreach($matches as $matche)
        {
            if(substr_count($matche, "#]")!=0)
            {
                //On coupe la chaine
                $mat = explode("#]", $matche);
                //On modifie la variable
                $var = explode("|", $mat[0]);
                $pourcentage = rtrim($var[0],"%");
                $alim = $var[1];
                foreach($this->ingredients as $ingredient)
                {
                    if(strtolower($ingredient->getAliment()->getNom()) == strtolower($alim))
                    {
                        $valeur = $ingredient->getQuantite()*$pourcentage/100;
                        $valeur .= $ingredient->getAliment()->getUniteDefault();                        
                    }
                }
                $sortie .= $valeur." ".$alim;
                //On garde la fin de chaine
                $sortie .= $mat[1];
            }
            else
            {
                //On garde la chaine
                $sortie .= $matche;
            }
        }
        return $sortie;
    }
}

