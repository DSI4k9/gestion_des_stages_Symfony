<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Repository\ClasseRepository;
use App\Repository\FiliereRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
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
        return $this->render('classes/admin/classe.html.twig', compact('classes'));
    }

    /**
     * @Route("/admin/classes/{id<[0-9]+>}", name="admin_classes_show")
     */
    public function show(Classe $classe): Response
    {
        return $this->render('classes/admin/show.html.twig', compact('classe'));
    }

    /**
     * @Route("/admin/classe/create", name="classe_create", methods={"GET", "POST"})
     */
    public function create(Request $request, EntityManagerInterface $em, FiliereRepository $filiereRepo): Response
    {
        $classe = new Classe;        

        $form = $this->createForm(FiliereType::class, $classe);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($classe);
            $em->flush();            
            return $this->redirectToRoute('app_classes');
        }

        return $this->render('classes/admin/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/classe/{id<[0-9]+>}/edit", name="classe_edit", methods={"GET", "PUT", "POST"})
     */
    public function edit(Request $request, Classe $classe, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(FiliereType::class, $classe);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();


            return $this->redirectToRoute('app_classe_show_admin', array('id' => $classe->getId()));
        }

        return $this->render('classes/admin/edit.html.twig', [
            'classe' => $classe,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/classe/{id<[0-9]+>}", name="classe_delete", methods={"DELETE","POST"})
     */
    public function delete(Request $request, Classe $classe, EntityManagerInterface $em): Response
    {
        $em->remove($classe);
            $em->flush();

        // if ($this->isCsrfTokenValid('filiere_deletion_' . $filiere->getId(), $request->request->get('csrf_token'))) {
        //     $em->remove($filiere);
        //     $em->flush();

        // }

        return $this->redirectToRoute('app_classes');
    }
}