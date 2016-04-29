<?php

namespace Etourisme\HotelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Etourisme\HotelBundle\Entity\Hotel;
use Etourisme\HotelBundle\Entity\Ville;
use Etourisme\HotelBundle\Entity\Categorie;
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
        $hotels = $this->getDoctrine()->getRepository('HotelBundle:Hotel')->findAll();
        return $this->render('HotelBundle:Hotels:listHotels.html.twig', array('hotels' => $hotels));
    }
    
    public function editHotelAction($id) {
        if (true === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UsersBundle:Utilisateur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Impossible de trouver Cet Utilisateur');
            }
            $editForm = $this->createEditForm($entity);

            return $this->render('UsersBundle:Users:editUser.html.twig', array(
                        'entity' => $entity,
                        'form' => $editForm->createView(),
            ));
        } else {
            throw new AccessDeniedException();
        }
    }
    
    
     public function deleteHotelAction($id) {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository('UsersBundle:Utilisateur')->find($id);
        $users = $this->getDoctrine()->getRepository('UsersBundle:Utilisateur')->findAll();
        $em->remove($user);
        $em->flush();
        $this->get('session')->getFlashBag()->add(
                'info', 'Utilisateur supprimé!!.'
        );
        return $this->redirect($this->generateUrl('list_users'));
    }
    
    
      public function addCategorieAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $categorie = new Categorie();
        $categorie->setLibelle($_POST['categorie']);
        $em->persist($categorie);
        $em->flush();



        return new JsonResponse($_POST['categorie'], 200);
    }

    public function addVilleAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $ville = new Ville();
        $ville->setLibelle($_POST['ville']);
        
        $em->persist($ville);
        $em->flush();



        return new JsonResponse($_POST['ville'], 200);
    }
}
