<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Serveis;
use bonavall\BancdeltempsBundle\Form\UserServeisType;

/**
 * Serveis controller.
 *
 * @Route("/user/serveis")
 */
class UserServeisController extends Controller
{

    /**
     * Lists all Serveis entities.
     *
     * @Route("/", name="user_serveis")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->findAll();
        $colabora = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->findBy(array('iddonant' => $this->getUser()));
        $solicituts = $em->getRepository('bonavallBancdeltempsBundle:Solicituts')->findAll();
        $poblacionscp = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->findBy(array(), array('codiPostal' => 'ASC'));
        $poblacionsnom = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->findBy(array(), array('poblacio' => 'ASC'));
        $provincies = $em->getRepository('bonavallBancdeltempsBundle:Provincia')->findAll();
        $categories = $em->getRepository('bonavallBancdeltempsBundle:TipusServei')->findAll();
        $minim = $em->getRepository('bonavallBancdeltempsBundle:Bancdeltemps')->findOneBy(array('id' => 1));
        $saldominim = $minim->getSaldoMinim();
        

        return array(
            'entities' => $entities,
            'solicituts' => $solicituts,
            'poblacions' => $poblacionscp,
            'poblacionsnom' => $poblacionsnom,
            'provincies' => $provincies,
            'categories' => $categories,
            'colabora' => $colabora,
            'saldominim' => $saldominim,
        );
    }
    
    /**
     * Lists all Serveis entities.
     *
     * @Route("/", name="user_serveis")
     * @Method("GET")
     * @Template()
     */
    public function indexcpAction()
    {
        $request = $this->get('request');
        $cp = $request->request->get('idCp');
        $em = $this->getDoctrine()->getManager();
        
        $entities = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->findBy(array('poblacio' => $cp ));
        $solicituts = $em->getRepository('bonavallBancdeltempsBundle:Solicituts')->findAll();
        $poblacionscp = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->findBy(array(), array('codiPostal' => 'ASC'));
        $poblacionsnom = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->findBy(array(), array('poblacio' => 'ASC'));
        $provincies = $em->getRepository('bonavallBancdeltempsBundle:Provincia')->findAll();
        $categories = $em->getRepository('bonavallBancdeltempsBundle:TipusServei')->findAll();
        

        return $this->render('bonavallBancdeltempsBundle:UserServeis:indexCP.html.twig', array(
            'entities' => $entities,
            'solicituts' => $solicituts,
            'poblacions' => $poblacionscp,
            'poblacionsnom' => $poblacionsnom,
            'provincies' => $provincies,
            'categories' => $categories,
        ));
    }
    
    /**
     * Lists all Serveis entities.
     *
     * @Route("/", name="user_serveis")
     * @Method("GET")
     * @Template()
     */
    public function indexpobAction()
    {
        $request = $this->get('request');
        $cp = $request->request->get('idCp');
        $em = $this->getDoctrine()->getManager();
        
        $entities = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->findBy(array('poblacio' => $cp ));
        $solicituts = $em->getRepository('bonavallBancdeltempsBundle:Solicituts')->findAll();
        $poblacionscp = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->findBy(array(), array('codiPostal' => 'ASC'));
        $poblacionsnom = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->findBy(array(), array('poblacio' => 'ASC'));
        $provincies = $em->getRepository('bonavallBancdeltempsBundle:Provincia')->findAll();
        $categories = $em->getRepository('bonavallBancdeltempsBundle:TipusServei')->findAll();
        

        return $this->render('bonavallBancdeltempsBundle:UserServeis:indexCP.html.twig', array(
            'entities' => $entities,
            'solicituts' => $solicituts,
            'poblacions' => $poblacionscp,
            'poblacionsnom' => $poblacionsnom,
            'provincies' => $provincies,
            'categories' => $categories,
        ));
    }
    
    /**
     * Lists all Serveis entities.
     *
     * @Route("/", name="user_serveis")
     * @Method("GET")
     * @Template()
     */
    public function indexprovAction()
    {
        $request = $this->get('request');
        $cp = $request->request->get('idCp');
        $em = $this->getDoctrine()->getManager();
               
        
        $pob = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->findBy(array('idProvincia' => $cp));
        $entities = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->findBy(array('poblacio' => $pob));
        $solicituts = $em->getRepository('bonavallBancdeltempsBundle:Solicituts')->findAll();
        $poblacionscp = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->findBy(array(), array('codiPostal' => 'ASC'));
        $poblacionsnom = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->findBy(array(), array('poblacio' => 'ASC'));
        $provincies = $em->getRepository('bonavallBancdeltempsBundle:Provincia')->findAll();
        $categories = $em->getRepository('bonavallBancdeltempsBundle:TipusServei')->findAll();

        return $this->render('bonavallBancdeltempsBundle:UserServeis:indexCP.html.twig', array(
            'entities' => $entities,
            'solicituts' => $solicituts,
            'poblacions' => $poblacionscp,
            'poblacionsnom' => $poblacionsnom,
            'provincies' => $provincies,
            'categories' => $categories,
        ));
    }
    
