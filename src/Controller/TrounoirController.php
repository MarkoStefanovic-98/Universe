<?php

namespace App\Controller;

use App\Entity\Trounoir;
use App\Form\TrounoirType;
use App\Repository\TrounoirRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/trounoir")
 */
class TrounoirController extends AbstractController
{
    /**
     * @Route("/", name="trounoir_index", methods={"GET"})
     */
    public function index(TrounoirRepository $trounoirRepository): Response
    {
        return $this->render('trounoir/index.html.twig', [
            'trounoirs' => $trounoirRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="trounoir_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $trounoir = new Trounoir();
        $form = $this->createForm(TrounoirType::class, $trounoir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($trounoir);
            $entityManager->flush();

            return $this->redirectToRoute('trounoir_index');
        }

        return $this->render('trounoir/new.html.twig', [
            'trounoir' => $trounoir,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trounoir_show", methods={"GET"})
     */
    public function show(Trounoir $trounoir): Response
    {
        return $this->render('trounoir/show.html.twig', [
            'trounoir' => $trounoir,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="trounoir_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Trounoir $trounoir): Response
    {
        $form = $this->createForm(TrounoirType::class, $trounoir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trounoir_index');
        }

        return $this->render('trounoir/edit.html.twig', [
            'trounoir' => $trounoir,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trounoir_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Trounoir $trounoir): Response
    {
        if ($this->isCsrfTokenValid('delete'.$trounoir->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($trounoir);
            $entityManager->flush();
        }

        return $this->redirectToRoute('trounoir_index');
    }
}
