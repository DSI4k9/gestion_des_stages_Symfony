<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeanceEncadrementController extends AbstractController
{
    #[Route('/seance/encadrement', name: 'seance_encadrement')]
    public function index(): Response
    {
        return $this->render('seance_encadrement/index.html.twig', [
            'controller_name' => 'SeanceEncadrementController',
        ]);
    }
}
