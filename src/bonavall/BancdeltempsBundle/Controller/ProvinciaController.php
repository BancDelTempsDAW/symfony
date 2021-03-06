<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Provincia;
use bonavall\BancdeltempsBundle\Form\ProvinciaType;

/**
 * Provincia controller.
 *
 * @Route("/admin/provincia")
 */
class ProvinciaController extends Controller
{

    /**
     * Lists all Provincia entities.
     *
     * @Route("/", name="admin_provincia")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('bonavallBancdeltempsBundle:Provincia')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Provincia entity.
     *
     * @Route("/", name="admin_provincia_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:Provincia:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Provincia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_provincia_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Provincia entity.
    *
    * @param Provincia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Provincia $entity)
    {
        $form = $this->createForm(new ProvinciaType(), $entity, array(
            'action' => $this->generateUrl('admin_provincia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Provincia entity.
     *
     * @Route("/new", name="admin_provincia_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Provincia();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Provincia entity.
     *
     * @Route("/{id}", name="admin_provincia_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Provincia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Provincia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Provincia entity.
     *
     * @Route("/{id}/edit", name="admin_provincia_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Provincia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Provincia entity.');
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
    * Creates a form to edit a Provincia entity.
    *
    * @param Provincia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Provincia $entity)
    {
        $form = $this->createForm(new ProvinciaType(), $entity, array(
            'action' => $this->generateUrl('admin_provincia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Provincia entity.
     *
     * @Route("/{id}", name="admin_provincia_update")
     * @Method("PUT")
     * @Template("bonavallBancdeltempsBundle:Provincia:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Provincia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Provincia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_provincia_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Provincia entity.
     *
     * @Route("/{id}", name="admin_provincia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('bonavallBancdeltempsBundle:Provincia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Provincia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_provincia'));
    }

    /**
     * Creates a form to delete a Provincia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_provincia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
