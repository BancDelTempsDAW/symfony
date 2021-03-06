<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('bonavallBancdeltempsBundle:Default:index.html.twig', array());
    }

    public function iniciAction() {
        return $this->render('bonavallBancdeltempsBundle:Default:inici.html.twig', array());
    }

    public function userAction() {
        return $this->render('bonavallBancdeltempsBundle:Default:user.html.twig', array());
    }
    
    public function adminAction() {
        return $this->render('bonavallBancdeltempsBundle:Admin:admin.html.twig', array());
    }

    public function altaAction() {
        return $this->render('bonavallBancdeltempsBundle:Default:alta.html.twig', array());
    }

}
