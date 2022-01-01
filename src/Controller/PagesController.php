<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    /**
     * @Route("/pages", name="home")
     */
    public function home()
    {
        return $this->json([
            'message' => 'Welcome here',
            'path' => 'src/Controller/PagesController.php',
        ]);
    }
}