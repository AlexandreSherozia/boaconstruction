<?php

namespace App\Entity;

use App\Repository\TextRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TextRepository::class)
 */
class Text
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fontFamily;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fontSize;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="textContent",cascade={"persist"})
     */
    private $article;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fontWeight;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getFontFamily(): ?string
    {
        return $this->fontFamily;
    }

    public function setFontFamily(?string $fontFamily): self
    {
        $this->fontFamily = $fontFamily;

        return $this;
    }

    public function getFontSize(): ?string
    {
        return $this->fontSize;
    }

    public function setFontSize(?string $fontSize): self
    {
        $this->fontSize = $fontSize;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getFontWeight(): ?string
    {
        return $this->fontWeight;
    }

    public function setFontWeight(?string $fontWeight): self
    {
        $this->fontWeight = $fontWeight;

        return $this;
    }

	public static function getFontWeights(): array
	{
		return [
			'font-weight-300' => 'font-weight-300',
			'font-weight-400' => 'font-weight-400',
			'font-weight-500' => 'font-weight-500',
			'font-weight-600' => 'font-weight-600',
			'font-weight-700' => 'font-weight-700',
			'font-weight-800' => 'font-weight-800',
			'font-weight-900' => 'font-weight-900',
		];
	}

	public function __toString()
	{
		return $this->content;
	}
}
