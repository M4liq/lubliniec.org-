<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response; //response class
use Symfony\Component\HttpFoundation\Cookie; 
use Symfony\Component\HttpFoundation\Request; 

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */

    public function index()
    {

        return $this->render("pages/main-pages/index.html.twig");

    }
    
     /**
     * @Route("/regulamin", name="terms")
     */

    public function terms()
    {

        return $this->render("pages/main-pages/terms.html.twig");

    }

    /**
     * @Route("/artykuly", name="articles")
     */

    public function articles()
    {

        return $this->render("pages/main-pages/articles.html.twig");

    }

    /**
     * @Route("/artykuly/tytul-artykulu", name="article")
     */

    public function article()
    {

        return $this->render("pages/sub-pages-1/article.html.twig");

    }


    /**
     * @Route("/zdjecia", name="photos")
     */

    public function photos()
    {

        return $this->render("pages/main-pages/photos.html.twig");

    }


     /**
     * @Route("/zdjecia/tytul-zdjecia", name="photo")
     */

    public function photo()
    {

        return $this->render("pages/sub-pages-1/photo.html.twig");

    }


    /**
     * @Route("/materialy-video", name="videos")
     */

    public function videos()
    {

        return $this->render("pages/main-pages/videos.html.twig");

    } 

     /**
     * @Route("/materialy-video/tytul-filmu", name="video")
     */

    public function video()
    {

        return $this->render("pages/sub-pages-1/video.html.twig");

    } 

    /**
     * @Route("/zrodla", name="sources")
     */

    public function sources()
    {

        return $this->render("pages/main-pages/sources.html.twig");

    } 
    
    
     /**
     * @Route("/patroni", name="patrons")
     */

    public function patrons()
    {

        return $this->render("pages/main-pages/patrons.html.twig");

    } 

   
     /**
     * @Route("/o-nas", name="about-us")
     */

    public function aboutUs()
    {

        return $this->render("pages/main-pages/about-us.html.twig");

    } 

  

      /**
     * @Route("/logowanie", name="login")
     */

    public function login()
    {

        return $this->render("pages/main-pages/login.html.twig");

    } 

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

        return $this->render("pages/admin-page/categories-choosing/categories.html.twig");

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
     * @Route("/admin/zasoby/edycja-artykulu/tytul", name="article-editing")
     */

    public function articleEditing()
    {

        return $this->render("pages/admin-page/modifications/article-adding-editing.html.twig");

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