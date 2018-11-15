<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contacts")
 */
class ContactController extends AbstractController
{
    /**
     * @Route("")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Contact::class);
        $contacts = $repo->findAll();
        /*
        $contacts = [
            (new Contact())->setId(123)->setPrenom('Steve')->setNom('Jobs'),
            (new Contact())->setId(456)->setPrenom('Bill')->setNom('Gates'),
        ];
        */

        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * @Route("/add")
     */
    public function add()
    {
        return $this->render('contact/add.html.twig');
    }

    /**
     * @Route("/{id}", requirements={"id": "[1-9][0-9]*"})
     */
    public function show($id)
    {
        /*
        $steve = new Contact();
        $steve->setId(987)
            ->setPrenom('Steve')
            ->setNom('Jobs')
            ->setEmail('sjob@apple.com');
        */
        $repo = $this->getDoctrine()->getRepository(Contact::class);
        $contact = $repo->find($id);

        return $this->render('contact/show.html.twig', [
            'contact' => $contact,
        ]);
    }

    /**
     * @Route("/{id}/delete", requirements={"id": "[1-9][0-9]*"})
     */
    public function delete($id)
    {
        return $this->render('contact/delete.html.twig');
    }

    /**
     * @Route("/{id}/update", requirements={"id": "[1-9][0-9]*"})
     */
    public function update()
    {
        return $this->render('contact/update.html.twig');
    }
}
