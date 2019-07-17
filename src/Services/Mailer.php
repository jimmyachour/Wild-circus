<?php


namespace App\Services;

use Twig\Environment;

class Mailer
{
    private $sender;
    private $mailer;
    private $recipient;
    private $twig;

    public function __construct(\Swift_Mailer $mailer, string $sender, string $recipient, Environment $twig)
    {
        $this->mailer = $mailer;
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->twig = $twig;
    }

    public function sendTicket($cart)
    {
        $message = (new \Swift_Message())
            ->setFrom($this->sender)
            ->setTo($this->recipient)
            ->setSubject('Vos places pour le cirque')
            ->setBody($this->twig->render(
                '/mail/ticket.html.twig',
                [
                    'user' => $cart->getUser(),
                    'quantities' => $cart->getQuantity(),
                    'ticket' => $cart->getTickets()
                ]
            ), 'text/html');
        $this->mailer->send($message);
    }

    public function sendSubscription($mail)
    {
        $message = (new \Swift_Message())
            ->setFrom($this->sender)
            ->setTo($this->recipient)
            ->setSubject('Souscription newsletter')
            ->setBody($this->twig->render(
                '/mail/subscription.html.twig'
            ), 'text/html');
        $this->mailer->send($message);
    }
}
