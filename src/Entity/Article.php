<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @Vich\Uploadable()
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
     * @ORM\OneToMany(targetEntity=Text::class, mappedBy="article",cascade={"persist"})
     */
    private $textContent;

    /**
     * @ORM\OneToOne(targetEntity=Image::class, cascade={"persist", "remove"})
     */
    private $backGroundImage;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
    private $thumbnail;

	/**
	 * @ORM\Column(type="datetime")
	 */
    private $updatedAt;

	/**
	 * @return mixed
	 */
	public function getThumbnail()
	{
		return $this->thumbnail;
	}

	/**
	 * @param mixed $thumbnail
	 *
	 * @return Article
	 */
	public function setThumbnail($thumbnail)
	{
		$this->thumbnail = $thumbnail;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getThumbnailFile()
	{
		return $this->thumbnailFile;
	}

	/**
	 * @param mixed $thumbnailFile
	 *
	 * @return Article
	 */
	public function setThumbnailFile($thumbnailFile)
	{
		$this->thumbnailFile = $thumbnailFile;

		if ($thumbnailFile) {
			$this->updatedAt = new \DateTime();
		}
		return $this;
	}

	/**
	 * @Vich\UploadableField(mapping="thumbnails", fileNameProperty="thumbnail")
	 */
	private $thumbnailFile;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isMain;

    /**
     * @ORM\OneToOne(targetEntity=MaterialIcons::class, cascade={"persist", "remove"})
     */
    private $icon;

    public function __construct()
    {
        $this->textContent = new ArrayCollection();
        $this->updatedAt = new \DateTime();
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

    public function getIsMain(): ?bool
    {
        return $this->isMain;
    }

    public function setIsMain(?bool $isMain): self
    {
        $this->isMain = $isMain;

        return $this;
    }

    public function getIcon(): ?MaterialIcons
    {
        return $this->icon;
    }

    public function setIcon(?MaterialIcons $icon): self
    {
        $this->icon = $icon;

        return $this;
    }
}
