<?php

namespace App\Controller;

use App\Entity\Model;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/reservation", name="reservation")
     */
    public function reservation(): Response
    {
        return $this->render('home/reservation.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
