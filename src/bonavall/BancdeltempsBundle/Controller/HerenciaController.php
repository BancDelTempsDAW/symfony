<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Herencia;
use bonavall\BancdeltempsBundle\Form\HerenciaType;

/**
 * Herencia controller.
 *
 * @Route("/herencia")
 */
class HerenciaController extends Controller
{

    /**
     * Lists all Herencia entities.
     *
     * @Route("/", name="herencia")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('bonavallBancdeltempsBundle:Herencia')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Herencia entity.
     *
     * @Route("/", name="herencia_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:Herencia:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Herencia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('herencia_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Herencia entity.
    *
    * @param Herencia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Herencia $entity)
    {
        $form = $this->createForm(new HerenciaType(), $entity, array(
            'action' => $this->generateUrl('herencia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Herencia entity.
     *
     * @Route("/new", name="herencia_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Herencia();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Herencia entity.
     *
     * @Route("/{id}", name="herencia_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Herencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Herencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Herencia entity.
     *
     * @Route("/{id}/edit", name="herencia_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Herencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Herencia entity.');
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
    * Creates a form to edit a Herencia entity.
    *
    * @param Herencia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Herencia $entity)
    {
        $form = $this->createForm(new HerenciaType(), $entity, array(
            'action' => $this->generateUrl('herencia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Herencia entity.
     *
     * @Route("/{id}", name="herencia_update")
     * @Method("PUT")
     * @Template("bonavallBancdeltempsBundle:Herencia:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Herencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Herencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('herencia_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Herencia entity.
     *
     * @Route("/{id}", name="herencia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('bonavallBancdeltempsBundle:Herencia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Herencia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('herencia'));
    }

    /**
     * Creates a form to delete a Herencia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('herencia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
