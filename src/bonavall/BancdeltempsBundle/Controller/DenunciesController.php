<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Denuncies;
use bonavall\BancdeltempsBundle\Form\DenunciesType;

/**
 * Denuncies controller.
 *
 * @Route("/admin/denuncies")
 */
class DenunciesController extends Controller
{

    /**
     * Lists all Denuncies entities.
     *
     * @Route("/", name="admin_denuncies")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('bonavallBancdeltempsBundle:Denuncies')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Denuncies entity.
     *
     * @Route("/", name="admin_denuncies_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:Denuncies:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Denuncies();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_denuncies_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Denuncies entity.
    *
    * @param Denuncies $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Denuncies $entity)
    {
        $form = $this->createForm(new DenunciesType(), $entity, array(
            'action' => $this->generateUrl('admin_denuncies_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Denuncies entity.
     *
     * @Route("/new", name="admin_denuncies_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Denuncies();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Denuncies entity.
     *
     * @Route("/{id}", name="admin_denuncies_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Denuncies')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Denuncies entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Denuncies entity.
     *
     * @Route("/{id}/edit", name="admin_denuncies_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Denuncies')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Denuncies entity.');
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
    * Creates a form to edit a Denuncies entity.
    *
    * @param Denuncies $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Denuncies $entity)
    {
        $form = $this->createForm(new DenunciesType(), $entity, array(
            'action' => $this->generateUrl('admin_denuncies_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Denuncies entity.
     *
     * @Route("/{id}", name="admin_denuncies_update")
     * @Method("PUT")
     * @Template("bonavallBancdeltempsBundle:Denuncies:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Denuncies')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Denuncies entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_denuncies_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Denuncies entity.
     *
     * @Route("/{id}", name="admin_denuncies_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('bonavallBancdeltempsBundle:Denuncies')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Denuncies entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_denuncies'));
    }

    /**
     * Creates a form to delete a Denuncies entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_denuncies_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
