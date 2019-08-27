<?php

namespace App\Controller;

use App\Entity\Article;
use App\Serviecies\ArticleSectionUploadManager;
use App\Form\ArticleType;
use App\Entity\ArticleSection;
use App\Repository\ArticleRepository;
use App\Repository\ArticleSectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Collections\ArrayCollection;

class ArticleController extends AbstractController
{
    /**
     * @Route("/artykuly", name="article_index", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('admin/article/index.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }

     /**
     * @Route("admin/artykuly", name="article_admin_index", methods={"GET"})
     */
    public function admin_index(ArticleRepository $articleRepository): Response
    {
        return $this->render('admin/article/index.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }

    /**
     * @Route("admin/artykuly/nowy", name="article_new", methods={"GET","POST"})
     */
    public function new(Request $request, ArticleSectionUploadManager $sectionUploadManager, ArticleSectionRepository $articleSectionRepository ): Response
    {
        $article = new Article();
        $articleSection = new ArticleSection;
        $articleSection -> setArticleId($article);
        $article -> addArticleSectionId($articleSection);

      

        $allArticleSections = new ArrayCollection();

        foreach($article->getArticleSectionId() as $section)
        {
            $allArticleSections -> add($section);
        }

        $form = $this->createForm(ArticleType::class, $article);

            
        //echo "<pre>";
       // var_dump($article); die;

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            //$file = $request->files->get('file');
            
                
           
           // $sectionUploadManager->setFilename($file);
         //   $articleSection->setPath($sectionUploadManager->getFileLocation());
    
            foreach ($allArticleSections as $section)
            if(false === $article->getArticleSectionId()->contains($section))
            {   
                $section->getArticleId()->removeElement($article);
                $entityManager->remove($section);
            }


            $entityManager->persist($article);
            $entityManager->flush();


    
            return $this->redirectToRoute('article_index');
        }

        $sectionUploadManager->fetchLastestId($articleSectionRepository);

        return $this->render('admin/article/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
            'lastestId' => $sectionUploadManager->getLastestId()
        ]);
    }

    /**
     * @Route("artykuly/{id}", name="article_show", methods={"GET"})
     */
    public function show(Article $article): Response
    {
        return $this->render('admin/article/show.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("admin/edytuj/{id}", name="article_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Article $article): Response
    {   

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_index');
        }

        return $this->render('admin/article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("admin/artykuly/{id}", name="article_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Article $article): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_index');
    }
}
