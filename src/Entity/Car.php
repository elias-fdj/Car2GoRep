<?php

namespace App\Entity;

use App\Entity\Image;
use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=Image::class, cascade={"persist", "remove"})
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Annee;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $shortDesc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $boite;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $portes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $carburant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $marque;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $prix;

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

    public function getPicture(): ?Image
    {
        return $this->picture;
    }

    public function setPicture(?Image $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->Annee;
    }

    public function setAnnee(string $Annee): self
    {
        $this->Annee = $Annee;

        return $this;
    }

    public function getShortDesc(): ?string
    {
        return $this->shortDesc;
    }

    public function setShortDesc(string $shortDesc): self
    {
        $this->shortDesc = $shortDesc;

        return $this;
    }

    public function getBoite(): ?string
    {
        return $this->boite;
    }

    public function setBoite(string $boite): self
    {
        $this->boite = $boite;

        return $this;
    }

    public function getPortes(): ?int
    {
        return $this->portes;
    }

    public function setPortes(int $portes): self
    {
        $this->portes = $portes;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(string $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
}
