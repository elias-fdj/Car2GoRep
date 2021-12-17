<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserService 
{
    private $theManager;
    private $theEncoder;
    private $theFlash;

    public function __construct (EntityManagerInterface $manager,
                                 UserPasswordEncoderInterface $encoder,
                                 FlashBagInterface $theFlash)
    {
        $this->theManager = $manager;
        $this->theEncoder = $encoder;
        $this->theFlash = $theFlash;
    }

    public function PersistUser(User $theUser)
    {
        $this->HashPassword($theUser);
        
        $this->theManager->persist($theUser);
        $this->theManager->flush();
        $this->theFlash->add('success','Account created successfully !');
    }

    public function HashPassword(User $theUser)
    {
        //récupération du mot de passe après la soumission du formulaire et encodage
        $thePassword= $this->theEncoder->encodePassword($theUser, $theUser->getPassword());
        $theUser->setPassword($thePassword);
    }
}