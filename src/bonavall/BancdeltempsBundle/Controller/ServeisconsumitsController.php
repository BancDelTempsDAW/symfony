<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Serveisconsumits;
use bonavall\BancdeltempsBundle\Form\ServeisconsumitsType;

/**
 * Serveisconsumits controller.
 *
 * @Route("/admin/serveisconsumits")
 */
class ServeisconsumitsController extends Controller
{

    /**
     * Lists all Serveisconsumits entities.
     *
     * @Route("/", name="admin_serveisconsumits")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('bonavallBancdeltempsBundle:Serveisconsumits')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Serveisconsumits entity.
     *
     * @Route("/", name="admin_serveisconsumits_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:Serveisconsumits:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Serveisconsumits();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_serveisconsumits_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Serveisconsumits entity.
    *
    * @param Serveisconsumits $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Serveisconsumits $entity)
    {
        $form = $this->createForm(new ServeisconsumitsType(), $entity, array(
            'action' => $this->generateUrl('admin_serveisconsumits_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Serveisconsumits entity.
     *
     * @Route("/new", name="admin_serveisconsumits_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Serveisconsumits();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Serveisconsumits entity.
     *
     * @Route("/{id}", name="admin_serveisconsumits_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Serveisconsumits')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Serveisconsumits entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Serveisconsumits entity.
     *
     * @Route("/{id}/edit", name="admin_serveisconsumits_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Serveisconsumits')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Serveisconsumits entity.');
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
    * Creates a form to edit a Serveisconsumits entity.
    *
    * @param Serveisconsumits $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Serveisconsumits $entity)
    {
        $form = $this->createForm(new ServeisconsumitsType(), $entity, array(
            'action' => $this->generateUrl('admin_serveisconsumits_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Serveisconsumits entity.
     *
     * @Route("/{id}", name="admin_serveisconsumits_update")
     * @Method("PUT")
     * @Template("bonavallBancdeltempsBundle:Serveisconsumits:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Serveisconsumits')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Serveisconsumits entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_serveisconsumits_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Serveisconsumits entity.
     *
     * @Route("/{id}", name="admin_serveisconsumits_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('bonavallBancdeltempsBundle:Serveisconsumits')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Serveisconsumits entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_serveisconsumits'));
    }

    /**
     * Creates a form to delete a Serveisconsumits entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_serveisconsumits_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
