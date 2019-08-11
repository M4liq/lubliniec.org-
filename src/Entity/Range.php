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

    public function __construct()
    {
        $this->videos_id = new ArrayCollection();
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
}
