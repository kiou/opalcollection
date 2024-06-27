<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{

    #[Assert\NotBlank(message : "Compléter le champ Nom")]
    private ?string $nom = null;

    #[Assert\NotBlank(message : "Compléter le champ Prénom")]
    private ?string $prenom = null;

    #[Assert\NotBlank(message : "Compléter le champ Téléphone")]
    private ?string $telephone = null;

    #[Assert\NotBlank(message : "Compléter le champ Entreprise")]
    private ?string $company = null;

    #[Assert\NotBlank(message : "Compléter le champ Pays")]
    private ?string $country = null;

    #[Assert\NotBlank(message : "Compléter le champ Email")]
    #[Assert\Email(
        message: "L'email '{{ value }}' n'est pas une adresse email valide."
    )]
    private ?string $email = null;

    #[Assert\NotBlank(message : "Compléter le champ Message")]
    private ?string $message = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }
    
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): static
    {
        $this->company = $company;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }
}

