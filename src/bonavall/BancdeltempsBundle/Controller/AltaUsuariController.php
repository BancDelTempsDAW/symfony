<?php

namespace bonavall\BancdeltempsBundle\Controller;

/*use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Bancdeltemps;
use bonavall\BancdeltempsBundle\Form\BancdeltempsType;*/
use bonavall\BancdeltempsBundle\Entity\Usuari;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use bonavall\BancdeltempsBundle\Form\AltaUsuariType;


class AltaUsuariController extends Controller
{
    public function registreAction()
    {
        $form = $this->get('form.factory')->create(
            new AltaUsuariType(),
            array()
        );

        $request = $this->get('request');

        if ($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);
            if ($form->isValid())
            {
                $usuari = new Usuari();

                $usuari->setNom($request->request->get('nom'));
                $usuari->setCognom($request->request->get('cognom'));
                $usuari->setAdreca($request->request->get('adreca'));
                /*$usuari->setPoblacio($request->request->get('poblacio'));
                $usuari->setCodiPostal($request->request->get('codi_postal'));*/
                $usuari->setEmail($request->request->get('email'));
                $usuari->setTelefon($request->request->get('telefon'));
                //$usuari->setPassword($request->request->get('password'));
                $usuari->setFotografia($request->request->get('fotografia'));

                $em = $this -> getDoctrine()->getManager();
                $em -> persist($usuari);
                $em -> flush();


                //Implementacion de qué queremos hacer con el formulario, ingresar en BB.DD,...
            }
        }

        return $this->render('bonavallBancdeltempsBundle:Usuari:altausuari.html.twig',
            array('form' => $form->createView())
        );
    }
}