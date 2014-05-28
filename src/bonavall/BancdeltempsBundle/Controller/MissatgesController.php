<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Missatges;
use bonavall\BancdeltempsBundle\Form\MissatgesType;

/**
 * Missatges controller.
 *
 * @Route("/admin/missatges")
 */
class MissatgesController extends Controller
{

    /**
     * Lists all Missatges entities.
     *
     * @Route("/", name="admin_missatges")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('bonavallBancdeltempsBundle:Missatges')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Missatges entity.
     *
     * @Route("/", name="admin_missatges_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:Missatges:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Missatges();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_missatges_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Missatges entity.
    *
    * @param Missatges $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Missatges $entity)
    {
        $form = $this->createForm(new MissatgesType(), $entity, array(
            'action' => $this->generateUrl('admin_missatges_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Missatges entity.
     *
     * @Route("/new", name="admin_missatges_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Missatges();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Missatges entity.
     *
     * @Route("/{id}", name="admin_missatges_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Missatges')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Missatges entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Missatges entity.
     *
     * @Route("/{id}/edit", name="admin_missatges_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Missatges')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Missatges entity.');
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
    * Creates a form to edit a Missatges entity.
    *
    * @param Missatges $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Missatges $entity)
    {
        $form = $this->createForm(new MissatgesType(), $entity, array(
            'action' => $this->generateUrl('admin_missatges_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Missatges entity.
     *
     * @Route("/{id}", name="admin_missatges_update")
     * @Method("PUT")
     * @Template("bonavallBancdeltempsBundle:Missatges:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
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

            return $this->redirect($this->generateUrl('admin_missatges_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Missatges entity.
     *
     * @Route("/{id}", name="admin_missatges_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
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

        return $this->redirect($this->generateUrl('admin_missatges'));
    }

    /**
     * Creates a form to delete a Missatges entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_missatges_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
