<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Usuari;
//use bonavall\BancdeltempsBundle\Form\UsuariType;
use Symfony\Component\HttpFoundation\Response;

class UsuariPerfilController extends Controller {

    /**
     * Return a ajax response
     */
    public function perfilAction(Request $request) {

        if ($request->isXmlHttpRequest()) {

            $em = $this->getDoctrine()->getManager();
            $userId = $this->get('security.context')->getToken()->getUser()->getId();
            $usuari = $em->getRepository('bonavallBancdeltempsBundle:Usuari')->findOneById($userId);

            if (is_object($usuari)) {
                
                $usuari->setPassword($request->request->get('password'));
                $usuari->setNom($request->request->get('nom'));
                $usuari->setCognom($request->request->get('cognom'));
                $usuari->setAdreca($request->request->get('adreca'));
                $usuari->setTelefon($request->request->get('telefon'));
                $usuari->setEmail($request->request->get('email'));
                $usuari->setPresentacio($request->request->get('presentacio'));

                $em = $this->getDoctrine()->getManager();
                $em->persist($usuari);
                $em->flush();

                //$request = $this->get('request');
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
            return $this->render('bonavallBancdeltempsBundle:user:perfil.html.twig', array('aaa' => $request));
        }
    }

    public function baixaAction() {
        return $this->render('bonavallBancdeltempsBundle:user:baixaPerfil.html.twig', array());
    }

}
