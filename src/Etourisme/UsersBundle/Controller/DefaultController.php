<?php

namespace Etourisme\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        
        
        return $this->render('UsersBundle:Default:index.html.twig');
    }
    
     public function newAction() {
        return $this->redirect($this->generateUrl('fos_user_registration_register'));
    }
}
