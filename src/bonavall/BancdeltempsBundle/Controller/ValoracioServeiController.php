<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\ValoracioServei;
use bonavall\BancdeltempsBundle\Form\ValoracioServeiType;

/**
 * ValoracioServei controller.
 *
 * @Route("/admin/valoracioservei")
 */
class ValoracioServeiController extends Controller
{

    /**
     * Lists all ValoracioServei entities.
     *
     * @Route("/", name="admin_valoracioservei")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('bonavallBancdeltempsBundle:ValoracioServei')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ValoracioServei entity.
     *
     * @Route("/", name="admin_valoracioservei_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:ValoracioServei:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ValoracioServei();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_valoracioservei_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ValoracioServei entity.
    *
    * @param ValoracioServei $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ValoracioServei $entity)
    {
        $form = $this->createForm(new ValoracioServeiType(), $entity, array(
            'action' => $this->generateUrl('admin_valoracioservei_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ValoracioServei entity.
     *
     * @Route("/new", name="admin_valoracioservei_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ValoracioServei();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ValoracioServei entity.
     *
     * @Route("/{id}", name="admin_valoracioservei_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:ValoracioServei')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ValoracioServei entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ValoracioServei entity.
     *
     * @Route("/{id}/edit", name="admin_valoracioservei_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:ValoracioServei')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ValoracioServei entity.');
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
    * Creates a form to edit a ValoracioServei entity.
    *
    * @param ValoracioServei $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ValoracioServei $entity)
    {
        $form = $this->createForm(new ValoracioServeiType(), $entity, array(
            'action' => $this->generateUrl('admin_valoracioservei_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ValoracioServei entity.
     *
     * @Route("/{id}", name="admin_valoracioservei_update")
     * @Method("PUT")
     * @Template("bonavallBancdeltempsBundle:ValoracioServei:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:ValoracioServei')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ValoracioServei entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_valoracioservei_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ValoracioServei entity.
     *
     * @Route("/{id}", name="admin_valoracioservei_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('bonavallBancdeltempsBundle:ValoracioServei')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ValoracioServei entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_valoracioservei'));
    }

    /**
     * Creates a form to delete a ValoracioServei entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_valoracioservei_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
