<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function index(Request $theRequest, UserService $theUserService): Response
    {
        $theUser = new User();
        $theForm=$this->createForm(RegisterType::class, $theUser);
        $theForm->handleRequest($theRequest);
        if($theForm->isSubmitted() && $theForm->isValid())
        {
            $theUserService->PersistUser($theUser);
            return $this->redirectToRoute('app_login');
        }
        
        return $this->render('register/index.html.twig', [
            'theForm' => $theForm->createView(),
        ]);
    }
}
