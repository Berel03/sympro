<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route(path:"/", name:"home.index", methods:['GET'])]
    public function index(): Response
    {
        return $this->render("Pages/home.html.twig");
    }
}