<?php

namespace Etourisme\HotelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Etourisme\HotelBundle\Entity\Hotel;
use Etourisme\HotelBundle\Form\HotelType;



class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HotelBundle:Default:index.html.twig');
    }
    
    public function createHotelAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $entity = new Hotel();
        $form = $this->createHotelForm($entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
             
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('create_hotel'));
        }
         return $this->render('HotelBundle:Hotels:addHotel.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
       
    }
    
    private function createHotelForm(Hotel $entity) {
        $form = $this->createForm(HotelType::class, $entity);
//$form->add('submit', 'submit', array('label' => 'Valider', 'attr' => array('class' => "btn btn-default btn-primary btn-block")));
        return $form;
    }
    
    public function viewHotelsAction() {

 
        return $this->render('HotelBundle:Hotels:listHotels.html.twig');
    }
}
