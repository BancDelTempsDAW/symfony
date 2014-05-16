<?php

namespace bonavall\BancdeltempsBundle\Controller;

/*use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bonavall\BancdeltempsBundle\Entity\Bancdeltemps;
use bonavall\BancdeltempsBundle\Form\BancdeltempsType;*/
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
                //Implementacion de qué queremos hacer con el formulario, ingresar en BB.DD,...
            }
        }

        return $this->render('bonavallBancdeltempsBundle:Usuari:altausuari.html.twig',
            array('form' => $form->createView())
        );
    }
}