<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="category_id")
     */
    private $article_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Photo", mappedBy="category_id")
     */
    private $photo_id;

    public function __construct()
    {
        $this->article_id = new ArrayCollection();
        $this->photo_id = new ArrayCollection();
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

    public function __toString()
    {
        return $this->getName();
    }
    

    /**
     * @return Collection|Article[]
     */
    public function getArticleId(): Collection
    {
        return $this->article_id;
    }

    public function addArticleId(Article $articleId): self
    {
        if (!$this->article_id->contains($articleId)) {
            $this->article_id[] = $articleId;
            $articleId->setCategoryId($this);
        }

        return $this;
    }

    public function removeArticleId(Article $articleId): self
    {
        if ($this->article_id->contains($articleId)) {
            $this->article_id->removeElement($articleId);
            // set the owning side to null (unless already changed)
            if ($articleId->getCategoryId() === $this) {
                $articleId->setCategoryId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Photo[]
     */
    public function getPhotoId(): Collection
    {
        return $this->photo_id;
    }

    public function addPhotoId(Photo $photoId): self
    {
        if (!$this->photo_id->contains($photoId)) {
            $this->photo_id[] = $photoId;
            $photoId->setCategoryId($this);
        }

        return $this;
    }

    public function removePhotoId(Photo $photoId): self
    {
        if ($this->photo_id->contains($photoId)) {
            $this->photo_id->removeElement($photoId);
            // set the owning side to null (unless already changed)
            if ($photoId->getCategoryId() === $this) {
                $photoId->setCategoryId(null);
            }
        }

        return $this;
    }
}
