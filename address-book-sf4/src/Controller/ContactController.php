<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contacts")
     */
    public function index()
    {
        return $this->render('contact/index.html.twig');
    }

    /**
     * @Route("/contacts/add")
     */
    public function add()
    {
        return $this->render('contact/add.html.twig');
    }

    /**
     * @Route("/contacts/{id}", requirements={"id": "[1-9][0-9]*"})
     */
    public function show($id)
    {
        $steve = new Contact();
        $steve->setId(987)
            ->setPrenom('Steve')
            ->setNom('Jobs')
            ->setEmail('sjob@apple.com');

        return $this->render('contact/show.html.twig', [
            'contact' => $steve,
        ]);
    }

    /**
     * @Route("/contacts/{id}/delete")
     */
    public function delete($id)
    {
        return $this->render('contact/delete.html.twig');
    }

    /**
     * @Route("/contacts/{id}/update")
     */
    public function update()
    {
        return $this->render('contact/update.html.twig');
    }
}
