<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    protected $prenom;

    /**
     * @ORM\Column(type="string", length=40)
     */
    protected $nom;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $telephone;

    /** @ORM\Column(name="date_naissance", type="date", nullable=true) */
    protected $dateNaissance;

    /**
     * @var Societe
     * @ORM\ManyToOne(targetEntity="App\Entity\Societe", inversedBy="contacts")
     */
    protected $societe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getDateNaissance(): ?\DateTime
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTime $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;
        return $this;
    }

    /**
     * @return Societe
     */
    public function getSociete(): ?Societe
    {
        return $this->societe;
    }

    /**
     * @param Societe $societe
     * @return Contact
     */
    public function setSociete(?Societe $societe): self
    {
        $this->societe = $societe;
        return $this;
    }


}
