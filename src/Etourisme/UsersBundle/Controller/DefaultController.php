<?php

namespace Etourisme\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Etourisme\UsersBundle\Entity\Utilisateur;
use Etourisme\UsersBundle\Form\Type\RegistrationFormType;

class DefaultController extends Controller {

    public function indexAction() {


        return $this->render('UsersBundle:Default:index.html.twig');
    }

    public function newAction() {
        return $this->redirect($this->generateUrl('fos_user_registration_register'));
    }

    public function viewUsersAction() {

        $users = $this->getDoctrine()->getRepository('UsersBundle:Utilisateur')->findAll();
        return $this->render('UsersBundle:Users:listusers.html.twig', array('users' => $users));
    }

    public function deleteUserAction($id) {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository('UsersBundle:Utilisateur')->find($id);
        $users = $this->getDoctrine()->getRepository('UsersBundle:Utilisateur')->findAll();
        $em->remove($user);
        $em->flush();
        $this->get('session')->getFlashBag()->add(
                'info', 'Utilisateur supprimé!!.'
        );
        return $this->render('UsersBundle:Default:index.html.twig');
    }

    public function editUserAction($id) {
        if (true === $this->get('security.authorization_checker')->isGranted('ADMIN')) {
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

    /**
     * Creation Formulaire d Edition Employé
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(\Etourisme\UsersBundle\Entity\Utilisateur $entity) {
        $form = $this->createForm(RegistrationFormType::class, $entity, array(
            'action' => $this->generateUrl('update_user', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }

    /**
     * Edits an existing SarraCardUser entity.
     *
     */
    public function updateAction(Request $request, $id) {
        if (true === $this->get('security.authorization_checker')->isGranted('ADMIN')) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UsersBundle:Utilisateur')->find($id);
            //$groupe = $em->getRepository('ControleBundle:Groupe')->findByControlleur($entity);


            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }
            $editForm = $this->createForm(RegistrationFormType::class, $entity);
            $editForm->handleRequest($request);
            if ($editForm->isValid()) {

                $role = $editForm['roles']->getData();

                if ($entity->hasRole('CONTROLEUR')) {
                    $entity->removeRole('CONTROLEUR');
                } elseif ($entity->hasRole('RAMASSEUR')) {
                    $entity->removeRole('RAMASSEUR');
                } elseif ($entity->hasRole('POSE_COLLE')) {
                    $entity->removeRole('POSE_COLLE');
                } else {
                    $entity->removeRole('COLLAGE_CARTE');
                }




                $entity->addRole($role);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                        'success', 'Utilisateur modifié!!.'
                );
                return $this->redirect($this->generateUrl('list_users'));
            }
            return $this->render('UsersBundle:Users:editUser.html.twig', array(
                        'entity' => $entity,
                        'form' => $editForm->createView(),
            ));
        } else {
            throw new AccessDeniedException();
        }
    }

}
