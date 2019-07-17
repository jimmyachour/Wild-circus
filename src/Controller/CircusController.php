<?php

namespace App\Controller;

use App\Repository\TicketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="circus_")
 */
class CircusController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('circus/home/index.html.twig');
    }

    /**
     * @Route("/billeterie", name="ticket")
     */
    public function ticket(TicketRepository $ticketRepository, Session $session)
    {
        if(isset($_POST['ticket'])) {
            $session->set('cart', $_POST['ticket']);

            return $this->redirectToRoute('cart_index');
        }

        return $this->render('circus/ticket/index.html.twig', ['tickets' => $ticketRepository->findAll()]);
    }
}
