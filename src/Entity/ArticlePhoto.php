<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticlePhotoRepository")
 */
class ArticlePhoto
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
    private $path;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article", inversedBy="article_photo_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $section_no;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getArticleId(): ?article
    {
        return $this->article_id;
    }

    public function setArticleId(?article $article_id): self
    {
        $this->article_id = $article_id;

        return $this;
    }

    public function getSectionNo(): ?int
    {
        return $this->section_no;
    }

    public function setSectionNo(int $section_no): self
    {
        $this->section_no = $section_no;

        return $this;
    }
}
