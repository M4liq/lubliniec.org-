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



}