<?php

namespace App\Entity;

use App\Repository\MaterialIconsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaterialIconsRepository::class)
 */
class MaterialIcons
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $materialCodeName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMaterialCodeName(): ?string
    {
        return $this->materialCodeName;
    }

    public function setMaterialCodeName(string $materialCodeName): self
    {
        $this->materialCodeName = $materialCodeName;

        return $this;
    }

    public function __toString()
    {
	    return $this->materialCodeName;
    }
}
