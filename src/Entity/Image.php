<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\Image\ImageRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    //attribut $file non mappé pour récupérer les images 

    private $file;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
    
    public function getFile()
    {
        return $this->file;
    }

    // $file de type UploadedFile pour avoir plus d'options lors 
    // de la manipulation à la récupération
    
    public function setFile(UploadedFile $file): void
    {
        $this->file= $file;
    }
}

