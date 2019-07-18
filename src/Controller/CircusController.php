<?php

namespace App\Controller;

use App\Entity\Newsletter;
use App\Form\NewsletterType;
use App\Repository\TicketRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
    public function index(Request $request, ObjectManager $manager) : Response
    {
        $newsletter = new Newsletter();

        $newsletterForm = $this->createForm(NewsletterType::class, $newsletter);

        $newsletterForm->handleRequest($request);

        if($newsletterForm->isSubmitted()) {

            if($newsletterForm->isValid()) {
                $manager->persist($newsletter);
                $manager->flush();

                $this->addFlash('success', 'Merci pour votre inscription à notre newsletter !');

            } else {
                $this->addFlash('danger', 'Désolé, mais votre mail n\'est pas valable');
            }
        }

        return $this->render('circus/home/index.html.twig', ['newsletterForm' => $newsletterForm->createView()]);
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
