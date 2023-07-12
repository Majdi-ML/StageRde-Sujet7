<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/testfront', name: 'app_tfffest')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
    #[Route('/testback', name: 'app_est')]
    public function index2(): Response
    {
        return $this->render('test/back.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
