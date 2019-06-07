<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdCategoryRepository")
 */
class AdCategory
{
    /**
     * @ORM\Ad()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $ad;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="AdCategory")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    public function getAd(): ?int
    {
        return $this->ad;
    }
    public function getCategory(): ?User
    {
        return $this->category;
    }
    public function setCategory(?User $category): self
    {
        $this->category = $category;
        return $this;
    }
}
