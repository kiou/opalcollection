<?php

namespace App\Entity;

use App\Utilities\Upload;
use Imagine\Image\Box;
use Imagine\Gd\Imagine;
use App\Entity\TheCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\HeaderImageRepository;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[ORM\Table(name : "headerimage")]
#[ORM\Entity(repositoryClass: HeaderImageRepository::class)]
class HeaderImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type : "integer")]
    private ?int $id = null;
    
    #[ORM\Column(type: 'string', length: 255)]
    private $url;

    #[ORM\ManyToOne(targetEntity: TheCollection::class, inversedBy: 'headerimages')]
    #[ORM\JoinColumn(nullable: false)]
    private $theCollection;

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

            $imagine = new Imagine();
            $size = new Box(1920,700);
            $imagine->open($this->imageFile)
                    ->thumbnail($size, 'outbound')
                    ->save($this->getUploadRootDir().'upload/'.$image);

            $size = new Box(527,445);
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

}
