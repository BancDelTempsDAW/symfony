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

    /**
     * Return a ajax response
     */
    public function perfilAction(Request $request) {

        #http://symfony2forum.org/threads/5-Using-Symfony2-jQuery-and-Ajax
        
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $usuari = $em->getRepository('bonavallBancdeltempsBundle:Usuari')->findOneById(5);
            if (is_object($usuari)) {
                
//                $user = new Usuari();
//                $user->setPassword(1234);
//                $user->setNom("Ricard");
//                $user->setCognom("asdf");
//                $user->setAdreca("C/adsf");
//                $user->setTelefon(682155466);
//                $user->setEmail("asdf@asdf.com");
//                $user->setPresentacio("asdfadsf");
//
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($user);
//                $em->flush();
                
                $request = $this->get('request');
                $return = array(
                    'responseCode' => 200,
                );
            } else {
                $return = array(
                    'responseCode' => 400,
                );
            }
            return new Response(json_encode($return), $return['responseCode']);
        } else {
            return $this->render('bonavallBancdeltempsBundle:user:perfil.html.twig', array());
        }
    }

    public function baixaAction() {
        return $this->render('bonavallBancdeltempsBundle:user:baixaPerfil.html.twig', array());
    }

}
