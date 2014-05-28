<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Missatges;
use bonavall\BancdeltempsBundle\Entity\Solicituts;
use bonavall\BancdeltempsBundle\Form\UserMissatgesType;

/**
 * Missatges controller.
 *
 * @Route("/user/missatges")
 */
class UserMissatgesController extends Controller {

    /**
     * Lists all Missatges entities.
     *
     * @Route("/", name="user_missatges")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('bonavallBancdeltempsBundle:Missatges')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Missatges entity.
     *
     * @Route("/", name="user_missatges_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:UserMissatges:new.html.twig")
     */
    public function createAction(Request $request, $id) {
        
        $entity2 = new Missatges();
        $entity2->setAutor($this->getUser());
        $form = $this->createCreateForm($entity2, $id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            /* Primer creem la solicitut */
            $em = $this->getDoctrine()->getManager();
            $serv = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->find($id);


            
            $estat = $em->getRepository('bonavallBancdeltempsBundle:EstatServei')->findOneBy(array('id' => 4));
           // $entity2 ->setEstatsolicitut($estat);

            $em3 = $this->getDoctrine()->getEntityManager();


            if (!$serv) {
                throw $this->createNotFoundException('Unable to find Serveis entity.');
            }
            $entity = new Solicituts();
            $entity->setSolicitant($this->getUser());
            $entity->setServeiSolicitat($serv);
            $entity->setEstatsolicitut($estat);
            $em3->persist($entity);
            $em3->flush();
            sleep(1);
            /* Fi de la creació de la solicitut */
            $em8 = $this->getDoctrine()->getManager();
            $sol = $em->getRepository('bonavallBancdeltempsBundle:Solicituts')->find($entity->getId());
            $entity2->setSolicituts($sol);
            $em4 = $this->getDoctrine()->getManager();
            $em4->persist($entity2);
            $em4->flush();

            return $this->redirect($this->generateUrl('user_missatges_show', array('id' => $entity2->getId())));
        }

        return array(
            'entity' => $entity2,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Missatges entity.
     *
     * @param Missatges $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Missatges $entity, $id) {
        
        $form = $this->createForm(new UserMissatgesType(), $entity, array(
            'action' => $this->generateUrl('user_missatges_create', array('id' => $id)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Missatges entity.
     *
     * @Route("/{id}/new", name="user_missatges_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id) {

        $entity2 = new Missatges();
        $entity2->setAutor($this->getUser());
        $form = $this->createCreateForm($entity2, $id);

        return array(
            'entity' => $entity2,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Missatges entity.
     *
     * @Route("/{id}", name="user_missatges_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Missatges')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Missatges entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Missatges entity.
     *
     * @Route("/{id}/edit", name="user_missatges_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Missatges')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Missatges entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a Missatges entity.
     *
     * @param Missatges $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Missatges $entity) {
        $form = $this->createForm(new UserMissatgesType(), $entity, array(
            'action' => $this->generateUrl('user_missatges_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Missatges entity.
     *
     * @Route("/{id}", name="user_missatges_update")
     * @Method("PUT")
     * @Template("bonavallBancdeltempsBundle:Missatges:edit.html.twig")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Missatges')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Missatges entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('user_missatges_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Missatges entity.
     *
     * @Route("/{id}", name="user_missatges_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('bonavallBancdeltempsBundle:Missatges')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Missatges entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user_missatges'));
    }

    /**
     * Creates a form to delete a Missatges entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('user_missatges_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}
