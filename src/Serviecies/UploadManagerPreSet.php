<?php

namespace App\Serviecies;

use App\Repository\ArticleSectionRepository;

class UploadManagerPreSet
{

    protected $lastestId;

    public function fetchLastestId (ArticleSectionRepository $articleSectionRepository)
    {
        $lastestArticleSection = $articleSectionRepository->findOneFromAll();
        $this->lastestId = $lastestArticleSection ;//$lastestArticleSection->getId()
    }

    public function getLastestId()
    {
        return $this->lastestId;
    }

}