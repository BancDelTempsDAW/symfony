<?php

namespace bonavall\BancdeltempsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use bonavall\BancdeltempsBundle\Form\AltaUsuariType;
use bonavall\BancdeltempsBundle\Entity\Usuari;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class AltaUsuariController extends Controller
{
    /*public function sferegistrevellAction()
    {
        $form = $this->get('form.factory')->create(
            new AltaUsuariType(),
            array()
        );
        $request = $this->get('request');

        if ($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $var = $request->query->get('nom');
                echo $var;
                if($var != "")
                {
                    echo "no vacio";
                }
                else
                {
                    echo "Vacio";
                }

            }
        }
        return $this->render('bonavallBancdeltempsBundle:Usuari:altausuari.html.twig',
            array('form' => $form->createView()));
    }*/

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

        //$deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            //'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a new Usuari entity.
     *
     * @Route("/", name="alta_usuari_create")
     * @Method("POST")
     * @Template("bonavallBancdeltempsBundle:AltaUsuari:new.html.twig")
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

            return $this->redirect($this->generateUrl('alta_usuari_show', array('id' => $entity->getId())));
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
        $form = $this->createForm(new AltaUsuariType(), $entity, array(
            'action' => $this->generateUrl('alta_usuari_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Registrat'));

        return $form;
    }


    /**
     * Displays a form to create a new Usuari entity.
     *
     * @Route("/altausuari/", name="alta_usuari")
     * @Method("GET")
     * @Template()
     */
    public function registreAction(){
        $entity = new Usuari();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );


    }
}
