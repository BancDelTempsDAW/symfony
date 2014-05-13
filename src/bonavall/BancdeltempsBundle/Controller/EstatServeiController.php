<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\EstatServei;
use bonavall\BancdeltempsBundle\Form\EstatServeiType;

/**
 * EstatServei controller.
 *
 * @Route("/admin/estatservei")
 */
class EstatServeiController extends Controller
{

    /**
     * Lists all EstatServei entities.
     *
     * @Route("/", name="admin_estatservei")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('bonavallBancdeltempsBundle:EstatServei')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new EstatServei entity.
     *
     * @Route("/", name="admin_estatservei_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:EstatServei:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EstatServei();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_estatservei_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a EstatServei entity.
    *
    * @param EstatServei $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(EstatServei $entity)
    {
        $form = $this->createForm(new EstatServeiType(), $entity, array(
            'action' => $this->generateUrl('admin_estatservei_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EstatServei entity.
     *
     * @Route("/new", name="admin_estatservei_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EstatServei();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EstatServei entity.
     *
     * @Route("/{id}", name="admin_estatservei_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:EstatServei')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstatServei entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EstatServei entity.
     *
     * @Route("/{id}/edit", name="admin_estatservei_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:EstatServei')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstatServei entity.');
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
    * Creates a form to edit a EstatServei entity.
    *
    * @param EstatServei $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EstatServei $entity)
    {
        $form = $this->createForm(new EstatServeiType(), $entity, array(
            'action' => $this->generateUrl('admin_estatservei_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EstatServei entity.
     *
     * @Route("/{id}", name="admin_estatservei_update")
     * @Method("PUT")
     * @Template("bonavallBancdeltempsBundle:EstatServei:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:EstatServei')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstatServei entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_estatservei_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a EstatServei entity.
     *
     * @Route("/{id}", name="admin_estatservei_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('bonavallBancdeltempsBundle:EstatServei')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EstatServei entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_estatservei'));
    }

    /**
     * Creates a form to delete a EstatServei entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_estatservei_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
