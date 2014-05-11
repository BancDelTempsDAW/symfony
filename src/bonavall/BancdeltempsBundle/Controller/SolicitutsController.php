<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Solicituts;
use bonavall\BancdeltempsBundle\Form\SolicitutsType;

/**
 * Solicituts controller.
 *
 * @Route("/admin/solicituts")
 */
class SolicitutsController extends Controller
{

    /**
     * Lists all Solicituts entities.
     *
     * @Route("/", name="admin_solicituts")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('bonavallBancdeltempsBundle:Solicituts')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Solicituts entity.
     *
     * @Route("/", name="admin_solicituts_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:Solicituts:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Solicituts();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_solicituts_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Solicituts entity.
    *
    * @param Solicituts $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Solicituts $entity)
    {
        $form = $this->createForm(new SolicitutsType(), $entity, array(
            'action' => $this->generateUrl('admin_solicituts_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Solicituts entity.
     *
     * @Route("/new", name="admin_solicituts_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Solicituts();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Solicituts entity.
     *
     * @Route("/{id}", name="admin_solicituts_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Solicituts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Solicituts entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Solicituts entity.
     *
     * @Route("/{id}/edit", name="admin_solicituts_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Solicituts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Solicituts entity.');
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
    * Creates a form to edit a Solicituts entity.
    *
    * @param Solicituts $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Solicituts $entity)
    {
        $form = $this->createForm(new SolicitutsType(), $entity, array(
            'action' => $this->generateUrl('admin_solicituts_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Solicituts entity.
     *
     * @Route("/{id}", name="admin_solicituts_update")
     * @Method("PUT")
     * @Template("bonavallBancdeltempsBundle:Solicituts:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Solicituts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Solicituts entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_solicituts_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Solicituts entity.
     *
     * @Route("/{id}", name="admin_solicituts_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('bonavallBancdeltempsBundle:Solicituts')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Solicituts entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_solicituts'));
    }

    /**
     * Creates a form to delete a Solicituts entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_solicituts_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
