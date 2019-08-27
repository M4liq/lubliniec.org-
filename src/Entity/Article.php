<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Author", inversedBy="article_id")
     */
    private $author_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="article_id")
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="article_id")
     */
    private $category_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Place", inversedBy="article_id")
     */
    private $place_id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $subtitle;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $orientation_date;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $adding_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastest_modification;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $topic;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $publicated;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ArticleSection", mappedBy="article_id", orphanRemoval=true, cascade={"persist"})
     */
    private $article_section_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Period", inversedBy="article_id")
     */
    private $period_id;

    
 

    public function __construct()
    {
        $this->article_section_id = new ArrayCollection();
        $this->article_photo_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUserId(): ?user
    {
        return $this->user_id;
    }

    public function setUserId(?user $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getCategoryId(): ?category
    {
        return $this->category_id;
    }

    public function setCategoryId(?category $category_id): self
    {
        $this->category_id = $category_id;

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



    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function setTopic(?string $topic): self
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

    /**
     * @return Collection|ArticleSection[]
     */
    public function getArticleSectionId(): Collection
    {
        return $this->article_section_id;
    }

    public function addArticleSectionId(ArticleSection $articleSectionId): self
    {
        if (!$this->article_section_id->contains($articleSectionId)) {
            $this->article_section_id[] = $articleSectionId;
            $articleSectionId->setArticleId($this);
        }

        return $this;
    }

    public function removeArticleSectionId(ArticleSection $articleSectionId): self
    {
        if ($this->article_section_id->contains($articleSectionId)) {
            $this->article_section_id->removeElement($articleSectionId);
            // set the owning side to null (unless already changed)
            if ($articleSectionId->getArticleId() === $this) {
                $articleSectionId->setArticleId(null);
            }
        }

        return $this;
    }


    public function removeArticlePhotoId(ArticlePhoto $articlePhotoId): self
    {
        if ($this->article_photo_id->contains($articlePhotoId)) {
            $this->article_photo_id->removeElement($articlePhotoId);
            // set the owning side to null (unless already changed)
            if ($articlePhotoId->getArticleId() === $this) {
                $articlePhotoId->setArticleId(null);
            }
        }

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
