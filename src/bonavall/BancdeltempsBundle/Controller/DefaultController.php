<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('bonavallBancdeltempsBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function iniciAction()
    {
        return $this->render('bonavallBancdeltempsBundle:Default:inici.html.twig', array());
    }
}
