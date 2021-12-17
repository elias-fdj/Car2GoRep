<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Service\ImageService;
use App\Repository\CarRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarController extends AbstractController
{
    /**
     * @Route("/car/add", name="car_add")
     */
    public function add(Request $theRequest, ImageService $theImageService): Response
    {
        $theCar = new Car();
        $theForm=$this->createForm(CarType::class, $theCar);
        $theForm->handleRequest($theRequest);
        if ($theForm->isSubmitted() && $theForm->isValid())
        {
            $theImageService->CarImagePersist($theCar);
            $this->getDoctrine()->getManager()->persist($theCar);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('car');
        }
        return $this->render('car/add.html.twig', [
            'theForm' => $theForm->createView(),
        ]);
    }
    /**
     * @Route("/car", name="car")
     */
    public function index(CarRepository $theCarRepository,
                          PaginatorInterface $paginator,
                          Request $theRequest ): Response
    {
        $data = $theCarRepository->findAll();
        $cars = $paginator->paginate($data,
                                     $theRequest->query->getInt('page', 1),
                                     6);
        return $this->render('car/index.html.twig', [
            'cars' => $cars
        ]);
    }

    /**
     * @Route("/details/{id}", name="details")
     */
    public function details(Car $theCar): Response
    {
        return $this->render('car/details.html.twig', [
            'car' => $theCar
        ]);
    }
}
