<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $theEncoder;

    public function __construct(UserPasswordEncoderInterface $theEncoder)
    {
        $this->theEncoder = $theEncoder;
    }
    public function load(ObjectManager $manager): void
    {
        $theUser = new User();
        $theUser->setUsername('admin')
                ->setRoles(['ROLE_ADMIN'])
                ->setEmail('admin@admin.com')
                ;
        $thePassword= $this->theEncoder->encodePassword($theUser, 'admin');
        $theUser->setPassword($thePassword);
        $manager->persist($theUser);

        $manager->flush();
    }
}
