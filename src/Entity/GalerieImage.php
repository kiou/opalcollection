<?php

namespace App\Entity;

use Imagine\Image\Box;
use App\Entity\Galerie;
use Imagine\Gd\Imagine;
use App\Utilities\Upload;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\GalerieImageRepository;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[ORM\Table(name : "galerieimage")]
#[ORM\Entity(repositoryClass: GalerieImageRepository::class)]
class GalerieImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type : "integer")]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private $url;

    #[ORM\ManyToOne(targetEntity: Galerie::class, inversedBy: 'galerieimages')]
    #[ORM\JoinColumn(nullable: false)]
    private $galerie;
    
    private ?File $imageFile = null;

    #[ORM\Column(type : "datetimetz")]
    private $created;

    public function __construct()
    {
        $this->created = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): static
    {
        $this->created = $created;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function upload(): void
    {
        if ($this->imageFile instanceof UploadedFile) {
            $upload = new Upload();
            $timestamp = time();

            $image = $upload->createName(
                $this->imageFile->getClientOriginalName(),
                $this->getUploadRootDir().'/',
                $timestamp
            );

            $imagine = new Imagine();
            $size = new Box(1920,1080);
            $imagine->open($this->imageFile)
                    ->thumbnail($size, 'outbound')
                    ->save($this->getUploadRootDir().'upload/'.$image);

            $size = new Box(170,170);
            $imagine->open($this->imageFile)
                    ->thumbnail($size, 'outbound')
                    ->save($this->getUploadRootDir().'miniature/'.$image);

            $this->url = $image;
        }
    }

    public function getUploadRootDir()
    {
        return __DIR__.'/../../public/img/';
    }

    public function getGalerie(): ?Galerie
    {
        return $this->galerie;
    }

    public function setGalerie(?Galerie $galerie): static
    {
        $this->galerie = $galerie;

        return $this;
    }

}
