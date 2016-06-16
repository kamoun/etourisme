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

class DefaultController extends Controller {

    public function indexAction() {
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
            $this->get('session')->getFlashBag()->add(
                    'info', 'Hôtel ajouté'
            );
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
        $hotels = $this->getDoctrine()->getRepository('HotelBundle:Hotel')->findAll();
        return $this->render('HotelBundle:Hotels:listHotels.html.twig', array('hotels' => $hotels));
    }

    private static function delTree($dir) {
        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
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

    public function deleteHotelAction($id) {
        $em = $this->getDoctrine()->getManager();
        $hotel = $this->getDoctrine()->getRepository('HotelBundle:Hotel')->find($id);
        if (is_dir('images/hotel_tun/' . $hotel->getId())) {
            $this->rmdir_recursive('images/hotel_tun/' . $hotel->getId());
        }
        $em->remove($hotel);
        $em->flush();

        $this->get('session')->getFlashBag()->add(
                'info', 'Hotêl supprimé'
        );
        //$dir = 'images/hotel_tun/' . $hotel->getId();
        //rmdir('images/hotel_tun/'.$hotel->getId());
        //self::delTree($dir);
        return $this->redirect($this->generateUrl('list_hotels'));
    }

    public function addCategorieAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $categorie = new Categorie();
        $categorie->setLibelle($_POST['categorie']);
        $em->persist($categorie);
        $em->flush();
        return new JsonResponse(array($categorie->getId(), $_POST['categorie']), 200);
    }