    /**
     * Lists all Serveis entities.
     *
     * @Route("/", name="user_serveis")
     * @Method("GET")
     * @Template()
     */
    public function indexcatAction()
    {
        $request = $this->get('request');
        $cp = $request->request->get('idCp');
        $em = $this->getDoctrine()->getManager();
               
        $entities = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->findBy(array('tipusServei1' => $cp));
        $solicituts = $em->getRepository('bonavallBancdeltempsBundle:Solicituts')->findAll();
        $poblacionscp = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->findBy(array(), array('codiPostal' => 'ASC'));
        $poblacionsnom = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->findBy(array(), array('poblacio' => 'ASC'));
        $provincies = $em->getRepository('bonavallBancdeltempsBundle:Provincia')->findAll();
        $categories = $em->getRepository('bonavallBancdeltempsBundle:TipusServei')->findAll();

        return $this->render('bonavallBancdeltempsBundle:UserServeis:indexCP.html.twig', array(
            'entities' => $entities,
            'solicituts' => $solicituts,
            'poblacions' => $poblacionscp,
            'poblacionsnom' => $poblacionsnom,
            'provincies' => $provincies,
            'categories' => $categories,
        ));
    }
    
    /**
     * Creates a new Serveis entity.
     *
     * @Route("/", name="user_serveis_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:Serveis:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Serveis();        
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $actiu = $em->getRepository('bonavallBancdeltempsBundle:EstatServei')->findOneBy(array('id' => 1));
       
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setIddonant($this->getUser());
            $entity->setEstatServei($actiu);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_serveis_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Serveis entity.
    *
    * @param Serveis $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Serveis $entity)
    {
        
        $entity->setIddonant($this->getUser());
        $form = $this->createForm(new UserServeisType(), $entity, array(
            'action' => $this->generateUrl('user_serveis_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crea servei'));

        return $form;
    }

    /**
     * Displays a form to create a new Serveis entity.
     *
     * @Route("/new", name="user_serveis_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        
        $entity = new Serveis();
        $entity->setIddonant($this->getUser());
        $form   = $this->createCreateForm($entity);
        
        $em = $this->getDoctrine()->getManager();
        $poblacions = $em->getRepository('bonavallBancdeltempsBundle:Poblacion')->findBy(array(),array('poblacio' => 'ASC'));
        $provincies = $em->getRepository('bonavallBancdeltempsBundle:Provincia')->findAll();

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'poblacions' => $poblacions,
            'provincies' => $provincies,
            
        );
    }

    /**
     * Finds and displays a Serveis entity.
     *
     * @Route("/{id}", name="user_serveis_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Serveis entity.');
        }

        $solicitaForm = $this->createSolicitaForm($id);
        $user = $entity->getIddonant();
        $solicituts = $em->getRepository('bonavallBancdeltempsBundle:Solicituts')->findBy(array('serveiSolicitat' => $id));
        $donaServei = $em->getRepository('bonavallBancdeltempsBundle:Usuari')->findOneBy(array('id' => $user));
        $valoracions = $em->getRepository('bonavallBancdeltempsBundle:Serveisconsumits')->findBy(array('idservei' => $id));

        return array(
            'entity'      => $entity,
            'solicituts' => $solicituts,
            'donaServei' => $donaServei,
            'valoracions' => $valoracions,
            'solicita_form' => $solicitaForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Serveis entity.
     *
     * @Route("/{id}/edit", name="user_serveis_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Serveis entity.');
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
    * Creates a form to edit a Serveis entity.
    *
    * @param Serveis $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Serveis $entity)
    {
        
        $form = $this->createForm(new UserServeisType(), $entity, array(
            'action' => $this->generateUrl('user_serveis_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualitza'));

        return $form;
    }
    /**
     * Edits an existing Serveis entity.
     *
     * @Route("/{id}", name="user_serveis_update")
     * @Method("PUT")
     * @Template("bonavallBancdeltempsBundle:UserServeis:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->find($id);
        $idDonant = $this->get('security.context')->getToken()->getUser()->getId();
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Serveis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);
        
        
        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('user_serveis_llista', array('id' => $idDonant)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Serveis entity.
     *
     * @Route("/{id}", name="user_serveis_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Serveis entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user_serveis'));
    }

    /**
     * Creates a form to delete a Serveis entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_serveis_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    private function createSolicitaForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_missatges_solicita', array('id' => $id)))
            ->setMethod('POST')
            ->add('submit', 'submit', array('label' => 'Solicitar'))
            ->getForm()
        ;
    }
    
    private function solicitaAction($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_missatges_solicita', array('id' => $id)))
            ->setMethod('POST')
            ->add('submit', 'submit', array('label' => 'Solicitar'))
            ->getForm()
        ;
    }
    
    /**
     * Lists all Serveis entities.
     *
     * @Route("/", name="user_serveis")
     * @Method("GET")
     * @Template()
     */
    public function llistaAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->findBy(array('iddonant' => $id));
              

        return array(
            'entities' => $entities,            
        );
    }
    
    public function reactivaAction($id,$iduser)
    {
        $em = $this->getDoctrine()->getManager();
        $final=new \DateTime("now");
        date_add($final, date_interval_create_from_date_string('365 days'));

        $entities = $em->getRepository('bonavallBancdeltempsBundle:Serveis')->find($id);
        $entities->setDataInici(new \DateTime("now"));
        $entities->setDataFinal($final);
        $em->flush();

        return $this->redirect($this->generateUrl('user_serveis_llista', array('id' => $iduser)));
    }
}
