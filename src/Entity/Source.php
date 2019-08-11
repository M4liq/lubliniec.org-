<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SourceRepository")
 */
class Source
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Author", inversedBy="source_id")
     */
    private $author_id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $name;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Video", mappedBy="source_id")
     */
    private $video_id;

    public function __construct()
    {
        $this->author_id = new ArrayCollection();
        $this->video_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Author[]
     */
    public function getAuthorId(): Collection
    {
        return $this->author_id;
    }

    public function addAuthorId(Author $authorId): self
    {
        if (!$this->author_id->contains($authorId)) {
            $this->author_id[] = $authorId;
        }

        return $this;
    }

    public function removeAuthorId(Author $authorId): self
    {
        if ($this->author_id->contains($authorId)) {
            $this->author_id->removeElement($authorId);
        }

        return $this;
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
            $videoId->addSourceId($this);
        }

        return $this;
    }

    public function removeVideoId(Video $videoId): self
    {
        if ($this->video_id->contains($videoId)) {
            $this->video_id->removeElement($videoId);
            $videoId->removeSourceId($this);
        }

        return $this;
    }
}
