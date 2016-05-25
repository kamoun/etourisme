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
       

        $detailshotel = new DetailsHotel();
        $detailshotel->setHotel($hotel);
        $form = $this->createForm(DetailsHotelType::class, $detailshotel, array(
            'action' => $this->generateUrl('add_tarifperiode_hotel'),
            'method' => 'POST',
        ));
        $form->handleRequest($request);
        if ($form->isValid()) {
           
           
            $em = $this->getDoctrine()->getManager();
            $detailshotel->setHotel($hotel);
            $em->persist($detailshotel);
            $em->flush();
           
             $ar1 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>1));
            if($ar1!=null){
             if(isset($_POST["1"])){
               
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                $detailsarr1=new DetailsArrangement();
                $detailsarr1->setArrangement($arrangement);
                $detailsarr1->setHotel($hotel);
                $detailsarr1->setEtat(1);
                $detailsarr1->setTempsd($detailshotel->getTempsd());
                $detailsarr1->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr1);
                $em->flush();         
            }
            else{
                
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                $detailsarr1=new DetailsArrangement();
                $detailsarr1->setArrangement($arrangement);
                $detailsarr1->setHotel($hotel);
                $detailsarr1->setEtat(0);
                $detailsarr1->setTempsd($detailshotel->getTempsd());
                $detailsarr1->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr1);
                $em->flush();
            }   
            }
             $ar2 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>2));
           if($ar2!=null){
            if(isset($_POST["2"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(2);
                $detailsarr2=new DetailsArrangement();
                $detailsarr2->setArrangement($arrangement);
                $detailsarr2->setHotel($hotel);
                $detailsarr2->setEtat(1);
                $detailsarr2->setTempsd($detailshotel->getTempsd());
                $detailsarr2->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr2);
                $em->flush();         
            }
            else{
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(2);
                $detailsarr2=new DetailsArrangement();
                $detailsarr2->setArrangement($arrangement);
                $detailsarr2->setHotel($hotel);
                $detailsarr2->setEtat(0);
                $detailsarr2->setTempsd($detailshotel->getTempsd());
                $detailsarr2->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr2);
                $em->flush();
            } 
           }
           
            $ar3 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>3));
           if($ar3!=null){
            if(isset($_POST["3"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(3);
                $detailsarr3=new DetailsArrangement();
                $detailsarr3->setArrangement($arrangement);
                $detailsarr3->setHotel($hotel);
                $detailsarr3->setEtat(1);
                $detailsarr3->setTempsd($detailshotel->getTempsd());
                $detailsarr3->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr3);
                $em->flush();         
            }
            else{
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(3);
                $detailsarr3=new DetailsArrangement();
                $detailsarr3->setArrangement($arrangement);
                $detailsarr3->setHotel($hotel);
                $detailsarr3->setEtat(0);
                $detailsarr3->setTempsd($detailshotel->getTempsd());
                $detailsarr3->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr3);
                $em->flush();
            } 
           }
           
           //4
            $ar4 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>4));
           if($ar4!=null){
            if(isset($_POST["4"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(4);
                $detailsarr4=new DetailsArrangement();
                $detailsarr4->setArrangement($arrangement);
                $detailsarr4->setHotel($hotel);
                $detailsarr4->setEtat(1);
                $detailsarr4->setTempsd($detailshotel->getTempsd());
                $detailsarr4->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr4);
                $em->flush();         
            }
            else{
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(4);
                $detailsarr4=new DetailsArrangement();
                $detailsarr4->setArrangement($arrangement);
                $detailsarr4->setHotel($hotel);
                $detailsarr4->setEtat(0);
                $detailsarr4->setTempsd($detailshotel->getTempsd());
                $detailsarr4->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr4);
                $em->flush();
            } 
           }
            //5
            $ar5 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>5));
           if($ar5!=null){
            if(isset($_POST["5"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(5);
                $detailsarr5=new DetailsArrangement();
                $detailsarr5->setArrangement($arrangement);
                $detailsarr5->setHotel($hotel);
                $detailsarr5->setEtat(1);
                $detailsarr5->setTempsd($detailshotel->getTempsd());
                $detailsarr5->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr5);
                $em->flush();         
            }
            else{
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(5);
                $detailsarr5=new DetailsArrangement();
                $detailsarr5->setArrangement($arrangement);
                $detailsarr5->setHotel($hotel);
                $detailsarr5->setEtat(0);
                $detailsarr5->setTempsd($detailshotel->getTempsd());
                $detailsarr5->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr5);
                $em->flush();
            } 
           }
           
           //5
            
            //6
            $ar6 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>6));
           if($ar6!=null){
            if(isset($_POST["6"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(6);
                $detailsarr6=new DetailsArrangement();
                $detailsarr6->setArrangement($arrangement);
                $detailsarr6->setHotel($hotel);
                $detailsarr6->setEtat(1);
                $detailsarr6->setTempsd($detailshotel->getTempsd());
                $detailsarr6->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr6);
                $em->flush();         
            }
            else{
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(6);
                $detailsarr6=new DetailsArrangement();
                $detailsarr6->setArrangement($arrangement);
                $detailsarr6->setHotel($hotel);
                $detailsarr6->setEtat(0);
                $detailsarr6->setTempsd($detailshotel->getTempsd());
                $detailsarr6->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr6);
                $em->flush();
            } 
           }
           
           //6
           
           //7
            $ar7 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>7));
           if($ar7!=null){
            if(isset($_POST["7"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(6);
                $detailsarr7=new DetailsArrangement();
                $detailsarr7->setArrangement($arrangement);
                $detailsarr7->setHotel($hotel);
                $detailsarr7->setEtat(1);
                $detailsarr7->setTempsd($detailshotel->getTempsd());
                $detailsarr7->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr7);
                $em->flush();         
            }
            else{
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(7);
                $detailsarr7=new DetailsArrangement();
                $detailsarr7->setArrangement($arrangement);
                $detailsarr7->setHotel($hotel);
                $detailsarr7->setEtat(0);
                $detailsarr7->setTempsd($detailshotel->getTempsd());
                $detailsarr7->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr7);
                $em->flush();
            } 
           }
           
           //7
           
           //8
            $ar8 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>8));
           if($ar8!=null){
            if(isset($_POST["8"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(8);
                $detailsarr8=new DetailsArrangement();
                $detailsarr8->setArrangement($arrangement);
                $detailsarr8->setHotel($hotel);
                $detailsarr8->setEtat(1);
                $detailsarr8->setTempsd($detailshotel->getTempsd());
                $detailsarr8->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr8);
                $em->flush();         
            }
            else{
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(8);
                $detailsarr8=new DetailsArrangement();
                $detailsarr8->setArrangement($arrangement);
                $detailsarr8->setHotel($hotel);
                $detailsarr8->setEtat(0);
                $detailsarr8->setTempsd($detailshotel->getTempsd());
                $detailsarr8->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr8);
                $em->flush();
            } 
           }
           
           //8
            //9
            $ar9 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>9));
           if($ar9!=null){
            if(isset($_POST["9"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(9);
                $detailsarr9=new DetailsArrangement();
                $detailsarr9->setArrangement($arrangement);
                $detailsarr9->setHotel($hotel);
                $detailsarr9->setEtat(1);
                $detailsarr9->setTempsd($detailshotel->getTempsd());
                $detailsarr9->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr9);
                $em->flush();         
            }
            else{
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(9);
                $detailsarr9=new DetailsArrangement();
                $detailsarr9->setArrangement($arrangement);
                $detailsarr9->setHotel($hotel);
                $detailsarr9->setEtat(0);
                $detailsarr9->setTempsd($detailshotel->getTempsd());
                $detailsarr9->setTempsf($detailshotel->getTempsf());
                $em->persist($detailsarr9);
                $em->flush();
            } 
           }
           
           //9
                $this->get('session')->getFlashBag()->add(
                'info', 'Tarif Bien ajouté'
                );
                     return $this->redirect($this->generateUrl('add_tarif_hotel'));
            
        }

        return $this->render('HotelBundle:Hotels:addtarifperiodehotel.html.twig', array('form' => $form->createView(), 'detailschambre' => $detailschambre, 'detailsarrangement' => $detailsarrangement, 'detailsreduction' => $detailsreduction));
    }
    
     public function preDisplayTarifAction(Request $request) {

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
            return $this->redirect($this->generateUrl('list_tarif_hotel'));
        }

        return $this->render('HotelBundle:Hotels:displayListTarifsHotel.html.twig', array('form' => $form->createView()));
    }
    
    public function listTarifsHotelAction(Request $request){
        
        $session = $request->getSession();
        $data = $session->get('id');
        $detailschambre = $this->getDoctrine()->getRepository('HotelBundle:DetailsHotel')->findByHotel($data);
       
         return $this->render('HotelBundle:Hotels:listTarifsByHotel.html.twig', array('tarifs'=>$detailschambre));
   
    }
    
     public function editTarifAction($id) {

        $em = $this->getDoctrine()->getManager();
        $detailshotel = $em->getRepository('HotelBundle:DetailsHotel')->find($id);
        $detailschambre = $this->getDoctrine()->getRepository('HotelBundle:DetailsChambre')->findByHotel($detailshotel->getHotel()->getId());
        $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$detailshotel->getHotel()->getId(),"tempsd"=>$detailshotel->getTempsd(),"tempsf"=>$detailshotel->getTempsf()) );
        $detailsreduction = $this->getDoctrine()->getRepository('HotelBundle:DetailsReduction')->findByHotel($detailshotel->getHotel()->getId());
       

        if (!$detailshotel) {
            throw $this->createNotFoundException('Impossible de trouver Les details de cet hôtel');
        }
        $editForm = $this->createEditTarifForm($detailshotel);

        return $this->render('HotelBundle:Hotels:edittarifperiodehotel.html.twig', array(
                    'entity' => $detailshotel,
                    'detailsarrangement'=>$detailsarrangement,
                    'form' => $editForm->createView(),
        ));
    }

    /**
     * Creation Formulaire d Edition Employé
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditTarifForm(DetailsHotel $entity) {
        $form = $this->createForm(DetailsHotelType::class, $entity, array(
            'action' => $this->generateUrl('update_tarif', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }
    
    
    
     public function updateTarifPeriodeHotelAction(Request $request,$id) {
         $em = $this->getDoctrine()->getManager();
       $detailshotel = $this->getDoctrine()->getRepository('HotelBundle:DetailsHotel')->find($id);
       $hotel = $this->getDoctrine()->getRepository('HotelBundle:Hotel')->find($detailshotel->getHotel()->getId());
      
        $detailschambre = $this->getDoctrine()->getRepository('HotelBundle:DetailsChambre')->findByHotel($detailshotel->getHotel()->getId());
        $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findByHotel($detailshotel->getHotel()->getId());
        $detailsreduction = $this->getDoctrine()->getRepository('HotelBundle:DetailsReduction')->findByHotel($detailshotel->getHotel()->getId());
       

        if (!$detailshotel) {
            throw $this->createNotFoundException('Unable to find Hotel entity.');
        }
        $editForm = $this->createForm(DetailsHotelType::class, $detailshotel);
        $editForm->handleRequest($request);
       
        if ($editForm->isValid()) {
           
           
            $em = $this->getDoctrine()->getManager();
            $detailshotel->setHotel($hotel);
            $em->merge($detailshotel);
            $em->flush();
           
             $ar1 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>1,"tempsd"=>$editForm['tempsd']->getData(),"tempsf"=>$editForm['tempsf']->getData()));
             
             if($ar1!=null){
             if(isset($_POST["1"])){
               
               // $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                
                $ar1 ->setEtat(1);
               
                $em->merge($ar1 );
                $em->flush();         
            }
            else{
                
                //$arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                 
                $ar1 ->setEtat(0);
               
                $em->merge($ar1 );
                $em->flush(); 
            }   
            }
             $ar2 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>2,"tempsd"=>$editForm['tempsd']->getData(),"tempsf"=>$editForm['tempsf']->getData()));
             
             if($ar2!=null){
             if(isset($_POST["2"])){
               
               // $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                
                $ar2 ->setEtat(1);
               
                $em->merge($ar2 );
                $em->flush();         
            }
            else{
                
                //$arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                 
                $ar2 ->setEtat(0);
               
                $em->merge($ar2 );
                $em->flush(); 
            }   
            }
           
           $ar3 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>3,"tempsd"=>$editForm['tempsd']->getData(),"tempsf"=>$editForm['tempsf']->getData()));
             
             if($ar3!=null){
             if(isset($_POST["3"])){
               
               // $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                
                $ar3 ->setEtat(1);
               
                $em->merge($ar3 );
                $em->flush();         
            }
            else{
                
                //$arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                 
                $ar3 ->setEtat(0);
               
                $em->merge($ar3 );
                $em->flush(); 
            }   
            }
           
           //4
           $ar4 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>4,"tempsd"=>$editForm['tempsd']->getData(),"tempsf"=>$editForm['tempsf']->getData()));
             
             if($ar4!=null){
             if(isset($_POST["4"])){
               
               // $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                
                $ar4 ->setEtat(1);
               
                $em->merge($ar4 );
                $em->flush();         
            }
            else{
                
                //$arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                 
                $ar4 ->setEtat(0);
               
                $em->merge($ar4);
                $em->flush(); 
            }   
            }
            //5
           $ar5 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>5,"tempsd"=>$editForm['tempsd']->getData(),"tempsf"=>$editForm['tempsf']->getData()));
             
             if($ar5!=null){
             if(isset($_POST["5"])){
               
               // $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                
                $ar5 ->setEtat(1);
               
                $em->merge($ar5);
                $em->flush();         
            }
            else{
                
                //$arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                 
                $ar5 ->setEtat(0);
               
                $em->merge($ar5);
                $em->flush(); 
            }   
            }
           //5
            
            //6
            $ar6 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>6,"tempsd"=>$editForm['tempsd']->getData(),"tempsf"=>$editForm['tempsf']->getData()));
             
             if($ar6!=null){
             if(isset($_POST["6"])){
               
               // $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                
                $ar6 ->setEtat(1);
               
                $em->merge($ar6);
                $em->flush();         
            }
            else{
                
                //$arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                 
                $ar6 ->setEtat(0);
               
                $em->merge($ar6);
                $em->flush(); 
            }   
            }
           
           //6
           
           //7
            $ar7 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>7,"tempsd"=>$editForm['tempsd']->getData(),"tempsf"=>$editForm['tempsf']->getData()));
             
             if($ar7!=null){
             if(isset($_POST["7"])){
               
               // $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                
                $ar7 ->setEtat(1);
               
                $em->merge($ar7);
                $em->flush();         
            }
            else{
                
                //$arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                 
                $ar7 ->setEtat(0);
               
                $em->merge($ar7);
                $em->flush(); 
            }   
            }
           
           //7
           
           //8
           $ar8 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>8,"tempsd"=>$editForm['tempsd']->getData(),"tempsf"=>$editForm['tempsf']->getData()));
             
             if($ar8!=null){
             if(isset($_POST["8"])){
               
               // $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                
                $ar8 ->setEtat(1);
               
                $em->merge($ar8);
                $em->flush();         
            }
            else{
                
                //$arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                 
                $ar8 ->setEtat(0);
               
                $em->merge($ar8);
                $em->flush(); 
            }   
            }
           //8
            //9
            $ar9 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>9,"tempsd"=>$editForm['tempsd']->getData(),"tempsf"=>$editForm['tempsf']->getData()));
             
             if($ar9!=null){
             if(isset($_POST["9"])){
               
               // $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                
                $ar9 ->setEtat(1);
               
                $em->merge($ar9);
                $em->flush();         
            }
            else{
                
                //$arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                 
                $ar9 ->setEtat(0);
               
                $em->merge($ar9);
                $em->flush(); 
            }   
            }
           //9
                $this->get('session')->getFlashBag()->add(
                'info', 'Tarif Bien modifiée'
                );
                     return $this->redirect($this->generateUrl('pre_listtarif_hotel'));
            
        }

        return $this->render('HotelBundle:Hotels:edittarifperiodhotel.html.twig', array('form' => $editForm->createView(),'entity' => $detailshotel));
    }


}
