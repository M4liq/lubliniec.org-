<?php

namespace App\Controller;

use App\Entity\ArticlePhoto;
use App\Form\ArticlePhotoType;
use App\Repository\ArticlePhotoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/article/photo")
 */
class ArticlePhotoController extends AbstractController
{
    /**
     * @Route("/", name="article_photo_index", methods={"GET"})
     */
    public function index(ArticlePhotoRepository $articlePhotoRepository): Response
    {
        return $this->render('article_photo/index.html.twig', [
            'article_photos' => $articlePhotoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="article_photo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $articlePhoto = new ArticlePhoto();
        $form = $this->createForm(ArticlePhotoType::class, $articlePhoto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($articlePhoto);
            $entityManager->flush();

            return $this->redirectToRoute('article_photo_index');
        }

        return $this->render('article_photo/new.html.twig', [
            'article_photo' => $articlePhoto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="article_photo_show", methods={"GET"})
     */
    public function show(ArticlePhoto $articlePhoto): Response
    {
        return $this->render('article_photo/show.html.twig', [
            'article_photo' => $articlePhoto,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="article_photo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ArticlePhoto $articlePhoto): Response
    {
        $form = $this->createForm(ArticlePhotoType::class, $articlePhoto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_photo_index');
        }

        return $this->render('article_photo/edit.html.twig', [
            'article_photo' => $articlePhoto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="article_photo_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ArticlePhoto $articlePhoto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$articlePhoto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($articlePhoto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_photo_index');
    }
}
