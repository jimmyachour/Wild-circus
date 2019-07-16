<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CircusController extends AbstractController
{
    /**
     * @Route("/accueil", name="circus")
     */
    public function index()
    {
        return $this->render('circus/home.html.twig');
    }
}
