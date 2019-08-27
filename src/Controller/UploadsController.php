<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



    /**
     * @Route("/uploads", name="uploads")
     */

class UploadsController extends AbstractController
{
   
     /**
     * @Route("/article-section-uploads", name="article-section-uploads")
     */

    public function articleSectionUploads()
    {
        return $this->render('uploads/index.html.twig', [
            'controller_name' => 'UploadsController',
        ]);
    }
}
