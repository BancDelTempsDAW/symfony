<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Poblacion;
use bonavall\BancdeltempsBundle\Form\PoblacionType;

/**
 * Poblacion controller.
 *
 * @Route("/admin/poblacion")
 */
class PoblacionController extends Controller
{

    /**
     * Lists all Poblacion entities.
     *
     * @Route("/", name="admin_poblacion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->findAll();

        //$entities = $em->createQuery("SELECT d FROM bonavallBancdeltempsBundle:Poblacion d order by d.poblacion;")->getResult();
        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Poblacion entity.
     *
     * @Route("/", name="admin_poblacion_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:Poblacion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Poblacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_poblacion_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Poblacion entity.
    *
    * @param Poblacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Poblacion $entity)
    {
        $form = $this->createForm(new PoblacionType(), $entity, array(
            'action' => $this->generateUrl('admin_poblacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Poblacion entity.
     *
     * @Route("/new", name="admin_poblacion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Poblacion();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Poblacion entity.
     *
     * @Route("/{id}", name="admin_poblacion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Poblacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Poblacion entity.
     *
     * @Route("/{id}/edit", name="admin_poblacion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Poblacion entity.');
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
    * Creates a form to edit a Poblacion entity.
    *
    * @param Poblacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Poblacion $entity)
    {
        $form = $this->createForm(new PoblacionType(), $entity, array(
            'action' => $this->generateUrl('admin_poblacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Poblacion entity.
     *
     * @Route("/{id}", name="admin_poblacion_update")
     * @Method("PUT")
     * @Template("bonavallBancdeltempsBundle:Poblacion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Poblacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_poblacion_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Poblacion entity.
     *
     * @Route("/{id}", name="admin_poblacion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Poblacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_poblacion'));
    }

    /**
     * Creates a form to delete a Poblacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_poblacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
