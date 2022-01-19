<?php

namespace App\Controller;

use App\Form\FiliereType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Filiere;
use App\Repository\FiliereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilieresController extends AbstractController
{
    /**
     * @Route("/admin/filieres", name="app_filieres")
     */
    public function index(FiliereRepository $filiereRepository): Response
    {
        $filieres = $filiereRepository->findAll();
        return $this->render('filieres/admin/filiere.html.twig', compact('filieres'));
    }

     /**
     * @Route("/admin/filiere/{id<[0-9]+>}", name="app_filieres_show_admin")
     */
    public function show(Filiere $filiere): Response
    {
        return $this->render('filieres/admin/show.html.twig', compact('filiere'));
    }

    /**
     * @Route("/admin/filiere/create", name="filiere_create", methods={"GET", "POST"})
     */
    public function create(Request $request, EntityManagerInterface $em, FiliereRepository $filiereRepo): Response
    {
        $filiere = new Filiere;        

        $form = $this->createForm(FiliereType::class, $filiere);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($filiere);
            $em->flush();            
            return $this->redirectToRoute('app_filieres');
        }

        return $this->render('filieres/admin/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/filiere/{id<[0-9]+>}/edit", name="filiere_edit", methods={"GET", "PUT", "POST"})
     */
    public function edit(Request $request, Filiere $filiere, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(FiliereType::class, $filiere);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();


            return $this->redirectToRoute('app_filieres_show_admin', array('id' => $filiere->getId()));
        }

        return $this->render('filieres/admin/edit.html.twig', [
            'filiere' => $filiere,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/filiere/{id<[0-9]+>}", name="filiere_delete", methods={"DELETE","POST"})
     */
    public function delete(Request $request, Filiere $filiere, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('filiere_deletion_' . $filiere->getId(), $request->request->get('csrf_token'))) {
            $em->remove($filiere);
            $em->flush();

        }

        return $this->redirectToRoute('app_filieres');
    }

}