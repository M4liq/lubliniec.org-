<?php

namespace App\Repository;

use App\Entity\ArticleSection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ArticleSection|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleSection|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleSection[]    findAll()
 * @method ArticleSection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleSectionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ArticleSection::class);
    }

      /**
         * @return ArticleSection[] Returns an array of ArticleSection objects
      */
    

    /*
    public function findOneFromAll()
    {
        return $this->createQueryBuilder('a')
            ->select('a')
            ->from('ArticleSection', 'a')
            ->orderBy('a.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
    }

    /*

    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArticleSection
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
