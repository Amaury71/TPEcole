<?php

namespace App\Controller;

use App\Entity\PhotoClass;
use App\Form\PhotoClassType;
use App\Repository\PhotoClassRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/photo/class")
 */
class PhotoClassController extends AbstractController
{
    /**
     * @Route("/", name="photo_class_index", methods={"GET"})
     */
    public function index(PhotoClassRepository $photoClassRepository): Response
    {
        return $this->render('photo_class/index.html.twig', [
            'photo_classes' => $photoClassRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="photo_class_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $photoClass = new PhotoClass();
           $form = $this->createForm(PhotoClassType::class, $photoClass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($photoClass);
            $entityManager->flush();

            return $this->redirectToRoute('photo_class_index');
        }

        return $this->render('photo_class/new.html.twig', [
            'photo_class' => $photoClass,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="photo_class_show", methods={"GET"})
     */
    public function show(PhotoClass $photoClass): Response
    {
        return $this->render('photo_class/show.html.twig', [
            'photo_class' => $photoClass,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="photo_class_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PhotoClass $photoClass): Response
    {
        $form = $this->createForm(PhotoClassType::class, $photoClass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('photo_class_index');
        }

        return $this->render('photo_class/edit.html.twig', [
            'photo_class' => $photoClass,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="photo_class_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PhotoClass $photoClass): Response
    {
        if ($this->isCsrfTokenValid('delete'.$photoClass->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($photoClass);
            $entityManager->flush();
        }

        return $this->redirectToRoute('photo_class_index');
    }
}
