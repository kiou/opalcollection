<?php

namespace App\Entity;

use App\Utilities\Upload;
use App\Entity\TheCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TelechargementRepository;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[ORM\Table(name : "telechargement")]
#[ORM\Entity(repositoryClass: TelechargementRepository::class)]
class Telechargement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type : "integer")]
    private ?int $id = null;

    #[ORM\Column(type : "datetimetz")]
    private $created;

    #[ORM\Column(type : "string", length : 255)]
    #[Assert\NotBlank(message : "Compléter le champ titre")]
    private ?string $title = null;

    #[ORM\Column(type: 'string', length: 255)]
    private $url;

    private ?File $imageFile = null;

    #[ORM\ManyToOne(targetEntity: TheCollection::class, inversedBy: 'telechargements')]
    #[ORM\JoinColumn(nullable: false)]
    private $theCollection;

    public function __construct()
    {
        $this->created = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
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

    public function getTheCollection(): ?TheCollection
    {
        return $this->theCollection;
    }

    public function setTheCollection(?TheCollection $theCollection): static
    {
        $this->theCollection = $theCollection;

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

            $this->imageFile->move($this->getUploadRootDir().'upload/', $image);
                    
            $this->url = $image;
        }
    }

    public function getUploadRootDir()
    {
        return __DIR__.'/../../public/img/';
    }
}
