<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleSectionRepository")
 */
class ArticleSection
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article", inversedBy="article_section_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $section_no;

    /**
     * @ORM\Column(type="text")
     */
    private $content;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
