<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VideoRepository")
 */
class Video
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="video_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Place", inversedBy="place_id")
     */
    private $place_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Author", inversedBy="video_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author_id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Source", inversedBy="video_id")
     */
    private $source_id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $orientation_date;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $format;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $adding_date;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $subtitle;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastest_modification;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $topic;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $publicated;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Period", inversedBy="video_id")
     */
    private $period_id;

    public function __construct()
    {
        $this->source_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?user
    {
        return $this->user_id;
    }

    public function setUserId(?user $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getPlaceId(): ?place
    {
        return $this->place_id;
    }

    public function setPlaceId(?place $place_id): self
    {
        $this->place_id = $place_id;

        return $this;
    }

    public function getAuthorId(): ?author
    {
        return $this->author_id;
    }

    public function setAuthorId(?author $author_id): self
    {
        $this->author_id = $author_id;

        return $this;
    }

    /**
     * @return Collection|source[]
     */
    public function getSourceId(): Collection
    {
        return $this->source_id;
    }

    public function addSourceId(source $sourceId): self
    {
        if (!$this->source_id->contains($sourceId)) {
            $this->source_id[] = $sourceId;
        }

        return $this;
    }

    public function removeSourceId(source $sourceId): self
    {
        if ($this->source_id->contains($sourceId)) {
            $this->source_id->removeElement($sourceId);
        }

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getOrientationDate(): ?bool
    {
        return $this->orientation_date;
    }

    public function setOrientationDate(?bool $orientation_date): self
    {
        $this->orientation_date = $orientation_date;

        return $this;
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

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(?string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): self
    {
        $this->size = $size;

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

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getAddingDate(): ?\DateTimeInterface
    {
        return $this->adding_date;
    }

    public function setAddingDate(?\DateTimeInterface $adding_date): self
    {
        $this->adding_date = $adding_date;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(?string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getLastestModification(): ?\DateTimeInterface
    {
        return $this->lastest_modification;
    }

    public function setLastestModification(?\DateTimeInterface $lastest_modification): self
    {
        $this->lastest_modification = $lastest_modification;

        return $this;
    }

    public function getTopic(): ?string
    {
        return $this->topic;
    }

    public function setTopic(string $topic): self
    {
        $this->topic = $topic;

        return $this;
    }

    public function getPublicated(): ?bool
    {
        return $this->publicated;
    }

    public function setPublicated(?bool $publicated): self
    {
        $this->publicated = $publicated;

        return $this;
    }

    public function getPeriodId(): ?Period
    {
        return $this->period_id;
    }

    public function setPeriodId(?Period $period_id): self
    {
        $this->period_id = $period_id;

        return $this;
    }
}
