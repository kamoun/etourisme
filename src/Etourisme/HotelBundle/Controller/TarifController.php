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
use Etourisme\HotelBundle\Entity\Tarif;
use Etourisme\HotelBundle\Entity\Occupant;

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
        $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"tempsd"=>null,"tempsf"=>null));
        $libArr = array();
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
            $libArr[] = 'suppLpd';    
             if(isset($_POST["1"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(1);
                $detailsarr1=new DetailsArrangement();
                $detailsarr1->setArrangement($arrangement);
                $detailsarr1->setHotel($hotel);
                $detailsarr1->setEtat(1);
                $detailsarr1->setTempsd($detailshotel->getTempsd());
                $detailsarr1->setTempsf($detailshotel->getTempsf());
                $detailsarr1->setDetailsHotel($detailshotel);
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
                $detailsarr1->setDetailsHotel($detailshotel);
                $em->persist($detailsarr1);
                $em->flush();
            }   
            }
             $ar2 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>2));
           if($ar2!=null){
            $libArr[] = 'suppDp';      
            if(isset($_POST["2"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(2);
                $detailsarr2=new DetailsArrangement();
                $detailsarr2->setArrangement($arrangement);
                $detailsarr2->setHotel($hotel);
                $detailsarr2->setEtat(1);
                $detailsarr2->setTempsd($detailshotel->getTempsd());
                $detailsarr2->setTempsf($detailshotel->getTempsf());
                $detailsarr2->setDetailsHotel($detailshotel);
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
                $detailsarr2->setDetailsHotel($detailshotel);
                $em->persist($detailsarr2);
                $em->flush();
            } 
           }
           
            $ar3 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>3));
           if($ar3!=null){
           $libArr[] = 'suppPc';    
            if(isset($_POST["3"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(3);
                $detailsarr3=new DetailsArrangement();
                $detailsarr3->setArrangement($arrangement);
                $detailsarr3->setHotel($hotel);
                $detailsarr3->setEtat(1);
                $detailsarr3->setTempsd($detailshotel->getTempsd());
                $detailsarr3->setTempsf($detailshotel->getTempsf());
                $detailsarr3->setDetailsHotel($detailshotel);
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
                $detailsarr3->setDetailsHotel($detailshotel);
                $em->persist($detailsarr3);
                $em->flush();
            } 
           }
           
           //4
            $ar4 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>4));
           if($ar4!=null){
           $libArr[] = 'suppAll';    
            if(isset($_POST["4"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(4);
                $detailsarr4=new DetailsArrangement();
                $detailsarr4->setArrangement($arrangement);
                $detailsarr4->setHotel($hotel);
                $detailsarr4->setEtat(1);
                $detailsarr4->setTempsd($detailshotel->getTempsd());
                $detailsarr4->setTempsf($detailshotel->getTempsf());
                $detailsarr4->setDetailsHotel($detailshotel);
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
                $detailsarr4->setDetailsHotel($detailshotel);
                $em->persist($detailsarr4);
                $em->flush();
            } 
           }
            //5
            $ar5 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>5));
           if($ar5!=null){
            $libArr[] = 'suppLs';     
            if(isset($_POST["5"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(5);
                $detailsarr5=new DetailsArrangement();
                $detailsarr5->setArrangement($arrangement);
                $detailsarr5->setHotel($hotel);
                $detailsarr5->setEtat(1);
                $detailsarr5->setTempsd($detailshotel->getTempsd());
                $detailsarr5->setTempsf($detailshotel->getTempsf());
                $detailsarr5->setDetailsHotel($detailshotel);
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
                $detailsarr5->setDetailsHotel($detailshotel);
                $em->persist($detailsarr5);
                $em->flush();
            } 
           }
            //6
            $ar6 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>6));
           if($ar6!=null){
           $libArr[] = 'suppAllSoft';     
            if(isset($_POST["6"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(6);
                $detailsarr6=new DetailsArrangement();
                $detailsarr6->setArrangement($arrangement);
                $detailsarr6->setHotel($hotel);
                $detailsarr6->setEtat(1);
                $detailsarr6->setTempsd($detailshotel->getTempsd());
                $detailsarr6->setTempsf($detailshotel->getTempsf());
                $detailsarr6->setDetailsHotel($detailshotel);
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
                $detailsarr6->setDetailsHotel($detailshotel);
                $em->persist($detailsarr6);
                $em->flush();
            } 
           }          
           //7
            $ar7 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>7));
           if($ar7!=null){
           $libArr[] = 'suppUltraAll';     
            if(isset($_POST["7"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(6);
                $detailsarr7=new DetailsArrangement();
                $detailsarr7->setArrangement($arrangement);
                $detailsarr7->setHotel($hotel);
                $detailsarr7->setEtat(1);
                $detailsarr7->setTempsd($detailshotel->getTempsd());
                $detailsarr7->setTempsf($detailshotel->getTempsf());
                $detailsarr7->setDetailsHotel($detailshotel);
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
                $detailsarr7->setDetailsHotel($detailshotel);
                $em->persist($detailsarr7);
                $em->flush();
            } 
           }
          
           //8
            $ar8 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>8));
           if($ar8!=null){
           $libArr[] = 'suppDpp';     
            if(isset($_POST["8"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(8);
                $detailsarr8=new DetailsArrangement();
                $detailsarr8->setArrangement($arrangement);
                $detailsarr8->setHotel($hotel);
                $detailsarr8->setEtat(1);
                $detailsarr8->setTempsd($detailshotel->getTempsd());
                $detailsarr8->setTempsf($detailshotel->getTempsf());
                $detailsarr8->setDetailsHotel($detailshotel);
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
                $detailsarr8->setDetailsHotel($detailshotel);
                $em->persist($detailsarr8);
                $em->flush();
            } 
           }

            //9
            $ar9 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"arrangement"=>9));
           if($ar9!=null){
           $libArr[] = 'suppPcp';      
            if(isset($_POST["9"])){
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find(9);
                $detailsarr9=new DetailsArrangement();
                $detailsarr9->setArrangement($arrangement);
                $detailsarr9->setHotel($hotel);
                $detailsarr9->setEtat(1);
                $detailsarr9->setTempsd($detailshotel->getTempsd());
                $detailsarr9->setTempsf($detailshotel->getTempsf());
                $detailsarr9->setDetailsHotel($detailshotel);
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
                $detailsarr9->setDetailsHotel($detailshotel);
                $em->persist($detailsarr9);
                $em->flush();
            } 
           }
           
           //add tarif
            $chambreS = $this->getDoctrine()->getRepository('HotelBundle:DetailsChambre')->findOneBy(array("hotel"=>$hotel->getId(),"chambre"=>1));
            $chambreD = $this->getDoctrine()->getRepository('HotelBundle:DetailsChambre')->findOneBy(array("hotel"=>$hotel->getId(),"chambre"=>2));
            $chambreT = $this->getDoctrine()->getRepository('HotelBundle:DetailsChambre')->findOneBy(array("hotel"=>$hotel->getId(),"chambre"=>3));
            $chambreQ = $this->getDoctrine()->getRepository('HotelBundle:DetailsChambre')->findOneBy(array("hotel"=>$hotel->getId(),"chambre"=>4));
           
            $occupant1 = $this->getDoctrine()->getRepository('HotelBundle:Occupant')->find(1);
            $occupant2 = $this->getDoctrine()->getRepository('HotelBundle:Occupant')->find(2);
            $occupant3 = $this->getDoctrine()->getRepository('HotelBundle:Occupant')->find(3);
            $occupant4 = $this->getDoctrine()->getRepository('HotelBundle:Occupant')->find(4);
            $occupant5 = $this->getDoctrine()->getRepository('HotelBundle:Occupant')->find(5);
            $occupant6 = $this->getDoctrine()->getRepository('HotelBundle:Occupant')->find(6);
            //if (is_array($detailsarrangement))
            foreach($detailsarrangement as $key1=>$arrangement){
            //chambre single    
            if($chambreS!=null){
                
                $tarif1=new Tarif(); 
                $tarif2=new Tarif(); 
                foreach($libArr as $key2=>$arr){
                if($key1==$key2){
                $tarifCalc1 = ($form[$arr]->getData()+$form['tarifBase']->getData()+$form['suppSingle']->getData())*(1+($form['marge']->getData()/100));
                $tarifCalc2 = (($form[$arr]->getData()+$form['tarifBase']->getData()+$form['suppSingle']->getData())*(1-($form['reduc3']->getData()/100)))*(1+($form['marge']->getData()/100));
                }
                }
                $tarif1->setArrangement($arrangement->getArrangement());
                $tarif1->setChambre($chambreS->getChambre());
                $tarif1->setHotel($hotel);
                $tarif1->setOccupant($occupant1);
                $tarif1->setPrix($tarifCalc1);
                $tarif1->setTempsd($form['tempsd']->getData());
                $tarif1->setTempsf($form['tempsf']->getData());
                $em->persist($tarif1);
                $em->flush();
                $tarif2->setArrangement($arrangement->getArrangement());
                $tarif2->setChambre($chambreS->getChambre());
                $tarif2->setHotel($hotel);
                $tarif2->setOccupant($occupant2);
                $tarif2->setPrix($tarifCalc2);
                $tarif2->setTempsd($form['tempsd']->getData());
                $tarif2->setTempsf($form['tempsf']->getData());
                $em->persist($tarif2);
                $em->flush();
            }
            
            //chambre double
            if($chambreD!=null){
                
                $tarif1=new Tarif(); 
                $tarif2=new Tarif(); 
                $tarif3=new Tarif(); 
                foreach($libArr as $key2=>$arr){
                if($key1==$key2){
                $tarifCalc1 = ($form[$arr]->getData()+$form['tarifBase']->getData())*(1+($form['marge']->getData()/100));
                $tarifCalc2 = (($form[$arr]->getData()+$form['tarifBase']->getData())*(1-($form['reduc2']->getData()/100)))*(1+($form['marge']->getData()/100));
                $tarifCalc3 = (($form[$arr]->getData()+$form['tarifBase']->getData())*(1-($form['reduc3']->getData()/100)))*(1+($form['marge']->getData()/100));
                }
                }
                $tarif1->setArrangement($arrangement->getArrangement());
                $tarif1->setChambre($chambreD->getChambre());
                $tarif1->setHotel($hotel);
                $tarif1->setOccupant($occupant1);
                $tarif1->setPrix($tarifCalc1);
                $tarif1->setTempsd($form['tempsd']->getData());
                $tarif1->setTempsf($form['tempsf']->getData());
                $em->persist($tarif1);
                $em->flush();
                $tarif2->setArrangement($arrangement->getArrangement());
                $tarif2->setChambre($chambreD->getChambre());
                $tarif2->setHotel($hotel);
                $tarif2->setOccupant($occupant4);
                $tarif2->setPrix($tarifCalc2);
                $tarif2->setTempsd($form['tempsd']->getData());
                $tarif2->setTempsf($form['tempsf']->getData());
                $em->persist($tarif2);
                $em->flush();
                $tarif3->setArrangement($arrangement->getArrangement());
                $tarif3->setChambre($chambreD->getChambre());
                $tarif3->setHotel($hotel);
                $tarif3->setOccupant($occupant5);
                $tarif3->setPrix($tarifCalc3);
                $tarif3->setTempsd($form['tempsd']->getData());
                $tarif3->setTempsf($form['tempsf']->getData());
                $em->persist($tarif3);
                $em->flush();
                
            }
            
            //chambre triple
            if($chambreT!=null){
                
                $tarif1=new Tarif(); 
                $tarif2=new Tarif(); 
                $tarif3=new Tarif(); 
                $tarif4=new Tarif(); 
                $tarif5=new Tarif(); 
                foreach($libArr as $key2=>$arr){
                if($key1==$key2){
                $tarifCalc1 = ($form[$arr]->getData()+$form['tarifBase']->getData())*(1+($form['marge']->getData()/100));
                $tarifCalc2 = (($form[$arr]->getData()+$form['tarifBase']->getData())*(1-($form['reduc1']->getData()/100)))*(1+($form['marge']->getData()/100));               
                $tarifCalc3 = (($form['tarifBase']->getData()*(1-($form['reduc4']->getData()/100)))+$form[$arr]->getData())*(1+($form['marge']->getData()/100));
                $tarifCalc4 = (($form[$arr]->getData()+$form['tarifBase']->getData())*(1-($form['reduc2']->getData()/100)))*(1+($form['marge']->getData()/100));
                $tarifCalc5 = (($form[$arr]->getData()+$form['tarifBase']->getData())*(1-($form['reduc3']->getData()/100)))*(1+($form['marge']->getData()/100));
                }
                }
               
                $tarif1->setArrangement($arrangement->getArrangement());
                $tarif1->setChambre($chambreT->getChambre());
                $tarif1->setHotel($hotel);
                $tarif1->setOccupant($occupant1);
                $tarif1->setPrix($tarifCalc1);
                $tarif1->setTempsd($form['tempsd']->getData());
                $tarif1->setTempsf($form['tempsf']->getData());
                $em->persist($tarif1);
                $em->flush();
                $tarif2->setArrangement($arrangement->getArrangement());
                $tarif2->setChambre($chambreT->getChambre());
                $tarif2->setHotel($hotel);
                $tarif2->setOccupant($occupant2);
                $tarif2->setPrix($tarifCalc2);
                $tarif2->setTempsd($form['tempsd']->getData());
                $tarif2->setTempsf($form['tempsf']->getData());
                $em->persist($tarif2);
                $em->flush();
                $tarif3->setArrangement($arrangement->getArrangement());
                $tarif3->setChambre($chambreT->getChambre());
                $tarif3->setHotel($hotel);
                $tarif3->setOccupant($occupant3);
                $tarif3->setPrix($tarifCalc3);
                $tarif3->setTempsd($form['tempsd']->getData());
                $tarif3->setTempsf($form['tempsf']->getData());
                $em->persist($tarif3);
                $em->flush();
                $tarif4->setArrangement($arrangement->getArrangement());
                $tarif4->setChambre($chambreT->getChambre());
                $tarif4->setHotel($hotel);
                $tarif4->setOccupant($occupant4);
                $tarif4->setPrix($tarifCalc4);
                $tarif4->setTempsd($form['tempsd']->getData());
                $tarif4->setTempsf($form['tempsf']->getData());
                $em->persist($tarif4);
                $em->flush();
                $tarif5->setArrangement($arrangement->getArrangement());
                $tarif5->setChambre($chambreT->getChambre());
                $tarif5->setHotel($hotel);
                $tarif5->setOccupant($occupant5);
                $tarif5->setPrix($tarifCalc5);
                $tarif5->setTempsd($form['tempsd']->getData());
                $tarif5->setTempsf($form['tempsf']->getData());
                $em->persist($tarif5);
                $em->flush();
                
            }
            
            //chambre quadruple
            if($chambreQ!=null){
                
                $tarif1=new Tarif(); 
                $tarif2=new Tarif(); 
                $tarif3=new Tarif(); 
                $tarif4=new Tarif(); 
                $tarif5=new Tarif(); 
                $tarif6=new Tarif(); 
                foreach($libArr as $key2=>$arr){
                if($key1==$key2){
                $tarifCalc1 = ($form[$arr]->getData()+$form['tarifBase']->getData())*(1+($form['marge']->getData()/100));
                $tarifCalc2 = (($form[$arr]->getData()+$form['tarifBase']->getData())*(1-($form['reduc1']->getData()/100)))*(1+($form['marge']->getData()/100));
                $tarifCalc3 = (($form['tarifBase']->getData()*(1-($form['reduc4']->getData()/100)))+$form[$arr]->getData())*(1+($form['marge']->getData()/100));
                $tarifCalc4 = (($form[$arr]->getData()+$form['tarifBase']->getData())*(1-($form['reduc2']->getData()/100)))*(1+($form['marge']->getData()/100));
                $tarifCalc5 = (($form[$arr]->getData()+$form['tarifBase']->getData())*(1-($form['reduc3']->getData()/100)))*(1+($form['marge']->getData()/100));
                $tarifCalc6 = (($form['tarifBase']->getData()*(1-($form['reduc5']->getData()/100)))+$form[$arr]->getData())*(1+($form['marge']->getData()/100));
                
                }
                }
                $tarif1->setArrangement($arrangement->getArrangement());
                $tarif1->setChambre($chambreQ->getChambre());
                $tarif1->setHotel($hotel);
                $tarif1->setOccupant($occupant1);
                $tarif1->setPrix($tarifCalc1);
                $tarif1->setTempsd($form['tempsd']->getData());
                $tarif1->setTempsf($form['tempsf']->getData());
                $em->persist($tarif1);
                $em->flush();
                $tarif2->setArrangement($arrangement->getArrangement());
                $tarif2->setChambre($chambreQ->getChambre());
                $tarif2->setHotel($hotel);
                $tarif2->setOccupant($occupant2);
                $tarif2->setPrix($tarifCalc2);
                $tarif2->setTempsd($form['tempsd']->getData());
                $tarif2->setTempsf($form['tempsf']->getData());
                $em->persist($tarif2);
                $em->flush();
                $tarif3->setArrangement($arrangement->getArrangement());
                $tarif3->setChambre($chambreQ->getChambre());
                $tarif3->setHotel($hotel);
                $tarif3->setOccupant($occupant3);
                $tarif3->setPrix($tarifCalc3);
                $tarif3->setTempsd($form['tempsd']->getData());
                $tarif3->setTempsf($form['tempsf']->getData());
                $em->persist($tarif3);
                $em->flush();
                $tarif4->setArrangement($arrangement->getArrangement());
                $tarif4->setChambre($chambreQ->getChambre());
                $tarif4->setHotel($hotel);
                $tarif4->setOccupant($occupant4);
                $tarif4->setPrix($tarifCalc4);
                $tarif4->setTempsd($form['tempsd']->getData());
                $tarif4->setTempsf($form['tempsf']->getData());
                $em->persist($tarif4);
                $em->flush();
                $tarif5->setArrangement($arrangement->getArrangement());
                $tarif5->setChambre($chambreQ->getChambre());
                $tarif5->setHotel($hotel);
                $tarif5->setOccupant($occupant5);
                $tarif5->setPrix($tarifCalc5);
                $tarif5->setTempsd($form['tempsd']->getData());
                $tarif5->setTempsf($form['tempsf']->getData());
                $em->persist($tarif5);
                $em->flush();
                $tarif6->setArrangement($arrangement->getArrangement());
                $tarif6->setChambre($chambreQ->getChambre());
                $tarif6->setHotel($hotel);
                $tarif6->setOccupant($occupant6);
                $tarif6->setPrix($tarifCalc6);
                $tarif6->setTempsd($form['tempsd']->getData());
                $tarif6->setTempsf($form['tempsf']->getData());
                $em->persist($tarif6);
                $em->flush();
            }
            }
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
            throw $this->createNotFoundException('Impossible de trouver les détails de cet hôtel');
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
        $session = $request->getSession();
        $data = $session->get('id'); 
        $em = $this->getDoctrine()->getManager();
        $detailshotel = $this->getDoctrine()->getRepository('HotelBundle:DetailsHotel')->find($id);
        $hotel = $this->getDoctrine()->getRepository('HotelBundle:Hotel')->find($detailshotel->getHotel()->getId());
        $libArr = array();
        $detailschambre = $this->getDoctrine()->getRepository('HotelBundle:DetailsChambre')->findByHotel($detailshotel->getHotel()->getId());
        $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findBy(array("hotel"=>$hotel->getId(),"tempsd"=>null,"tempsf"=>null));
        $detailsreduction = $this->getDoctrine()->getRepository('HotelBundle:DetailsReduction')->findByHotel($detailshotel->getHotel()->getId());
       

        if (!$detailshotel) {
            throw $this->createNotFoundException('Unable to find Hotel entity.');
        }
        $form = $this->createForm(DetailsHotelType::class, $detailshotel);
        $form->handleRequest($request);
       
        if ($form->isValid()) {
           
           
            $em = $this->getDoctrine()->getManager();
            $detailshotel->setHotel($hotel);
            $em->merge($detailshotel);
            $em->flush();
           
            $ar1 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>1,"tempsd"=>$form['tempsd']->getData(),"tempsf"=>$form['tempsf']->getData()));
             
             if($ar1!=null){
             $libArr[] = 'suppLpd';    
             if(isset($_POST["1"])){
                $ar1 ->setEtat(1);
                $em->merge($ar1);
                $em->flush();         
            }
            else{
                $ar1 ->setEtat(0);              
                $em->merge($ar1);
                $em->flush(); 
            }   
            }
             $ar2 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>2,"tempsd"=>$form['tempsd']->getData(),"tempsf"=>$form['tempsf']->getData()));            
             if($ar2!=null){
             $libArr[] = 'suppDp';    
             if(isset($_POST["2"])){  
                $ar2 ->setEtat(1);               
                $em->merge($ar2);
                $em->flush();         
            }
            else{ 
                $ar2 ->setEtat(0);              
                $em->merge($ar2);
                $em->flush(); 
            }   
            }         
            $ar3 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>3,"tempsd"=>$form['tempsd']->getData(),"tempsf"=>$form['tempsf']->getData()));  
             if($ar3!=null){
             $libArr[] = 'suppPc';     
             if(isset($_POST["3"])){
                $ar3 ->setEtat(1);               
                $em->merge($ar3 );
                $em->flush();         
            }
            else{
                $ar3 ->setEtat(0);               
                $em->merge($ar3);
                $em->flush(); 
            }   
            }
           
           //4
           $ar4 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>4,"tempsd"=>$form['tempsd']->getData(),"tempsf"=>$form['tempsf']->getData()));            
             if($ar4!=null){
             $libArr[] = 'suppAll';     
             if(isset($_POST["4"])){ 
                $ar4 ->setEtat(1);             
                $em->merge($ar4);
                $em->flush();         
            }
            else{
                $ar4 ->setEtat(0);              
                $em->merge($ar4);
                $em->flush(); 
            }   
            }
            //5
           $ar5 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>5,"tempsd"=>$form['tempsd']->getData(),"tempsf"=>$form['tempsf']->getData()));          
             if($ar5!=null){
             $libArr[] = 'suppLs';    
             if(isset($_POST["5"])){   
                $ar5 ->setEtat(1);               
                $em->merge($ar5);
                $em->flush();         
            }
            else{ 
                $ar5 ->setEtat(0);             
                $em->merge($ar5);
                $em->flush(); 
            }   
            }
            //6
            $ar6 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>6,"tempsd"=>$form['tempsd']->getData(),"tempsf"=>$form['tempsf']->getData()));            
             if($ar6!=null){
             $libArr[] = 'suppAllSoft';     
             if(isset($_POST["6"])){ 
                $ar6 ->setEtat(1);              
                $em->merge($ar6);
                $em->flush();         
            }
            else{            
                $ar6 ->setEtat(0);              
                $em->merge($ar6);
                $em->flush(); 
            }   
            }   
           //7
            $ar7 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>7,"tempsd"=>$form['tempsd']->getData(),"tempsf"=>$form['tempsf']->getData()));             
             if($ar7!=null){
             $libArr[] = 'suppUltraAll';    
             if(isset($_POST["7"])){
                $ar7 ->setEtat(1);               
                $em->merge($ar7);
                $em->flush();         
            }
            else{     
                $ar7 ->setEtat(0);              
                $em->merge($ar7);
                $em->flush(); 
            }   
            }
           //8
           $ar8 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>8,"tempsd"=>$form['tempsd']->getData(),"tempsf"=>$form['tempsf']->getData()));            
             if($ar8!=null){
             $libArr[] = 'suppDpp';    
             if(isset($_POST["8"])){   
                $ar8 ->setEtat(1);              
                $em->merge($ar8);
                $em->flush();         
            }
            else{               
                $ar8 ->setEtat(0);               
                $em->merge($ar8);
                $em->flush(); 
            }   
            }
            //9
            $ar9 = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findOneBy(array("hotel"=>$detailshotel->getHotel()->getId(),"arrangement"=>9,"tempsd"=>$form['tempsd']->getData(),"tempsf"=>$form['tempsf']->getData()));            
             if($ar9!=null){
             $libArr[] = 'suppPcp';    
             if(isset($_POST["9"])){
                $ar9 ->setEtat(1);              
                $em->merge($ar9);
                $em->flush();         
            }
            else{
                $ar9 ->setEtat(0);             
                $em->merge($ar9);
                $em->flush(); 
            }   
            }
       
            //delete tarif
            $tarifs = $this->getDoctrine()->getRepository('HotelBundle:Tarif')->findBy(array("hotel"=>$detailshotel->getHotel()->getId(),"tempsd"=>$detailshotel->getTempsd(),"tempsf"=>$detailshotel->getTempsf()));
            foreach ($tarifs as $tarif) {
                $em->remove($tarif);
            }
            $em->flush();
                        
            //add tarif
            $chambreS = $this->getDoctrine()->getRepository('HotelBundle:DetailsChambre')->findOneBy(array("hotel"=>$hotel->getId(),"chambre"=>1));
            $chambreD = $this->getDoctrine()->getRepository('HotelBundle:DetailsChambre')->findOneBy(array("hotel"=>$hotel->getId(),"chambre"=>2));
            $chambreT = $this->getDoctrine()->getRepository('HotelBundle:DetailsChambre')->findOneBy(array("hotel"=>$hotel->getId(),"chambre"=>3));
            $chambreQ = $this->getDoctrine()->getRepository('HotelBundle:DetailsChambre')->findOneBy(array("hotel"=>$hotel->getId(),"chambre"=>4));
           
            $occupant1 = $this->getDoctrine()->getRepository('HotelBundle:Occupant')->find(1);
            $occupant2 = $this->getDoctrine()->getRepository('HotelBundle:Occupant')->find(2);
            $occupant3 = $this->getDoctrine()->getRepository('HotelBundle:Occupant')->find(3);
            $occupant4 = $this->getDoctrine()->getRepository('HotelBundle:Occupant')->find(4);
            $occupant5 = $this->getDoctrine()->getRepository('HotelBundle:Occupant')->find(5);
            $occupant6 = $this->getDoctrine()->getRepository('HotelBundle:Occupant')->find(6);
            //if (is_array($detailsarrangement))
            foreach($detailsarrangement as $key1=>$arrangement){
            //chambre single    
            if($chambreS!=null){
                
                $tarif1=new Tarif(); 
                $tarif2=new Tarif(); 
                foreach($libArr as $key2=>$arr){
                if($key1==$key2){
                $tarifCalc1 = ($form[$arr]->getData()+$form['tarifBase']->getData()+$form['suppSingle']->getData())*(1+($form['marge']->getData()/100));
                $tarifCalc2 = (($form[$arr]->getData()+$form['tarifBase']->getData()+$form['suppSingle']->getData())*(1-($form['reduc3']->getData()/100)))*(1+($form['marge']->getData()/100));
                }
                }
                $tarif1->setArrangement($arrangement->getArrangement());
                $tarif1->setChambre($chambreS->getChambre());
                $tarif1->setHotel($hotel);
                $tarif1->setOccupant($occupant1);
                $tarif1->setPrix($tarifCalc1);
                $tarif1->setTempsd($form['tempsd']->getData());
                $tarif1->setTempsf($form['tempsf']->getData());
                $em->persist($tarif1);
                $em->flush();
                $tarif2->setArrangement($arrangement->getArrangement());
                $tarif2->setChambre($chambreS->getChambre());
                $tarif2->setHotel($hotel);
                $tarif2->setOccupant($occupant2);
                $tarif2->setPrix($tarifCalc2);
                $tarif2->setTempsd($form['tempsd']->getData());
                $tarif2->setTempsf($form['tempsf']->getData());
                $em->persist($tarif2);
                $em->flush();
            }
            
            //chambre double
            if($chambreD!=null){
                
                $tarif1=new Tarif(); 
                $tarif2=new Tarif(); 
                $tarif3=new Tarif(); 
                foreach($libArr as $key2=>$arr){
                if($key1==$key2){
                $tarifCalc1 = ($form[$arr]->getData()+$form['tarifBase']->getData())*(1+($form['marge']->getData()/100));
                $tarifCalc2 = (($form[$arr]->getData()+$form['tarifBase']->getData())*(1-($form['reduc2']->getData()/100)))*(1+($form['marge']->getData()/100));
                $tarifCalc3 = (($form[$arr]->getData()+$form['tarifBase']->getData())*(1-($form['reduc3']->getData()/100)))*(1+($form['marge']->getData()/100));
                }
                }
                $tarif1->setArrangement($arrangement->getArrangement());
                $tarif1->setChambre($chambreD->getChambre());
                $tarif1->setHotel($hotel);
                $tarif1->setOccupant($occupant1);
                $tarif1->setPrix($tarifCalc1);
                $tarif1->setTempsd($form['tempsd']->getData());
                $tarif1->setTempsf($form['tempsf']->getData());
                $em->persist($tarif1);
                $em->flush();
                $tarif2->setArrangement($arrangement->getArrangement());
                $tarif2->setChambre($chambreD->getChambre());
                $tarif2->setHotel($hotel);
                $tarif2->setOccupant($occupant4);
                $tarif2->setPrix($tarifCalc2);
                $tarif2->setTempsd($form['tempsd']->getData());
                $tarif2->setTempsf($form['tempsf']->getData());
                $em->persist($tarif2);
                $em->flush();
                $tarif3->setArrangement($arrangement->getArrangement());
                $tarif3->setChambre($chambreD->getChambre());
                $tarif3->setHotel($hotel);
                $tarif3->setOccupant($occupant5);
                $tarif3->setPrix($tarifCalc3);
                $tarif3->setTempsd($form['tempsd']->getData());
                $tarif3->setTempsf($form['tempsf']->getData());
                $em->persist($tarif3);
                $em->flush();
                
            }
            
            //chambre triple
            if($chambreT!=null){
                
                $tarif1=new Tarif(); 
                $tarif2=new Tarif(); 
                $tarif3=new Tarif(); 
                $tarif4=new Tarif(); 
                $tarif5=new Tarif(); 
                foreach($libArr as $key2=>$arr){
                if($key1==$key2){
                $tarifCalc1 = ($form[$arr]->getData()+$form['tarifBase']->getData())*(1+($form['marge']->getData()/100));
                $tarifCalc2 = (($form[$arr]->getData()+$form['tarifBase']->getData())*(1-($form['reduc1']->getData()/100)))*(1+($form['marge']->getData()/100));               
                $tarifCalc3 = (($form['tarifBase']->getData()*(1-($form['reduc4']->getData()/100)))+$form[$arr]->getData())*(1+($form['marge']->getData()/100));
                $tarifCalc4 = (($form[$arr]->getData()+$form['tarifBase']->getData())*(1-($form['reduc2']->getData()/100)))*(1+($form['marge']->getData()/100));
                $tarifCalc5 = (($form[$arr]->getData()+$form['tarifBase']->getData())*(1-($form['reduc3']->getData()/100)))*(1+($form['marge']->getData()/100));
                }
                }
               
                $tarif1->setArrangement($arrangement->getArrangement());
                $tarif1->setChambre($chambreT->getChambre());
                $tarif1->setHotel($hotel);
                $tarif1->setOccupant($occupant1);
                $tarif1->setPrix($tarifCalc1);
                $tarif1->setTempsd($form['tempsd']->getData());
                $tarif1->setTempsf($form['tempsf']->getData());
                $em->persist($tarif1);
                $em->flush();
                $tarif2->setArrangement($arrangement->getArrangement());
                $tarif2->setChambre($chambreT->getChambre());
                $tarif2->setHotel($hotel);
                $tarif2->setOccupant($occupant2);
                $tarif2->setPrix($tarifCalc2);
                $tarif2->setTempsd($form['tempsd']->getData());
                $tarif2->setTempsf($form['tempsf']->getData());
                $em->persist($tarif2);
                $em->flush();
                $tarif3->setArrangement($arrangement->getArrangement());
                $tarif3->setChambre($chambreT->getChambre());
                $tarif3->setHotel($hotel);
                $tarif3->setOccupant($occupant3);
                $tarif3->setPrix($tarifCalc3);
                $tarif3->setTempsd($form['tempsd']->getData());
                $tarif3->setTempsf($form['tempsf']->getData());
                $em->persist($tarif3);
                $em->flush();
                $tarif4->setArrangement($arrangement->getArrangement());
                $tarif4->setChambre($chambreT->getChambre());
                $tarif4->setHotel($hotel);
                $tarif4->setOccupant($occupant4);
                $tarif4->setPrix($tarifCalc4);
                $tarif4->setTempsd($form['tempsd']->getData());
                $tarif4->setTempsf($form['tempsf']->getData());
                $em->persist($tarif4);
                $em->flush();
                $tarif5->setArrangement($arrangement->getArrangement());
                $tarif5->setChambre($chambreT->getChambre());
                $tarif5->setHotel($hotel);
                $tarif5->setOccupant($occupant5);
                $tarif5->setPrix($tarifCalc5);
                $tarif5->setTempsd($form['tempsd']->getData());
                $tarif5->setTempsf($form['tempsf']->getData());
                $em->persist($tarif5);
                $em->flush();
                
            }
            
            //chambre quadruple
            if($chambreQ!=null){
                
                $tarif1=new Tarif(); 
                $tarif2=new Tarif(); 
                $tarif3=new Tarif(); 
                $tarif4=new Tarif(); 
                $tarif5=new Tarif(); 
                $tarif6=new Tarif(); 
                foreach($libArr as $key2=>$arr){
                if($key1==$key2){
                $tarifCalc1 = ($form[$arr]->getData()+$form['tarifBase']->getData())*(1+($form['marge']->getData()/100));
                $tarifCalc2 = (($form[$arr]->getData()+$form['tarifBase']->getData())*(1-($form['reduc1']->getData()/100)))*(1+($form['marge']->getData()/100));
                $tarifCalc3 = (($form['tarifBase']->getData()*(1-($form['reduc4']->getData()/100)))+$form[$arr]->getData())*(1+($form['marge']->getData()/100));
                $tarifCalc4 = (($form[$arr]->getData()+$form['tarifBase']->getData())*(1-($form['reduc2']->getData()/100)))*(1+($form['marge']->getData()/100));
                $tarifCalc5 = (($form[$arr]->getData()+$form['tarifBase']->getData())*(1-($form['reduc3']->getData()/100)))*(1+($form['marge']->getData()/100));
                $tarifCalc6 = (($form['tarifBase']->getData()*(1-($form['reduc5']->getData()/100)))+$form[$arr]->getData())*(1+($form['marge']->getData()/100));
                
                }
                }
                $tarif1->setArrangement($arrangement->getArrangement());
                $tarif1->setChambre($chambreQ->getChambre());
                $tarif1->setHotel($hotel);
                $tarif1->setOccupant($occupant1);
                $tarif1->setPrix($tarifCalc1);
                $tarif1->setTempsd($form['tempsd']->getData());
                $tarif1->setTempsf($form['tempsf']->getData());
                $em->persist($tarif1);
                $em->flush();
                $tarif2->setArrangement($arrangement->getArrangement());
                $tarif2->setChambre($chambreQ->getChambre());
                $tarif2->setHotel($hotel);
                $tarif2->setOccupant($occupant2);
                $tarif2->setPrix($tarifCalc2);
                $tarif2->setTempsd($form['tempsd']->getData());
                $tarif2->setTempsf($form['tempsf']->getData());
                $em->persist($tarif2);
                $em->flush();
                $tarif3->setArrangement($arrangement->getArrangement());
                $tarif3->setChambre($chambreQ->getChambre());
                $tarif3->setHotel($hotel);
                $tarif3->setOccupant($occupant3);
                $tarif3->setPrix($tarifCalc3);
                $tarif3->setTempsd($form['tempsd']->getData());
                $tarif3->setTempsf($form['tempsf']->getData());
                $em->persist($tarif3);
                $em->flush();
                $tarif4->setArrangement($arrangement->getArrangement());
                $tarif4->setChambre($chambreQ->getChambre());
                $tarif4->setHotel($hotel);
                $tarif4->setOccupant($occupant4);
                $tarif4->setPrix($tarifCalc4);
                $tarif4->setTempsd($form['tempsd']->getData());
                $tarif4->setTempsf($form['tempsf']->getData());
                $em->persist($tarif4);
                $em->flush();
                $tarif5->setArrangement($arrangement->getArrangement());
                $tarif5->setChambre($chambreQ->getChambre());
                $tarif5->setHotel($hotel);
                $tarif5->setOccupant($occupant5);
                $tarif5->setPrix($tarifCalc5);
                $tarif5->setTempsd($form['tempsd']->getData());
                $tarif5->setTempsf($form['tempsf']->getData());
                $em->persist($tarif5);
                $em->flush();
                $tarif6->setArrangement($arrangement->getArrangement());
                $tarif6->setChambre($chambreQ->getChambre());
                $tarif6->setHotel($hotel);
                $tarif6->setOccupant($occupant6);
                $tarif6->setPrix($tarifCalc6);
                $tarif6->setTempsd($form['tempsd']->getData());
                $tarif6->setTempsf($form['tempsf']->getData());
                $em->persist($tarif6);
                $em->flush();
            }
            }
                $this->get('session')->getFlashBag()->add(
                'info', 'Tarif Bien modifiée'
                );
                     return $this->redirect($this->generateUrl('pre_listtarif_hotel'));
            
        }

        return $this->render('HotelBundle:Hotels:edittarifperiodhotel.html.twig', array('form' => $editForm->createView(),'entity' => $detailshotel));
    }

    public function deleteTarifAction($id) {
        $em = $this->getDoctrine()->getManager();
        $detailsHotel = $this->getDoctrine()->getRepository('HotelBundle:DetailsHotel')->find($id);        
        $tarifs = $this->getDoctrine()->getRepository('HotelBundle:Tarif')->findBy(array("hotel"=>$detailsHotel->getHotel()->getId(),"tempsd"=>$detailsHotel->getTempsd(),"tempsf"=>$detailsHotel->getTempsf()));
        foreach ($tarifs as $tarif) {
            $em->remove($tarif);
        }
        $em->remove($detailsHotel);
        $em->flush();
        $this->get('session')->getFlashBag()->add(
                'info', 'Tarif supprimé'
        );
        
        return $this->redirect($this->generateUrl('list_tarif_hotel'));
    }

}
