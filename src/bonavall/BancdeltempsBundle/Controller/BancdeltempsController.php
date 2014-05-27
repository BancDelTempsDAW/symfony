<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Bancdeltemps;
use bonavall\BancdeltempsBundle\Form\BancdeltempsType;

/**
 * Bancdeltemps controller.
 *
 * @Route("/Admin/bancdeltemps")
 */
class BancdeltempsController extends Controller
{

    /**
     * Lists all Bancdeltemps entities.
     *
     * @Route("/", name="Admin_bancdeltemps")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('bonavallBancdeltempsBundle:Bancdeltemps')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Bancdeltemps entity.
     *
     * @Route("/", name="Admin_bancdeltemps_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:Bancdeltemps:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Bancdeltemps();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Admin_bancdeltemps_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Bancdeltemps entity.
    *
    * @param Bancdeltemps $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Bancdeltemps $entity)
    {
        $form = $this->createForm(new BancdeltempsType(), $entity, array(
            'action' => $this->generateUrl('Admin_bancdeltemps_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Bancdeltemps entity.
     *
     * @Route("/new", name="Admin_bancdeltemps_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Bancdeltemps();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Bancdeltemps entity.
     *
     * @Route("/{id}", name="Admin_bancdeltemps_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Bancdeltemps')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bancdeltemps entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Bancdeltemps entity.
     *
     * @Route("/{id}/edit", name="Admin_bancdeltemps_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Bancdeltemps')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bancdeltemps entity.');
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
    * Creates a form to edit a Bancdeltemps entity.
    *
    * @param Bancdeltemps $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Bancdeltemps $entity)
    {
        $form = $this->createForm(new BancdeltempsType(), $entity, array(
            'action' => $this->generateUrl('Admin_bancdeltemps_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Bancdeltemps entity.
     *
     * @Route("/{id}", name="Admin_bancdeltemps_update")
     * @Method("PUT")
     * @Template("bonavallBancdeltempsBundle:Bancdeltemps:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Bancdeltemps')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bancdeltemps entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Admin_bancdeltemps_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Bancdeltemps entity.
     *
     * @Route("/{id}", name="Admin_bancdeltemps_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('bonavallBancdeltempsBundle:Bancdeltemps')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Bancdeltemps entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Admin_bancdeltemps'));
    }

    /**
     * Creates a form to delete a Bancdeltemps entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Admin_bancdeltemps_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
