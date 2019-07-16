<?php

namespace App\DataFixtures;

use App\Entity\Ticket;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TicketFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $ticket = new Ticket();
        $ticket->setTitle('Adulte');
        $ticket->setPrice(15.00);
        $manager->persist($ticket);
        $manager->flush();

        $ticket = new Ticket();
        $ticket->setTitle('Enfant');
        $ticket->setPrice(9.90);
        $manager->persist($ticket);
        $manager->flush();

        $ticket = new Ticket();
        $ticket->setTitle('Ecole');
        $ticket->setPrice(7.90);
        $manager->persist($ticket);
        $manager->flush();
    }
}
