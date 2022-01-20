<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    /**
     * @Route("/admin/dashboard", name="home")
     */
    public function index(): Response
    {
        return $this->render('users/admin/dashboard.html.twig');
    }
}