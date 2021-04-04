<?php

namespace App\Controller;

use App\Entity\Systeme;
use App\Form\SystemeType;
use App\Repository\SystemeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/systeme")
 */
class SystemeController extends AbstractController
{
    /**
     * @Route("/", name="systeme_index", methods={"GET"})
     */
    public function index(SystemeRepository $systemeRepository): Response
    {
        return $this->render('systeme/index.html.twig', [
            'systemes' => $systemeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="systeme_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $systeme = new Systeme();
        $form = $this->createForm(SystemeType::class, $systeme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($systeme);
            $entityManager->flush();

            return $this->redirectToRoute('systeme_index');
        }

        return $this->render('systeme/new.html.twig', [
            'systeme' => $systeme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="systeme_show", methods={"GET"})
     */
    public function show(Systeme $systeme): Response
    {
        return $this->render('systeme/show.html.twig', [
            'systeme' => $systeme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="systeme_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Systeme $systeme): Response
    {
        $form = $this->createForm(SystemeType::class, $systeme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('systeme_index');
        }

        return $this->render('systeme/edit.html.twig', [
            'systeme' => $systeme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="systeme_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Systeme $systeme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$systeme->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($systeme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('systeme_index');
    }
}
