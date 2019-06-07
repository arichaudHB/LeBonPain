<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdBreadRepository")
 */
class AdBread
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $title;
    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="AdBread")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $description;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $picture;
    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getTilte(): ?string
    {
        return $this->title;
    }
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
    public function getPicture(): ?string
    {
        return $this->picture;
    }
    public function setPicture(string $picture): self
    {
        $this->picture = $picture;
        return $this;
    }
    public function getPrice(): ?float
    {
        return $this->price;
    }
    public function setPrice(?float $price): self
    {
        $this->price = $price;
        return $this;
    }
    public function getOwner(): ?User
    {
        return $this->owner;
    }
    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;
        return $this;
    }
}
