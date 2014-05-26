<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
//use Symfony\Component\Routing\RouteCollection;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
//use bonavall\BancdeltempsBundle\Entity\Usuari;
//use bonavall\BancdeltempsBundle\Form\UsuariType;
//use Symfony\Component\HttpFoundation\Response;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Usuari;
use bonavall\BancdeltempsBundle\Form\UserType;

class UsuariPerfilController extends Controller {
    
    /**
     * Displays a form to edit an existing Usuari entity.
     *
     * @Route("/{id}/edit", name="usuari_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Usuari')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuari entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    
    /**
    * Creates a form to edit a Usuari entity.
    *
    * @param Usuari $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Usuari $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('user_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    
    /**
     * Creates a form to delete a Usuari entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usuari_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
            
    /**
     * Edits an existing Usuari entity.
     *
     * @Route("/{id}", name="usuari_update")
     * @Method("PUT")
     * @Template("bonavallBancdeltempsBundle:Usuari:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Usuari')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuari entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('perfil_user', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    
    public function baixaAction() {

        $em = $this->getDoctrine()->getManager();
        $userId = $this->get('security.context')->getToken()->getUser()->getId();
        $usuari = $em->getRepository('bonavallBancdeltempsBundle:Usuari')->findOneById($userId);

        if (is_object($usuari)) {

            $usuari->setIsActive(0);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuari);
            $em->flush();
            
            $this->get('security.context')->setToken(null);
            $this->get('request')->getSession()->invalidate();
            
            return $this->render('bonavallBancdeltempsBundle:Default:index.html.twig', array());
            
        } else {

            $error = "Error al donar de baixa l'usuari";
            return $this->render('bonavallBancdeltempsBundle:user:perfil.html.twig', array('error' => $error));
        }
        //return $this->render('bonavallBancdeltempsBundle:user:baixaPerfil.html.twig', array());
    }
    
    /**
     * Return a ajax response
     */
//    public function perfilAction(Request $request) {
//
//        if ($request->isXmlHttpRequest()) {
//
//            $em = $this->getDoctrine()->getManager();
//            $userId = $this->get('security.context')->getToken()->getUser()->getId();
//            $usuari = $em->getRepository('bonavallBancdeltempsBundle:Usuari')->findOneById($userId);
//
//            if (is_object($usuari)) {
//                                
//                $usuari->setFotografia($request->request->get('fotografia'));
//                $usuari->setPassword($request->request->get('password'));
//                $usuari->setNom($request->request->get('nom'));
//                $usuari->setCognom($request->request->get('cognom'));
//                $usuari->setAdreca($request->request->get('adreca'));
//                $usuari->setTelefon($request->request->get('telefon'));
//                $usuari->setEmail($request->request->get('email'));
//                $usuari->setPresentacio($request->request->get('presentacio'));
//
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($usuari);
//                $em->flush();
//
//                //$request = $this->get('request');
//                $return = array(
//                    'responseCode' => 200,
//                );
//            } else {
//                $return = array(
//                    'responseCode' => 400,
//                );
//            }
//            return new Response(json_encode($return), $return['responseCode']);
//        } else {
//            return $this->render('bonavallBancdeltempsBundle:UsuariPerfil:perfil.html.twig', array());
//        }
//    }

}
