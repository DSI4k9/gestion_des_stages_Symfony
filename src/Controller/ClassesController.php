<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Repository\ClasseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassesController extends AbstractController
{
    /**
     * @Route("/admin/classes", name="classes")
     */
    public function index(ClasseRepository $classeRepository): Response
    {
        $classes = $classeRepository->findAll();
        return $this->render('classes/index.html.twig', compact('classes'));
    }

    /**
     * @Route("/admin/classes/{id<[0-9]+}", name="admin_classes_show")
     */
    public function show(Classe $classe): Response
    {
        return $this->render('classes/index.html.twig', compact('classes'));
    }
}
