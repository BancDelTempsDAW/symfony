<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Usuari;
use bonavall\BancdeltempsBundle\Form\UsuariType;

/**
 * Usuari controller.
 *
 * @Route("/usuari")
 */
class UsuariController extends Controller
{

    /**
     * Lists all Usuari entities.
     *
     * @Route("/", name="usuari")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('bonavallBancdeltempsBundle:Usuari')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Usuari entity.
     *
     * @Route("/", name="usuari_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:Usuari:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Usuari();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('usuari_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Usuari entity.
    *
    * @param Usuari $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Usuari $entity)
    {
        $form = $this->createForm(new UsuariType(), $entity, array(
            'action' => $this->generateUrl('usuari_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Usuari entity.
     *
     * @Route("/new", name="usuari_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Usuari();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Usuari entity.
     *
     * @Route("/{id}", name="usuari_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Usuari')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuari entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Usuari entity.
     *
     * @Route("/{id}/edit", name="usuari_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Usuari')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuari entity.');
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
    * Creates a form to edit a Usuari entity.
    *
    * @param Usuari $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Usuari $entity)
    {
        $form = $this->createForm(new UsuariType(), $entity, array(
            'action' => $this->generateUrl('usuari_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Usuari entity.
     *
     * @Route("/{id}", name="usuari_update")
     * @Method("PUT")
     * @Template("bonavallBancdeltempsBundle:Usuari:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Usuari')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuari entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('usuari_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Usuari entity.
     *
     * @Route("/{id}", name="usuari_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('bonavallBancdeltempsBundle:Usuari')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Usuari entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('usuari'));
    }

    /**
     * Creates a form to delete a Usuari entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usuari_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    
}
