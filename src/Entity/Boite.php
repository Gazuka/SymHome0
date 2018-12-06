<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BoiteRepository")
 */
class Boite
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Plat", inversedBy="boites")
     * @ORM\JoinColumn(nullable=true)
     */
    private $plat;

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

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getPlat(): ?Plat
    {
        return $this->plat;
    }

    public function setPlat(?Plat $plat): self
    {
        $this->plat = $plat;

        return $this;
    }
}
