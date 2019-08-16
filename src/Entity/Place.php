<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlaceRepository")
 */
class Place
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Video", mappedBy="place_id")
     */
    private $place_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Photo", mappedBy="place_id")
     */
    private $photo_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="place_id")
     */
    private $article_id;

    public function __construct()
    {
        $this->place_id = new ArrayCollection();
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

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Video[]
     */
    public function getPlaceId(): Collection
    {
        return $this->place_id;
    }

    public function addPlaceId(Video $placeId): self
    {
        if (!$this->place_id->contains($placeId)) {
            $this->place_id[] = $placeId;
            $placeId->setPlaceId($this);
        }

        return $this;
    }

    public function removePlaceId(Video $placeId): self
    {
        if ($this->place_id->contains($placeId)) {
            $this->place_id->removeElement($placeId);
            // set the owning side to null (unless already changed)
            if ($placeId->getPlaceId() === $this) {
                $placeId->setPlaceId(null);
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
            $photoId->setPlaceId($this);
        }

        return $this;
    }

    public function removePhotoId(Photo $photoId): self
    {
        if ($this->photo_id->contains($photoId)) {
            $this->photo_id->removeElement($photoId);
            // set the owning side to null (unless already changed)
            if ($photoId->getPlaceId() === $this) {
                $photoId->setPlaceId(null);
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
            $articleId->setPlaceId($this);
        }

        return $this;
    }

    public function removeArticleId(Article $articleId): self
    {
        if ($this->article_id->contains($articleId)) {
            $this->article_id->removeElement($articleId);
            // set the owning side to null (unless already changed)
            if ($articleId->getPlaceId() === $this) {
                $articleId->setPlaceId(null);
            }
        }

        return $this;
    }
}
