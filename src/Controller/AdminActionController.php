<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminActionController extends AbstractController
{
    /**
     * @Route("/admin/action", name="admin_action")
     */
    public function index()
    {
        return $this->render('admin_action/index.html.twig', [
            'controller_name' => 'AdminActionController',
        ]);
    }
}
