<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Category;
use App\Entity\Article;
use App\Form\CategoryFormType;
use App\Form\ArticleFormType;

class AdminRenderController extends AbstractController
{
   /**
     * @Route("/admin", name="admin")
     */

    public function admin()
    {

        return $this->render("pages/admin-page/admin-main-page.html.twig");

    } 


    /**
     * @Route("admin/zasoby/tabela-zrodel", name="sources-table")
     */

    public function sourcesTable()
    {

        return $this->render("pages/admin-page/tables/sources-table.html.twig");

    } 

      /**
     * @Route("admin/zasoby/tabela-zdjec", name="photos-table")
     */

    public function photosTable()
    {

        return $this->render("pages/admin-page/tables/photos-table.html.twig");

    } 


      /**
     * @Route("admin/zasoby/tabela-filmow", name="videos-table")
     */

     public function videosTable()
    {

        return $this->render("pages/admin-page/tables/videos-table.html.twig");

    } 

     /**
     * @Route("admin/zasoby/tabela-artykulow", name="articles-table")
     */

    public function articlesTable()
    {

        return $this->render("pages/admin-page/tables/articles-table.html.twig");

    } 


     /**
     * @Route("/admin/edycja-przedzialow", name="ranges")
     */

    public function ranges()
    {

        return $this->render("pages/admin-page/categories-choosing/ranges.html.twig");

    } 
     /**
     * @Route("/admin/edycja-kategorii", name="categories")
     */

    public function categories()
    {   
       // $repo = $this -> getDoctrine() -> getRepository(Category::class);
       // $category = $repo->findAll();
       // dump($category);
        $category = new Category();
      //  dump($category);
        $form = $this->createForm(CategoryFormType::class, $category);
        return $this->render("pages/admin-page/categories-choosing/categories.html.twig",[
            "form" => $form->createView()
        ]);

    } 

       /**
     * @Route("/admin/zasoby/dodawanie-artykulu", name="article-adding")
     */

    public function articleAdding()
    {

        return $this->render("pages/admin-page/modifications/article-adding-editing.html.twig");

    } 

    /**
     * @Route("/admin/zasoby/dodawanie-zdjecia", name="photo-adding")
     */

    public function photoAdding()
    {

        return $this->render("pages/admin-page/modifications/photo-adding-editing.html.twig");

    } 

    /**
     * @Route("/admin/zasoby/dodawanie-filmu", name="video-adding")
     */

    public function videoAdding()
    {

        return $this->render("pages/admin-page/modifications/video-adding-editing.html.twig");

    } 

       /**
     * @Route("/admin/zasoby/edycja-artykulu/{id}", name="article-editing")
     */

    public function articleEditing(Article $article, Request $request)
    {
        
        $form = $this -> createForm(ArticleFormType::class, $article,
        [
            "action" => $this -> generateUrl("article-editing"),
        ]);

        $form -> handleRequest($request);
        if($form -> isSubmitted()&&$form -> isValid())
        {
            $em = $this -> getDoctrine() -> getManager();
            $em -> persist($post);
            $em -> flush();


        }
        return $this->render("pages/admin-page/modifications/article-adding-editing.html.twig",[
            "form" => $form->createView()
        ]);

    } 

    /**
     * @Route("/admin/zasoby/edycja-zdjecia/tytul", name="photo-editing")
     */

    public function photoEditing()
    {

        return $this->render("pages/admin-page/modifications/photo-adding-editing.html.twig");

    } 

    /**
     * @Route("/admin/zasoby/edytowanie-filmu/tytul", name="video-editing")
     */

    public function videoEditing()
    {

        return $this->render("pages/admin-page/modifications/video-adding-editing.html.twig");

    } 
}
