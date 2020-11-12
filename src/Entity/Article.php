<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity=Section::class, inversedBy="articles")
     */
    private $section;

    /**
     * @ORM\OneToMany(targetEntity=Text::class, mappedBy="article")
     */
    private $textContent;

    /**
     * @ORM\OneToOne(targetEntity=Image::class, cascade={"persist", "remove"})
     */
    private $backGroundImage;

    public function __construct()
    {
        $this->textContent = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSection(): ?Section
    {
        return $this->section;
    }

    public function setSection(?Section $section): self
    {
        $this->section = $section;

        return $this;
    }

    /**
     * @return Collection|Text[]
     */
    public function getTextContent(): Collection
    {
        return $this->textContent;
    }

    public function addTextContent(Text $textContent): self
    {
        if (!$this->textContent->contains($textContent)) {
            $this->textContent[] = $textContent;
            $textContent->setArticle($this);
        }

        return $this;
    }

    public function removeTextContent(Text $textContent): self
    {
        if ($this->textContent->removeElement($textContent)) {
            // set the owning side to null (unless already changed)
            if ($textContent->getArticle() === $this) {
                $textContent->setArticle(null);
            }
        }

        return $this;
    }

    public function getBackGroundImage(): ?Image
    {
        return $this->backGroundImage;
    }

    public function setBackGroundImage(?Image $backGroundImage): self
    {
        $this->backGroundImage = $backGroundImage;

        return $this;
    }
}
