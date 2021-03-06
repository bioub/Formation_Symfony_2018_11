<?php

namespace App\Manager;


use App\Entity\Contact;
use Doctrine\Common\Persistence\ManagerRegistry;

class ContactManager
{
    /** @var ManagerRegistry */
    protected $doctrine;

    /**
     * ContactManager constructor.
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @return Contact[]
     */
    public function getAll()
    {
        $repo = $this->doctrine->getRepository(Contact::class);
        return $repo->findAll();
    }

    /**
     * @return Contact
     */
    public function getById($id)
    {
        $repo = $this->doctrine->getRepository(Contact::class);
        return $repo->findWithSociete($id);
    }

    public function remove($contact)
    {
        $em = $this->doctrine->getManager();
        $em->remove($contact);
        $em->flush();
    }
}