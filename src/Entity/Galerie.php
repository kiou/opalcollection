<?php

namespace App\Entity;

use App\Entity\GalerieImage;
use App\Entity\TheCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\GalerieRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Table(name : "galerie")]
#[ORM\Entity(repositoryClass: GalerieRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Galerie
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
    private ?string $title = null;

    #[ORM\OneToMany(targetEntity: GalerieImage::class, mappedBy: 'galerie', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private $galerieimages;

    #[ORM\ManyToMany(targetEntity: TheCollection::class, mappedBy: 'galeries')]
    private $theCollections;
    
    #[ORM\Column(name : "is_active", type : "boolean")]
    private $isActive;

    public function __construct()
    {
        $this->created = new \DateTime();
        $this->isActive = true;
        $this->galerieimages = new ArrayCollection();
        $this->theCollections = new ArrayCollection();
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

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return Collection<int, GalerieImage>
     */
    public function getGalerieimages(): Collection
    {
        return $this->galerieimages;
    }

    public function addGalerieimage(GalerieImage $galerieimage): static
    {
        if (!$this->galerieimages->contains($galerieimage)) {
            $this->galerieimages->add($galerieimage);
            $galerieimage->setGalerie($this);
        }

        return $this;
    }

    public function removeGalerieimage(GalerieImage $galerieimage): static
    {
        if ($this->galerieimages->removeElement($galerieimage)) {
            // set the owning side to null (unless already changed)
            if ($galerieimage->getGalerie() === $this) {
                $galerieimage->setGalerie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TheCollection>
     */
    public function getTheCollections(): Collection
    {
        return $this->theCollections;
    }

    public function addTheCollection(TheCollection $theCollection): static
    {
        if (!$this->theCollections->contains($theCollection)) {
            $this->theCollections->add($theCollection);
            $theCollection->addGalery($this);
        }

        return $this;
    }

    public function removeTheCollection(TheCollection $theCollection): static
    {
        if ($this->theCollections->removeElement($theCollection)) {
            $theCollection->removeGalery($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }
}
