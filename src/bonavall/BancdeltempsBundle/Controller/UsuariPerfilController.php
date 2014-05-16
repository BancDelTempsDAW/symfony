<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Usuari;
use bonavall\BancdeltempsBundle\Form\UsuariType;

/**
 * Usuari controller.
 *
 * @Route("/usuari")
 */
class UsuariPerfilController extends Controller
{

    /**
     * Lists all Usuari entities.
     *
     * @Route("/", name="usuari")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('bonavallBancdeltempsBundle:Usuari')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    public function perfilAction() {
        return $this->render('bonavallBancdeltempsBundle:user:Perfil.html.twig', array());
    }

    public function baixaAction() {
        return $this->render('bonavallBancdeltempsBundle:user:baixaPerfil.html.twig', array());
    }
    
    public function checkAction($id){
        
        $request = $this->getRequest();

        if ($request->isXmlHttpRequest()) {
        
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('bonavallBancdeltempsBundle:Usuari')->find($id);

            return $this->render('bonavallBancdeltempsBundle:user:Perfil.html.twig', array(
                'entity' => $entity
            ));
        }
    }
}
