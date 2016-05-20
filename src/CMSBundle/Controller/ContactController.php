<?php

namespace CMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ContactController extends Controller
{
    /**
     * @Route("/")
     */
    public function listContactsAction()
    {
        $contacts = $this->getDoctrine()->getRepository('CMSBundle:Contact')->findAll();
        return $this->render('CMSBundle:Contact:listContacts.html.twig', array('contacts' => $contacts));
    }
    
     public function deleteContactAction($id) {
        $em = $this->getDoctrine()->getManager();
        $contact = $this->getDoctrine()->getRepository('CMSBundle:Contact')->find($id);
     
        $em->remove($contact);
        $em->flush();

        $this->get('session')->getFlashBag()->add(
                'info', 'Contact supprimé'
        );

        return $this->redirect($this->generateUrl('list_contacts'));
    }
}
