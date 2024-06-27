<?php

namespace App\Entity;

use App\Entity\TheCollection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PaysRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name : "pays")]
#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: PaysRepository::class)]
class Pays
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
    #[Assert\NotBlank(message : "Compléter le champ nom")]
    private ?string $name = null;

    #[ORM\Column(type : "string", length : 5)]
    #[Assert\NotBlank(message : "Compléter le champ code")]
    private ?string $code = null;

    #[ORM\Column(type : "string", length : 20)]
    #[Assert\NotBlank(message : "Compléter le champ couleur")]
    private ?string $color = null;

    #[ORM\OneToMany(targetEntity: TheCollection::class, mappedBy: 'pays')]
    private $theCollection;

    #[ORM\Column(type : "string", length : 255, nullable:true)]
    private $image;

    #[ORM\Column(type : "string", length : 5)]
    private $language;

    public function __construct()
    {
        $this->created = new \DateTime();
        $this->theCollection = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

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

    /**
     * @return Collection<int, TheCollection>
     */
    public function getTheCollection(): Collection
    {
        return $this->theCollection;
    }

    public function addTheCollection(TheCollection $theCollection): static
    {
        if (!$this->theCollection->contains($theCollection)) {
            $this->theCollection->add($theCollection);
            $theCollection->setPays($this);
        }

        return $this;
    }

    public function removeTheCollection(TheCollection $theCollection): static
    {
        if ($this->theCollection->removeElement($theCollection)) {
            // set the owning side to null (unless already changed)
            if ($theCollection->getPays() === $this) {
                $theCollection->setPays(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

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
