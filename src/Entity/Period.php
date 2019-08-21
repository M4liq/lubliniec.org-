<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PeriodRepository")
 */
class Period
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $lower;

    /**
     * @ORM\Column(type="integer")
     */
    private $upper;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="period_id")
     */
    private $article_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Photo", mappedBy="period_id")
     */
    private $photo_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Video", mappedBy="period_id")
     */
    private $video_id;

    public function __construct()
    {
        $this->article_id = new ArrayCollection();
        $this->photo_id = new ArrayCollection();
        $this->video_id = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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

    public function getLower(): ?int
    {
        return $this->lower;
    }

    public function setLower(int $lower): self
    {
        $this->lower = $lower;

        return $this;
    }

    public function getUpper(): ?int
    {
        return $this->upper;
    }

    public function setUpper(int $upper): self
    {
        $this->upper = $upper;

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
            $articleId->setPeriodId($this);
        }

        return $this;
    }

    public function removeArticleId(Article $articleId): self
    {
        if ($this->article_id->contains($articleId)) {
            $this->article_id->removeElement($articleId);
            // set the owning side to null (unless already changed)
            if ($articleId->getPeriodId() === $this) {
                $articleId->setPeriodId(null);
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
            $photoId->setPeriodId($this);
        }

        return $this;
    }

    public function removePhotoId(Photo $photoId): self
    {
        if ($this->photo_id->contains($photoId)) {
            $this->photo_id->removeElement($photoId);
            // set the owning side to null (unless already changed)
            if ($photoId->getPeriodId() === $this) {
                $photoId->setPeriodId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Video[]
     */
    public function getVideoId(): Collection
    {
        return $this->video_id;
    }

    public function addVideoId(Video $videoId): self
    {
        if (!$this->video_id->contains($videoId)) {
            $this->video_id[] = $videoId;
            $videoId->setPeriodId($this);
        }

        return $this;
    }

    public function removeVideoId(Video $videoId): self
    {
        if ($this->video_id->contains($videoId)) {
            $this->video_id->removeElement($videoId);
            // set the owning side to null (unless already changed)
            if ($videoId->getPeriodId() === $this) {
                $videoId->setPeriodId(null);
            }
        }

        return $this;
    }


}