    public function deleteCategorieAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $categorie = $this->getDoctrine()->getRepository('HotelBundle:Categorie')->find($_POST['categorie']);
        $em->remove($categorie);
        $em->flush();
        return new JsonResponse($_POST['categorie'], 200);
    }

    public function addVilleAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $ville = new Ville();
        $ville->setLibelle($_POST['ville']);

        $em->persist($ville);
        $em->flush();
        return new JsonResponse(array($ville->getId(), $_POST['ville']), 200);
    }

    public function deleteVilleAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $ville = $this->getDoctrine()->getRepository('HotelBundle:Ville')->find($_POST['ville']);
        $em->remove($ville);
        $em->flush();
        return new JsonResponse($_POST['ville'], 200);
    }

    public function editHotelAction($id) {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('HotelBundle:Hotel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Impossible de trouver Ce Hôtel');
        }
        $editForm = $this->createEditHotelForm($entity);

        return $this->render('HotelBundle:Hotels:editHotel.html.twig', array(
                    'entity' => $entity,
                    'form' => $editForm->createView(),
        ));
    }

    /**
     * Creation Formulaire d Edition Employé
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditHotelForm(Hotel $entity) {
        $form = $this->createForm(HotelEditType::class, $entity, array(
            'action' => $this->generateUrl('update_hotel', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }

    /**
     * Edits an existing SarraCardUser entity.
     *
     */
    public function updateHotelAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('HotelBundle:Hotel')->find($id);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hotel entity.');
        }
        $editForm = $this->createForm(HotelEditType::class, $entity);
        $editForm->handleRequest($request);
        if ($editForm->isValid()) {
            //$file = $editForm['images'];
            foreach ($editForm['imagess']->getData() as $file) {
                $entity->addImage($file);
            }
            $em->flush();
            $this->get('session')->getFlashBag()->add(
                    'info', 'Hôtel modifié'
            );
            return $this->redirect($this->generateUrl('list_hotels'));
        }
        return $this->render('HotelBundle:Hotels:editHotel.html.twig', array(
                    'entity' => $entity,
                    'form' => $editForm->createView(),
        ));
    }

    public function deletePictureAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $picture = $this->getDoctrine()->getRepository('HotelBundle:Image')->find($_POST['id']);
        $id=$picture->getId();
        $url=$picture->getUrl();
        $entity = $picture->getHotelimages();
        $entity->removeImage($picture);
        $em->remove($picture);

        $em->flush();

        if (file_exists('images/hotel_tun/' . $entity->getId() . '/' . $id . '.' .$url)) {
            unlink('images/hotel_tun/' . $entity->getId() . '/' . $id . '.' . $url);
        }

        return new JsonResponse($_POST['id'], 200);
    }

    public function addDetailsHotelAction(Request $request) {

        $form = $this->createFormBuilder()
                ->add('hotel', EntityType::class, array('label' => 'Nom d`hôtel (*)', 'class' => 'HotelBundle:Hotel', 'expanded' => false, 'required' => true, 'mapped' => false,
                    'placeholder' => 'Sélectionner l`hôtel...',))
                ->add('ville', null, array('label' => 'Ville (*)', 'mapped' => false, 'disabled' => true))
                ->add('chambre', EntityType::class, array('label' => 'Chambre', 'class' => 'HotelBundle:Chambre', 'expanded' => true, 'multiple' => true, 'required' => false, 'mapped' => false, 'attr' => array('class' => 'minimal')
                ))
                ->add('reduction', EntityType::class, array('label' => 'Reduction', 'class' => 'HotelBundle:Reduction', 'expanded' => true, 'multiple' => true, 'required' => false, 'mapped' => false, 'attr' => array('class' => 'minimal')
                ))
                ->add('arrangement', EntityType::class, array('label' => 'Arrangement', 'class' => 'HotelBundle:Arrangement', 'expanded' => false, 'multiple' => true, 'required' => false, 'mapped' => false, 'attr' => array('class' => 'minimal')
                ))
                ->add('themes', EntityType::class, array('label' => 'Theme', 'class' => 'HotelBundle:Theme', 'expanded' => false, 'multiple' => true, 'required' => false, 'mapped' => false, 'attr' => array('class' => 'minimal')
                ))
                ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $hotel = $this->getDoctrine()->getRepository('HotelBundle:Hotel')->find($form['hotel']->getData());

            $detailschambre = $this->getDoctrine()->getRepository('HotelBundle:DetailsChambre')->findByHotel($hotel->getId());
            foreach ($detailschambre as $detailchambre) {
                $em->remove($detailchambre);
                $em->flush();
            }
            $detailsreduction = $this->getDoctrine()->getRepository('HotelBundle:DetailsReduction')->findByHotel($hotel->getId());
            foreach ($detailsreduction as $detailreduction) {
                $em->remove($detailreduction);
                $em->flush();
            }
            $detailsarrangement = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findByHotel($hotel->getId());
            foreach ($detailsarrangement as $detailarrangement) {
                $em->remove($detailarrangement);
                $em->flush();
            }
            $detailstheme = $this->getDoctrine()->getRepository('HotelBundle:DetailsTheme')->findByHotel($hotel->getId());
            foreach ($detailstheme as $detailtheme) {
                $em->remove($detailtheme);
                $em->flush();
            }
            //delete tarif
            $tarifs = $this->getDoctrine()->getRepository('HotelBundle:Tarif')->findByHotel($hotel->getId());
            foreach ($tarifs as $tarif) {
                $em->remove($tarif);
                $em->flush();
            }
            
            foreach ($form['chambre']->getData() as $id) {
                $chambre = $this->getDoctrine()->getRepository('HotelBundle:Chambre')->find($id);


                $detailschambre = new DetailsChambre();
                $detailschambre->setChambre($chambre);
                $detailschambre->setHotel($hotel);
                $em->persist($detailschambre);
                $em->flush();
            }

            foreach ($form['reduction']->getData() as $id) {
                $reduction = $this->getDoctrine()->getRepository('HotelBundle:Reduction')->find($id);
                $detailsreduction = new DetailsReduction();
                $detailsreduction->setReduction($reduction);
                $detailsreduction->setHotel($hotel);
                $em->persist($detailsreduction);
                $em->flush();
            }
            foreach ($form['themes']->getData() as $id) {
                $theme = $this->getDoctrine()->getRepository('HotelBundle:Theme')->find($id);
                $detailstheme = new DetailsTheme();
                $detailstheme->setHotel($hotel);
                $detailstheme->setTheme($theme);
                $em->persist($detailstheme);
                $em->flush();
            }

            foreach ($form['arrangement']->getData() as $id) {
                $arrangement = $this->getDoctrine()->getRepository('HotelBundle:Arrangement')->find($id);
                $detailsarrangement = new DetailsArrangement();
                $detailsarrangement->setHotel($hotel);
                $detailsarrangement->setArrangement($arrangement);
                $em->persist($detailsarrangement);
                $em->flush();
            }
            $this->get('session')->getFlashBag()->add(
                'info', 'Détails Hotêl modifié'
            );
            return $this->redirect($this->generateUrl('add_details_hotel'));
            
             
        }
        return $this->render('HotelBundle:Hotels:detailsHotel.html.twig', array('form' => $form->createView()));
    }

    public function getVilleByHotelAction() {

        $em = $this->getDoctrine()->getManager();
        $hotel = $this->getDoctrine()->getRepository('HotelBundle:Hotel')->find($_POST['hotel']);
        $chambres = $this->getDoctrine()->getRepository('HotelBundle:DetailsChambre')->findByHotel($_POST['hotel']);
        $reductions = $this->getDoctrine()->getRepository('HotelBundle:DetailsReduction')->findByHotel($_POST['hotel']);
        $arrangements = $this->getDoctrine()->getRepository('HotelBundle:DetailsArrangement')->findByHotel($_POST['hotel']);
        $themes = $this->getDoctrine()->getRepository('HotelBundle:DetailsTheme')->findByHotel($_POST['hotel']);


        $idChambre = array();
        foreach ($chambres as $chambre) {
            array_push($idChambre, $chambre->getChambre()->getId());
        }
        $idReduction = array();
        foreach ($reductions as $reduction) {
            array_push($idReduction, $reduction->getReduction()->getId());
        }
        $idArrangement = array();
        foreach ($arrangements as $arrangement) {
            array_push($idArrangement, $arrangement->getArrangement()->getId());
        }
        $idTheme = array();
        foreach ($themes as $theme) {
            array_push($idTheme, $theme->getTheme()->getId());
        }



        return new JsonResponse(array($hotel->getVille()->getLibelle(), $idChambre, $idReduction, $idArrangement, $idTheme), 200);
    }

}
