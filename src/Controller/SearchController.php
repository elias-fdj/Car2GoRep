<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index(Request $request, CarRepository $carsrepo, PaginatorInterface $paginator): Response
    {
    

    $entities = $carsrepo->SearchCar($request);
    $cars = $paginator->paginate($entities,
                                     $request->query->getInt('page', 1),
                                     6);

    return $this->render('car/index.html.twig',[
            'cars' => $cars,
    ]);
    }
}
