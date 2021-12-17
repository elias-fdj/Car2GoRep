<?php

namespace App\Controller;

use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    /**
     * @Route("/checkout/{id}", name="checkout")
     */
    public function index(Car $car): Response
    {
        return $this->render('checkout/index.html.twig', [
            'car' => $car,
        ]);
    }
}
