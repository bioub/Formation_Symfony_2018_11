<?php

namespace App\Controller;

use App\Entity\Societe;
use App\Form\SocieteType;
use App\Repository\SocieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/societe")
 */
class SocieteController extends AbstractController
{
    /**
     * @Route("/", name="societe_index", methods="GET")
     */
    public function index(SocieteRepository $societeRepository): Response
    {
        return $this->render('societe/index.html.twig', ['societes' => $societeRepository->findAll()]);
    }

    /**
     * @Route("/new", name="societe_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $societe = new Societe();
        $form = $this->createForm(SocieteType::class, $societe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($societe);
            $em->flush();

            return $this->redirectToRoute('societe_index');
        }

        return $this->render('societe/new.html.twig', [
            'societe' => $societe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="societe_show", methods="GET")
     */
    public function show(Societe $societe): Response
    {
        return $this->render('societe/show.html.twig', ['societe' => $societe]);
    }

    /**
     * @Route("/{id}/edit", name="societe_edit", methods="GET|POST")
     */
    public function edit(Request $request, Societe $societe): Response
    {
        $form = $this->createForm(SocieteType::class, $societe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('societe_index', ['id' => $societe->getId()]);
        }

        return $this->render('societe/edit.html.twig', [
            'societe' => $societe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="societe_delete", methods="DELETE")
     */
    public function delete(Request $request, Societe $societe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$societe->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($societe);
            $em->flush();
        }

        return $this->redirectToRoute('societe_index');
    }
}
