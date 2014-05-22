<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Usuari;
use bonavall\BancdeltempsBundle\Form\UsuariType;
use Symfony\Component\HttpFoundation\Response;

class UsuariPerfilController extends Controller {

    public function perfilAction(Request $request) {
        if ($request->isXmlHttpRequest()) {
            $request = $this->get('request');
            $dades = $request->request->get('nomUsuari');
            $dades = "hola";
            /* $repository = $this->getDoctrine()
              ->getRepository('bonavallBancdeltempsBundle:Missatges'); */
            if ($dades) {
                throw $this->createNotFoundException('Unable to find Missatges entity. ' . $dades);
            }

            if ($dades == "") {//if the user has written his name
                $greeting = $dades;
                $return = array("responseCode" => 200, "greeting" => $greeting);
            } else {
                $return = array("responseCode" => 400, "greeting" => "You have to write your name!");
            }

            return $this->render('bonavallBancdeltempsBundle:UsuariPerfil:perfil.html.twig', array('missatges' => $dades));
            $return = json_encode($return); //jscon encode the array
            //return new Response($return, 200, array('Content-Type' => 'application/json'));
        }else{
            return $this->render('bonavallBancdeltempsBundle:user:perfil.html.twig', array());
        }
    }

    public function baixaAction() {
        return $this->render('bonavallBancdeltempsBundle:user:baixaPerfil.html.twig', array());
    }

    /**
     * Return a ajax response
     */
}
