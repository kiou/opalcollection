<?php

namespace App\Entity;

use App\Entity\Pays;
use App\Entity\Galerie;
use App\Entity\HeaderImage;
use App\Entity\Telechargement;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TheCollectionRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name : "thecollection")]
#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: TheCollectionRepository::class)]
class TheCollection
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

    #[ORM\Column(type : "string", length : 255)]
    #[Assert\NotBlank(message : "Compléter le champ slug")]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $link = null;

    #[ORM\Column(type : "string", length : 255, nullable:true)]
    private $logo;

    #[ORM\Column(type : "string", length : 255, nullable:true)]
    private $imagecarte;

    #[ORM\OneToMany(targetEntity: HeaderImage::class, mappedBy: 'theCollection', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private $headerimages;

    #[ORM\OneToMany(targetEntity: Telechargement::class, mappedBy: 'theCollection', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private $telechargements;

    #[ORM\ManyToOne(targetEntity: Pays::class, inversedBy: 'theCollection')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank(message : "Compléter le champ pays")]
    private $pays;

    #[ORM\ManyToMany(targetEntity: Galerie::class, inversedBy: 'theCollections')]
    private $galeries;

    #[ORM\Column(length: 255)]
    private ?string $resume = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(name : "is_active", type : "boolean")]
    private $isActive;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $youtube = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $facebook = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkedin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $instagram = null;

    #[ORM\Column(type : "string", length : 5)]
    private $language;

    public function __construct()
    {
        $this->created = new \DateTime();
        $this->isActive = true;
        $this->headerimages = new ArrayCollection();
        $this->telechargements = new ArrayCollection();
        $this->galeries = new ArrayCollection();
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): static
    {
        $this->resume = $resume;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

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

    #[ORM\PreUpdate()]
    public function preChanged()
    {
        $this->changed = new \DateTime();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getImagecarte(): ?string
    {
        return $this->imagecarte;
    }

    public function setImagecarte(?string $imagecarte): static
    {
        $this->imagecarte = $imagecarte;

        return $this;
    }

    /**
     * @return Collection<int, HeaderImage>
     */
    public function getHeaderimages(): Collection
    {
        return $this->headerimages;
    }

    public function addHeaderimage(HeaderImage $headerimage): static
    {
        if (!$this->headerimages->contains($headerimage)) {
            $this->headerimages->add($headerimage);
            $headerimage->setTheCollection($this);
        }

        return $this;
    }

    public function removeHeaderimage(HeaderImage $headerimage): static
    {
        if ($this->headerimages->removeElement($headerimage)) {
            // set the owning side to null (unless already changed)
            if ($headerimage->getTheCollection() === $this) {
                $headerimage->setTheCollection(null);
            }
        }

        return $this;
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
     * @return Collection<int, Telechargement>
     */
    public function getTelechargements(): Collection
    {
        return $this->telechargements;
    }

    public function addTelechargement(Telechargement $telechargement): static
    {
        if (!$this->telechargements->contains($telechargement)) {
            $this->telechargements->add($telechargement);
            $telechargement->setTheCollection($this);
        }

        return $this;
    }

    public function removeTelechargement(Telechargement $telechargement): static
    {
        if ($this->telechargements->removeElement($telechargement)) {
            // set the owning side to null (unless already changed)
            if ($telechargement->getTheCollection() === $this) {
                $telechargement->setTheCollection(null);
            }
        }

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getYoutube(): ?string
    {
        return $this->youtube;
    }

    public function setYoutube(?string $youtube): static
    {
        $this->youtube = $youtube;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): static
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): static
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): static
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): static
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return Collection<int, Galerie>
     */
    public function getGaleries(): Collection
    {
        return $this->galeries;
    }

    public function addGalery(Galerie $galery): static
    {
        if (!$this->galeries->contains($galery)) {
            $this->galeries->add($galery);
        }

        return $this;
    }

    public function removeGalery(Galerie $galery): static
    {
        $this->galeries->removeElement($galery);

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
