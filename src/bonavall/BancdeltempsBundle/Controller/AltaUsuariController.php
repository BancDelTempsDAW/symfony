<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Bancdeltemps;
use bonavall\BancdeltempsBundle\Form\BancdeltempsType;


class AltausuariController extends Controller
{
    public function registreAction()
    {
        return $this->render('bonavallBancdeltempsBundle:Usuari:altaUsuari.html.twig', array());
    }
}