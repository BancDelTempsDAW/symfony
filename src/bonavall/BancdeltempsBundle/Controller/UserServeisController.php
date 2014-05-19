<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Serveis;
use bonavall\BancdeltempsBundle\Form\ServeisType;

/**
 * Serveis controller.
 *
 * @Route("/user/serveis")
 */
class UserServeisController extends Controller
{

    /**
     * Lists all Serveis entities.
     *
     * @Route("/", name="user_serveis")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->findAll();
        $solicituts = $em->getRepository('bonavallBancdeltempsBundle:Solicituts')->findAll();

        return array(
            'entities' => $entities,
            'solicituts' => $solicituts,
        );
    }
    /**
     * Creates a new Serveis entity.
     *
     * @Route("/", name="user_serveis_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:Serveis:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Serveis();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_serveis_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Serveis entity.
    *
    * @param Serveis $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Serveis $entity)
    {
        $form = $this->createForm(new ServeisType(), $entity, array(
            'action' => $this->generateUrl('user_serveis_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crea server'));

        return $form;
    }

    /**
     * Displays a form to create a new Serveis entity.
     *
     * @Route("/new", name="user_serveis_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Serveis();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Serveis entity.
     *
     * @Route("/{id}", name="user_serveis_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Serveis entity.');
        }

        $solicitaForm = $this->createSolicitaForm($id);

        return array(
            'entity'      => $entity,
            'solicita_form' => $solicitaForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Serveis entity.
     *
     * @Route("/{id}/edit", name="user_serveis_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Serveis entity.');
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
    * Creates a form to edit a Serveis entity.
    *
    * @param Serveis $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Serveis $entity)
    {
        $form = $this->createForm(new ServeisType(), $entity, array(
            'action' => $this->generateUrl('user_serveis_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Serveis entity.
     *
     * @Route("/{id}", name="user_serveis_update")
     * @Method("PUT")
     * @Template("bonavallBancdeltempsBundle:Serveis:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Serveis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('user_serveis_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Serveis entity.
     *
     * @Route("/{id}", name="user_serveis_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Serveis entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user_serveis'));
    }

    /**
     * Creates a form to delete a Serveis entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_serveis_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    private function createSolicitaForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_missatges_solicita', array('id' => $id)))
            ->setMethod('POST')
            ->add('submit', 'submit', array('label' => 'Solicitar'))
            ->getForm()
        ;
    }
    
    private function solicitaAction($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_missatges_solicita', array('id' => $id)))
            ->setMethod('POST')
            ->add('submit', 'submit', array('label' => 'Solicitar'))
            ->getForm()
        ;
    }
}
