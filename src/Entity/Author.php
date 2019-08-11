<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author
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
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $surname;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Source", mappedBy="author_id")
     */
    private $source_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Video", mappedBy="author_id")
     */
    private $video_id;

    public function __construct()
    {
        $this->source_id = new ArrayCollection();
        $this->video_id = new ArrayCollection();
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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @return Collection|Source[]
     */
    public function getSourceId(): Collection
    {
        return $this->source_id;
    }

    public function addSourceId(Source $sourceId): self
    {
        if (!$this->source_id->contains($sourceId)) {
            $this->source_id[] = $sourceId;
            $sourceId->addAuthorId($this);
        }

        return $this;
    }

    public function removeSourceId(Source $sourceId): self
    {
        if ($this->source_id->contains($sourceId)) {
            $this->source_id->removeElement($sourceId);
            $sourceId->removeAuthorId($this);
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
            $videoId->setAuthorId($this);
        }

        return $this;
    }

    public function removeVideoId(Video $videoId): self
    {
        if ($this->video_id->contains($videoId)) {
            $this->video_id->removeElement($videoId);
            // set the owning side to null (unless already changed)
            if ($videoId->getAuthorId() === $this) {
                $videoId->setAuthorId(null);
            }
        }

        return $this;
    }
}
