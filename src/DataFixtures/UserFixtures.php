<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        // Admin 1
        $user1 = new User();
        $user1->setLastname('maximus');
        $user1->setFirstname('duvalus');
        $user1->setCity('bordeaux');
        $user1->setBirthDate(new \DateTime('1984-09-23'));
        $user1->setRoles(['ROLE_ADMIN']);
        $user1->setEmail('admin@admin.fr');
        $user1->setPassword($this->encoder->encodePassword($user1, 'admin'));
        $manager->persist($user1);

        // User
        $user2 = new User();
        $user2->setLastname('laurinette');
        $user2->setFirstname('soyus');
        $user2->setCity('bordeaux');
        $user2->setBirthDate(new \DateTime('1980-10-23'));
        $user2->setRoles(['ROLE_USER']);
        $user2->setEmail('user@user.fr');
        $user2->setPassword($this->encoder->encodePassword($user2, 'user'));
        $manager->persist($user2);

        $manager->flush();
    }
}
