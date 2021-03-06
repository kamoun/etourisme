<?php

namespace CMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CMSBundle\Entity\Banniere;
use CMSBundle\Entity\HotelAcc;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use CMSBundle\Form\BanniereType;
use CMSBundle\Form\HotelAccType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Length;


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
        $form = $this->createForm(BanniereType::class, $entity);
        $form->handleRequest($request);
        $bannieres = $this->getDoctrine()->getRepository('CMSBundle:Banniere')->findAll();
       
        return $this->render('CMSBundle:Accueil:listBannieres.html.twig', array('bannieres' => $bannieres,'entity' => $entity,
                    'form' => $form->createView()));
    }
    

    function rmdir_recursive($dir) {
        //Liste le contenu du répertoire dans un tableau
        $dir_content = scandir($dir);
        //Est-ce bien un répertoire?
        if ($dir_content !== FALSE) {
            //Pour chaque entrée du répertoire
            foreach ($dir_content as $entry) {
                //Raccourcis symboliques sous Unix, on passe
                if (!in_array($entry, array('.', '..'))) {
                    //On retrouve le chemin par rapport au début
                    $entry = $dir . '/' . $entry;
                    //Cette entrée n'est pas un dossier: on l'efface
                    if (!is_dir($entry)) {
                        unlink($entry);
                    }
                    //Cette entrée est un dossier, on recommence sur ce dossier
                    else {
                        rmdir_recursive($entry);
                    }
                }
            }
        }
        //On a bien effacé toutes les entrées du dossier, on peut à présent l'effacer
        rmdir($dir);
    }

    
     public function deleteBanniereAction($id) { 
        
        $em = $this->getDoctrine()->getManager();
        $banniere = $this->getDoctrine()->getRepository('CMSBundle:Banniere')->find($id);
        $image=$banniere->getImage();
         if (is_dir('images/banniere/' . $banniere->getId())) {
            $this->rmdir_recursive('images/banniere/' . $banniere->getId());
        }
        if($image!=null){
             $em->remove($image);
        }else{
            $em->remove($banniere);
        }
       
        $em->flush();

        $this->get('session')->getFlashBag()->add(
                'info', 'Banniere supprimé'
        );

        return $this->redirect($this->generateUrl('list_bannieres'));
    }
    
    public function etatBanniereAction(Request $request) { 
       //$editForm = $this->createEditTarifForm($detailshotel);
        if(count(@$_POST["etat"])>=0){
        $em = $this->getDoctrine()->getManager();
        $banns = $em->getRepository('CMSBundle:Banniere')->findAll(); 
       
            foreach ($banns as $bann) {
                //$bann = new Banniere();
                $bann->setEtat(0);
                $em->merge($bann);
                $em->flush();
                //array_merge($idBann, $bann->getChambre()->getId());
            }
        }    
        if(count(@$_POST["etat"])>0){
            foreach ($_POST["etat"] as $key=>$b)
            {
                $bannChecked =$this->getDoctrine()->getRepository('CMSBundle:Banniere')->find($_POST["etat"][$key]);
                $bannChecked->setEtat(1);
                $em->merge($bann);
                $em->flush();
            }		
        }
        return $this->redirect($this->generateUrl('list_bannieres'));
        
    }
    
    
    public function listHotelAccAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new HotelAcc();
        $form = $this->createForm(HotelAccType::class, $entity);
        $form->handleRequest($request);
        $hotelsacc = $this->getDoctrine()->getRepository('CMSBundle:HotelAcc')->findAll();
       
        return $this->render('CMSBundle:Accueil:listHotelAcc.html.twig', array('hotelsacc' => $hotelsacc,'entity' => $entity,
                    'form' => $form->createView()));
    }
    
   
}
