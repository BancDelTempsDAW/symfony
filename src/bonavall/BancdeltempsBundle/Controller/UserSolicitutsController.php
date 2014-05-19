<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Solicituts;
use bonavall\BancdeltempsBundle\Entity\EstatServei;
use bonavall\BancdeltempsBundle\Form\UserSolicitutsType;

/**
 * Solicituts controller.
 *
 * @Route("/user/solicituts")
 */
class UserSolicitutsController extends Controller
{

    /**
     * Lists all Solicituts entities.
     *
     * @Route("/", name="user_solicituts")
     * @Method("GET")
     * @Template()
     */
    public function enviadesAction()
    {
        $repository = $this->getDoctrine()
                ->getRepository('bonavallBancdeltempsBundle:Solicituts');

        $query = $repository->createQueryBuilder('p')
                ->where('p.solicitant = :solicitant')
                ->setParameter('solicitant', $this->getUser())
                ->orderBy('p.dataSolicitut', 'ASC')
                ->getQuery();

        $solicituts = $query->getResult();
        if (!$solicituts) {
            throw $this->createNotFoundException(print_r($solicituts).'Unable to find Solicituts entity.');
        }
        return $this->render('bonavallBancdeltempsBundle:Default:userSolicituts.html.twig', array('solicituts' => $solicituts));
    }
    
    public function rebudesAction()
    {        
        $repository = $this->getDoctrine()
                ->getRepository('bonavallBancdeltempsBundle:Solicituts');

        $query = $repository->createQueryBuilder('p')
                ->where('p.ofertant = :ofertant')
                ->setParameter('ofertant', $this->getUser())
                ->orderBy('p.dataSolicitut', 'ASC')
                ->getQuery();

        $solicituts = $query->getResult();
        return $this->render('bonavallBancdeltempsBundle:Default:userSolicituts.html.twig', array('solicituts' => $solicituts));
    }
    /**
     * Creates a new Solicituts entity.
     *
     * @Route("/", name="user_solicituts_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:UserSolicituts:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Solicituts();
        //$entity->setSolicitant($this->getUser()); 
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_solicituts_show', array('id' => $entity->getId())));
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
        $form = $this->createForm(new UserSolicitutsType(), $entity, array(
            'action' => $this->generateUrl('user_solicituts_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Solicita'));

        return $form;
    }

    /**
     * Displays a form to create a new Solicituts entity.
     *
     * @Route("/new", name="user_solicituts_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();        
        $serv = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->find($id);
        
        $em2 = $this->getDoctrine()->getManager();        
        $estat = $em2->getRepository('bonavallBancdeltempsBundle:EstatServei')->find(1);
        
                
        
        if (!$serv) {
            throw $this->createNotFoundException('Unable to find Serveis entity.');
        }
        $entity = new Solicituts();       
        $entity->setSolicitant($this->getUser());
        $entity->setServeiSolicitat($serv);
        $entity->setEstatsolicitut($estat);
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Solicituts entity.
     *
     * @Route("/{id}", name="user_solicituts_show")
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
     * @Route("/{id}/edit", name="user_solicituts_edit")
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
        $form = $this->createForm(new UserSolicitutsType(), $entity, array(
            'action' => $this->generateUrl('user_solicituts_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Solicituts entity.
     *
     * @Route("/{id}", name="user_solicituts_update")
     * @Method("PUT")
     * @Template("bonavallBancdeltempsBundle:UserSolicituts:edit.html.twig")
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

            return $this->redirect($this->generateUrl('user_solicituts_edit', array('id' => $id)));
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
     * @Route("/{id}", name="user_solicituts_delete")
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

        return $this->redirect($this->generateUrl('user_solicituts'));
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
            ->setAction($this->generateUrl('user_solicituts_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
