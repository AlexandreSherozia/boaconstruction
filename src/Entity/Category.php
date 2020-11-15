<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasSubCategory;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $showSybCategoryAsAsideMenu;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="categories")
     */
    private $subCategories;

    /**
     * @ORM\OneToMany(targetEntity=Category::class, mappedBy="subCategories")
     */
    private $categories;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $routeName;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $routePath;

    /**
     * @ORM\OneToMany(targetEntity=Section::class, mappedBy="category")
     */
    private $sections;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $materialIcon;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->sections = new ArrayCollection();
    }

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

    public function getHasSubCategory(): ?bool
    {
        return $this->hasSubCategory;
    }

    public function setHasSubCategory(?bool $hasSubCategory): self
    {
        $this->hasSubCategory = $hasSubCategory;

        return $this;
    }

    public function getShowSybCategoryAsAsideMenu(): ?bool
    {
        return $this->showSybCategoryAsAsideMenu;
    }

    public function setShowSybCategoryAsAsideMenu(?bool $showSybCategoryAsAsideMenu): self
    {
        $this->showSybCategoryAsAsideMenu = $showSybCategoryAsAsideMenu;

        return $this;
    }

    public function getSubCategories(): ?self
    {
        return $this->subCategories;
    }

    public function setSubCategories(?self $subCategories): self
    {
        $this->subCategories = $subCategories;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(self $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setSubCategories($this);
        }

        return $this;
    }

    public function removeCategory(self $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getSubCategories() === $this) {
                $category->setSubCategories(null);
            }
        }

        return $this;
    }

    public function getRouteName(): ?string
    {
        return $this->routeName;
    }

    public function setRouteName(string $routeName): self
    {
        $this->routeName = $routeName;

        return $this;
    }

    public function getRoutePath(): ?string
    {
        return $this->routePath;
    }

    public function setRoutePath(string $routePath): self
    {
        $this->routePath = $routePath;

        return $this;
    }

    /**
     * @return Collection|Section[]
     */
    public function getSections(): Collection
    {
        return $this->sections;
    }

    public function addSection(Section $section): self
    {
        if (!$this->sections->contains($section)) {
            $this->sections[] = $section;
            $section->setCategory($this);
        }

        return $this;
    }

    public function removeSection(Section $section): self
    {
        if ($this->sections->removeElement($section)) {
            // set the owning side to null (unless already changed)
            if ($section->getCategory() === $this) {
                $section->setCategory(null);
            }
        }

        return $this;
    }

    public function getMaterialIcon(): ?string
    {
        return $this->materialIcon;
    }

    public function setMaterialIcon(?string $materialIcon): self
    {
        $this->materialIcon = $materialIcon;

        return $this;
    }
}
