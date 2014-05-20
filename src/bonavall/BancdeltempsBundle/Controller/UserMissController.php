<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Missatges;
use bonavall\BancdeltempsBundle\Form\MissatgesType;
use Symfony\Component\HttpFoundation\Response;

class UserMissController extends Controller {
    /*
     * @Route("/user/perfil/", name="perfil_check")
     */
    public function checkAction(Request $request){
       $request = $this->get('request');
       $dades = $request->request->get('nomUsuari');
        $dades[]="hola";
        /*$repository = $this->getDoctrine()
                ->getRepository('bonavallBancdeltempsBundle:Missatges');*/
        if ($dades) {
            throw $this->createNotFoundException('Unable to find Missatges entity. '.$dades);
        }
       
       if ($dades == "") {//if the user has written his name
            $greeting = $dades;
            $return = array("responseCode" => 200, "greeting" => $greeting);
        } else {
            $return = array("responseCode" => 400, "greeting" => "You have to write your name!");
        }
        
        //return $this->render('bonavallBancdeltempsBundle:UsuariPerfil:perfil.html.twig', array('missatges' => $dades));
        $return = json_encode($return); //jscon encode the array
        return new Response($return, 200, array('Content-Type' => 'application/json'));
    }

    /**
     * Return a ajax response
     */
    public function greetingAction() {
        $request = $this->get('request');
        $sol_id = $request->request->get('formName');
        //$name = $request->request->get('formName');
        $repository = $this->getDoctrine()
                ->getRepository('bonavallBancdeltempsBundle:Missatges');

        //$entities = $em->getRepository('bonavallBancdeltempsBundle:Missatges');

        $query = $repository->createQueryBuilder('p')
                ->where('p.autor = :autor AND p.solicituts = :solicituts')
                ->setParameter('autor', $this->getUser())
                ->setParameter('solicituts', $sol_id)
                ->orderBy('p.data', 'DESC')
                ->getQuery();

        $missatges = $query->getArrayResult();

        if ($missatges != "") {//if the user has written his name
            $greeting = $missatges;
            $return = array("responseCode" => 200, "greeting" => $greeting);
        } else {
            $return = array("responseCode" => 400, "greeting" => "No hi han missatges!");
        }

        $return = json_encode($return); //jscon encode the array
        return new Response($return, 200, array('Content-Type' => 'application/json')); //make sure it has the correct content type
        //return $this->render('bonavallBancdeltempsBundle:Default:userMissatges.html.twig', array('missatges' => $missatges));
    }
    
      public function nouMissatgeAction() {
        $request = $this->get('request');
        $sol_id = $request->request->get('id');
        $msg = $request->request->get('msg');

        $usr= $this->get('security.context')->getToken()->getUser();
        $usr->getUsername();
        
        $missatge_nou = new Missatges();
        $missatge_nou->setMissatge($msg);
        $missatge_nou->setSolicituts($sol_id);
        $missatge_nou->setAutor($usr);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($missatge_nou);
        $em->flush();
        
        $return = array("nou_msg" => $missatge_nou);
        $return = json_encode($return); //jscon encode the array
        return new Response($return, 200, array('Content-Type' => 'application/json')); //make sure it has the correct content type
        //return $this->render('bonavallBancdeltempsBundle:Default:userMissatges.html.twig', array('missatges' => $missatges));
    }
    
    

    public function indexAction() {
        $repository = $this->getDoctrine()
                ->getRepository('bonavallBancdeltempsBundle:Missatges');

        $query = $repository->createQueryBuilder('p')
                ->where('p.autor = :autor')
                ->setParameter('autor', $this->getUser())
                ->orderBy('p.missatge', 'ASC')
                ->getQuery();

        $missatges = $query->getResult();
        return $this->render('bonavallBancdeltempsBundle:Default:userMissatges.html.twig', array('missatges' => $missatges));
    }

    /**
     * Creates a new Missatges entity.
     *
     * @Route("/", name="admin_missatges_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:Missatges:new.html.twig")
     */
    public function createAction(Request $request) {
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
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Missatges entity.
     *
     * @param Missatges $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Missatges $entity) {
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
    public function newAction() {
        $entity = new Missatges();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Missatges entity.
     *
     * @Route("/{id}", name="admin_missatges_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Missatges')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Missatges entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
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
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Missatges')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Missatges entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
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
    private function createEditForm(Missatges $entity) {
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
    public function updateAction(Request $request, $id) {
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
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Missatges entity.
     *
     * @Route("/{id}", name="admin_missatges_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
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
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_missatges_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}
