<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Manager\ContactManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contacts")
 */
class ContactController extends AbstractController
{
    /** @var ContactManager */
    protected $contactManager;

    /**
     * ContactController constructor.
     * @param ContactManager $contactManager
     */
    public function __construct(ContactManager $contactManager)
    {
        $this->contactManager = $contactManager;
    }

    /**
     * @Route("")
     */
    public function index()
    {
        $contacts = $this->contactManager->getAll();

        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * @Route("/add")
     */
    public function add(Request $request)
    {
        // $request->getSession()->

        return $this->render('contact/add.html.twig');
    }

    /**
     * @Route("/{id}", requirements={"id": "[1-9][0-9]*"})
     */
    public function show($id)
    {
        $contact = $this->contactManager->getById($id);

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
