<?php

namespace App\Serviecies;

use App\Repository\ArticleSectionRepository;
use Doctrine\ORM\EntityManagerInterface;
class UploadManagerPreSet
{

    protected $lastestId;
    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function fetchLastestId ()
    {
        $entityManager = $this->getEntityManager();

        $lastestId = $query = $entityManager->createQuery(
            'SELECT a
            FROM App\Entity\ArticleSection a
            ORDER BY p.id DESC
            LIMIT 1'
        );
    }

    public function getLastestId()
    {
        return $this->lastestId;
    }

    public function getEntityManager()
    {
        return $this->entityManager;
    }


}