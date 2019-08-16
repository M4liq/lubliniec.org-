<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RangeRepository")
 */
class Range
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $lower_range;

    /**
     * @ORM\Column(type="integer")
     */
    private $upper_range;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Video", mappedBy="range_id")
     */
    private $videos_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Photo", mappedBy="range_id")
     */
    private $photo_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="range_id")
     */
    private $article_id;

    public function __construct()
    {
        $this->videos_id = new ArrayCollection();
        $this->photo_id = new ArrayCollection();
        $this->article_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLowerRange(): ?int
    {
        return $this->lower_range;
    }

    public function setLowerRange(int $lower_range): self
    {
        $this->lower_range = $lower_range;

        return $this;
    }

    public function getUpperRange(): ?int
    {
        return $this->upper_range;
    }

    public function setUpperRange(int $upper_range): self
    {
        $this->upper_range = $upper_range;

        return $this;
    }

    /**
     * @return Collection|Video[]
     */
    public function getVideosId(): Collection
    {
        return $this->videos_id;
    }

    public function addVideosId(Video $videosId): self
    {
        if (!$this->videos_id->contains($videosId)) {
            $this->videos_id[] = $videosId;
            $videosId->setRangeId($this);
        }

        return $this;
    }

    public function removeVideosId(Video $videosId): self
    {
        if ($this->videos_id->contains($videosId)) {
            $this->videos_id->removeElement($videosId);
            // set the owning side to null (unless already changed)
            if ($videosId->getRangeId() === $this) {
                $videosId->setRangeId(null);
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
            $photoId->setRangeId($this);
        }

        return $this;
    }

    public function removePhotoId(Photo $photoId): self
    {
        if ($this->photo_id->contains($photoId)) {
            $this->photo_id->removeElement($photoId);
            // set the owning side to null (unless already changed)
            if ($photoId->getRangeId() === $this) {
                $photoId->setRangeId(null);
            }
        }

        return $this;
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
            $articleId->setRangeId($this);
        }

        return $this;
    }

    public function removeArticleId(Article $articleId): self
    {
        if ($this->article_id->contains($articleId)) {
            $this->article_id->removeElement($articleId);
            // set the owning side to null (unless already changed)
            if ($articleId->getRangeId() === $this) {
                $articleId->setRangeId(null);
            }
        }

        return $this;
    }
}
