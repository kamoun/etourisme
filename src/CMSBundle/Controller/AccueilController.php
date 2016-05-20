<?php

namespace CMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CMSBundle\Entity\Banniere;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use CMSBundle\Form\BanniereType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class AccueilController extends Controller
{
    /**
     * @Route("/")
     */
    public function addBanniereAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $entity = new Banniere();
        $form = $this->createForm(BanniereType::class, $entity);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em->persist($entity);
            $em->flush();     
            return $this->redirect($this->generateUrl('list_bannieres'));
        }
       
        return $this->render('CMSBundle:Accueil:listBannieres.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }
    
    public function listBannieresAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new Banniere();
  
           $form = $this->createBanniereForm($entity);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em->persist($entity);
            $em->flush();     
            return $this->redirect($this->generateUrl('list_bannieres'));
        }
        $bannieres = $this->getDoctrine()->getRepository('CMSBundle:Banniere')->findAll();
       
        return $this->render('CMSBundle:Accueil:listBannieres.html.twig', array('bannieres' => $bannieres,'entity' => $entity,
                    'form' => $form->createView()));
    }
    
        private function createBanniereForm(Banniere $entity) {
             $form = $this->createForm(BanniereType::class, $entity);
//$form->add('submit', 'submit', array('label' => 'Valider', 'attr' => array('class' => "btn btn-default btn-primary btn-block")));
        return $form;
    }
    
     public function deleteBanniereAction($id) {
        $em = $this->getDoctrine()->getManager();
        $banniere = $this->getDoctrine()->getRepository('CMSBundle:Banniere')->find($id);
     
        $em->remove($banniere);
        $em->flush();

        $this->get('session')->getFlashBag()->add(
                'info', 'Banniere supprimé'
        );

        return $this->redirect($this->generateUrl('list_bannieres'));
    }
}
