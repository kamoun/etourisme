<?php

namespace Etourisme\HotelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Etourisme\HotelBundle\Entity\Hotel;
use Etourisme\HotelBundle\Entity\Ville;
use Etourisme\HotelBundle\Entity\DetailsHotel;
use Etourisme\HotelBundle\Entity\Categorie;
use Etourisme\HotelBundle\Form\HotelType;
use Etourisme\HotelBundle\Form\HotelEditType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Etourisme\HotelBundle\Entity\DetailsChambre;
use Etourisme\HotelBundle\Entity\Reduction;
use Etourisme\HotelBundle\Entity\Arrangement;
use Etourisme\HotelBundle\Entity\Theme;
use Etourisme\HotelBundle\Entity\DetailsReduction;
use Etourisme\HotelBundle\Entity\DetailsTheme;
use Etourisme\HotelBundle\Entity\DetailsArrangement;
use Etourisme\HotelBundle\Form\DetailsHotelType;

class TarifController extends Controller {

    public function addTarifHotelAction(Request $request) {

        $form = $this->createFormBuilder()
                ->add('hotel', EntityType::class, array('label' => 'Nom d`hôtel (*)', 'class' => 'HotelBundle:Hotel', 'expanded' => false, 'required' => false, 'mapped' => false,
                    'placeholder' => 'Sélectionner l`hôtel...',))
                ->add('ville', null, array('label' => 'Ville (*)', 'mapped' => false, 'disabled' => true))
                ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            //var_dump($form['hotel']->getData());
            //die("here");
            $session = $request->getSession();
            $session->set('id', $form['hotel']->getData());
            return $this->redirect($this->generateUrl('add_tarifperiode_hotel'));
        }


        return $this->render('HotelBundle:Hotels:addTarifHotel.html.twig', array('form' => $form->createView()));
    }

    public function getVilleByHotelTarifAction() {

        $em = $this->getDoctrine()->getManager();
        $hotel = $this->getDoctrine()->getRepository('HotelBundle:Hotel')->find($_POST['hotel']);
        return new JsonResponse(array($hotel->getVille()->getLibelle()), 200);
    }

    public function addTarifPeriodeHotelAction(Request $request) {
        $session = $request->getSession();
        $data = $session->get('id');
        $hotel = $this->getDoctrine()->getRepository('HotelBundle:Hotel')->find($data);
        $detailschambre = $this->getDoctrine()->getRepository('HotelBundle:DetailsChambre')->findByHotel($hotel->getId());
        $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findByHotel($hotel->getId());
        $detailsreduction = $this->getDoctrine()->getRepository('HotelBundle:DetailsReduction')->findByHotel($hotel->getId());
        //var_dump($detailschambre);
        //die("here");


        $detailshotel = new DetailsHotel();
        $detailshotel->setHotel($hotel);
        $form = $this->createForm(DetailsHotelType::class, $detailshotel, array(
            'action' => $this->generateUrl('add_tarifperiode_hotel'),
            'method' => 'POST',
        ));
        $form->handleRequest($request);
        if ($form->isValid()) {
           
           
            $em = $this->getDoctrine()->getManager();
            $em->persist($detailshotel);
            $em->flush();
              if(isset($_POST["1"])){
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>1));
                 $detailsarrangement->setEtat(true);
                  $em->merge($detailsarrangement);
                  $em->flush();
                 
                 
                
            }
            else{
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>1));
                 $detailsarrangement->setEtat(false);
                  $em->merge($detailsarrangement);
                  $em->flush();
            }
            if(isset($_POST["2"])){
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>2));
                 $detailsarrangement->setEtat(true);
                  $em->merge($detailsarrangement);
                  $em->flush();
                 
                 
                
            }
            else{
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>2));
                 $detailsarrangement->setEtat(false);
                  $em->merge($detailsarrangement);
                  $em->flush();
            }
              if(isset($_POST["3"])){
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>3));
                 $detailsarrangement->setEtat(true);
                  $em->merge($detailsarrangement);
                  $em->flush();
                 
                 
                
            }
            else{
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>3));
                 $detailsarrangement->setEtat(false);
                  $em->merge($detailsarrangement);
                  $em->flush();
            }
             if(isset($_POST["4"])){
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>4));
                 $detailsarrangement->setEtat(true);
                  $em->merge($detailsarrangement);
                  $em->flush();
                 
                 
                
            }
            else{
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>4));
                 $detailsarrangement->setEtat(false);
                  $em->merge($detailsarrangement);
                  $em->flush();
            }
             if(isset($_POST["5"])){
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>5));
                 $detailsarrangement->setEtat(true);
                  $em->merge($detailsarrangement);
                  $em->flush();
                 
                 
                
            }
            else{
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>5));
                 $detailsarrangement->setEtat(false);
                  $em->merge($detailsarrangement);
                  $em->flush();
            }
             if(isset($_POST["6"])){
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>6));
                 $detailsarrangement->setEtat(true);
                  $em->merge($detailsarrangement);
                  $em->flush();
                 
                 
                
            }
            else{
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>6));
                 $detailsarrangement->setEtat(false);
                  $em->merge($detailsarrangement);
                  $em->flush();
            }
             if(isset($_POST["7"])){
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>7));
                 $detailsarrangement->setEtat(true);
                  $em->merge($detailsarrangement);
                  $em->flush();
                 
                 
                
            }
            else{
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>7));
                 $detailsarrangement->setEtat(false);
                  $em->merge($detailsarrangement);
                  $em->flush();
            }
             if(isset($_POST["8"])){
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>8));
                 $detailsarrangement->setEtat(true);
                  $em->merge($detailsarrangement);
                  $em->flush();
                 
                 
                
            }
            else{
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>8));
                 $detailsarrangement->setEtat(false);
                  $em->merge($detailsarrangement);
                  $em->flush();
            }
             if(isset($_POST["9"])){
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>9));
                 $detailsarrangement->setEtat(true);
                  $em->merge($detailsarrangement);
                  $em->flush();
                 
                 
                
            }
            else{
                 $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array('hotel'=>$data,'arrangement'=>9));
                 $detailsarrangement->setEtat(false);
                  $em->merge($detailsarrangement);
                  $em->flush();
            }
                     $this->get('session')->getFlashBag()->add(
                'info', 'Tarif Bien ajouté!!.'
        );
                     return $this->redirect($this->generateUrl('add_tarif_hotel'));
            
        }

        return $this->render('HotelBundle:Hotels:addtarifperiodehotel.html.twig', array('form' => $form->createView(), 'detailschambre' => $detailschambre, 'detailsarrangement' => $detailsarrangement, 'detailsreduction' => $detailsreduction));
    }

}
