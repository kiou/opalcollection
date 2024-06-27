<?php

namespace App\Entity;

use App\Repository\AboutRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name : "about")]
#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: AboutRepository::class)]
class About
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type : "integer")]
    private ?int $id = null;

    #[ORM\Column(type : "datetimetz")]
    private $created;

    #[ORM\Column(type : "datetimetz", nullable:true)]
    private $changed;

    #[ORM\Column(type : "string", length : 255)]
    #[Assert\NotBlank(message : "Compléter le champ titre")]
    private ?string $titleodile = null;

    #[ORM\Column(type : "string", length : 255, nullable:true)]
    private $imageodile;
    
    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message : "Compléter le champ contenu")]
    private ?string $contentodile = null;

    #[ORM\Column(type : "string", length : 255)]
    #[Assert\NotBlank(message : "Compléter le champ titre")]
    private ?string $titlevision = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message : "Compléter le champ contenu")]
    private ?string $contentvision = null;

    #[ORM\Column(type : "string", length : 5)]
    private $language;

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

    public function getChanged(): ?\DateTimeInterface
    {
        return $this->changed;
    }

    public function setChanged(?\DateTimeInterface $changed): static
    {
        $this->changed = $changed;

        return $this;
    }

    #[ORM\PreUpdate()]
    public function preChanged()
    {
        $this->changed = new \DateTime();
    }

    public function getTitleodile(): ?string
    {
        return $this->titleodile;
    }

    public function setTitleodile(string $titleodile): static
    {
        $this->titleodile = $titleodile;

        return $this;
    }

    public function getImageodile(): ?string
    {
        return $this->imageodile;
    }

    public function setImageodile(?string $imageodile): static
    {
        $this->imageodile = $imageodile;

        return $this;
    }

    public function getContentodile(): ?string
    {
        return $this->contentodile;
    }

    public function setContentodile(string $contentodile): static
    {
        $this->contentodile = $contentodile;

        return $this;
    }

    public function getTitlevision(): ?string
    {
        return $this->titlevision;
    }

    public function setTitlevision(string $titlevision): static
    {
        $this->titlevision = $titlevision;

        return $this;
    }

    public function getContentvision(): ?string
    {
        return $this->contentvision;
    }

    public function setContentvision(string $contentvision): static
    {
        $this->contentvision = $contentvision;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): static
    {
        $this->language = $language;

        return $this;
    }
}
