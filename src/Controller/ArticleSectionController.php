<?php

namespace App\Controller;

use App\Entity\ArticleSection;
use App\Form\ArticleSectionType;
use App\Repository\ArticleSectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/article/section")
 */
class ArticleSectionController extends AbstractController
{
    /**
     * @Route("/", name="article_section_index", methods={"GET"})
     */
    public function index(ArticleSectionRepository $articleSectionRepository): Response
    {
        return $this->render('article_section/index.html.twig', [
            'article_sections' => $articleSectionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="article_section_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $articleSection = new ArticleSection();
        $form = $this->createForm(ArticleSectionType::class, $articleSection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($articleSection);
            $entityManager->flush();

            return $this->redirectToRoute('article_section_index');
        }

        return $this->render('article_section/new.html.twig', [
            'article_section' => $articleSection,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="article_section_show", methods={"GET"})
     */
    public function show(ArticleSection $articleSection): Response
    {
        return $this->render('article_section/show.html.twig', [
            'article_section' => $articleSection,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="article_section_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ArticleSection $articleSection): Response
    {
        $form = $this->createForm(ArticleSectionType::class, $articleSection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_section_index');
        }

        return $this->render('article_section/edit.html.twig', [
            'article_section' => $articleSection,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="article_section_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ArticleSection $articleSection): Response
    {
        if ($this->isCsrfTokenValid('delete'.$articleSection->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($articleSection);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_section_index');
    }
}
