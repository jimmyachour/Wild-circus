<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="circus_")
 */
class CircusController extends AbstractController
{
    /**
     * @Route("/accueil", name="home")
     */
    public function index()
    {
        return $this->render('circus/home/index.html.twig');
    }

    /**
     * @Route("/billeterie", name="ticket")
     */
    public function ticket()
    {
        return $this->render('circus/ticket/index.html.twig');
    }
}
