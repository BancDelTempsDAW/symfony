<?php

/* bonavallBancdeltempsBundle:Admin:admin.html.twig */
class __TwigTemplate_cf9f6d91cce66a79b81ca8efb4c56a085c10687d76e04418936ee8f9aa5ef79e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("bonavallBancdeltempsBundle:Default:skel.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "bonavallBancdeltempsBundle:Default:skel.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "Hola ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "username"), "html", null, true);
        echo "

";
        // line 5
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 6
            echo "    <a href=\"...\">Delete</a>
";
        }
        // line 8
        echo "
<br />

<div style=\"margin-left: 95%\">
    <a  href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("logout");
        echo "\" class=\"btn btn-danger btn-large\"><i class=\"icon-white icon-off\"></i> logout</a>

</div>
<div class=\"navbar navbar-default\">
    <div class=\"container\">
        
        <ul class=\"nav navbar-nav\">
            <li class=\"active\">
                <a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("Admin_bancdeltemps");
        echo "\">
                    Configuracions BDT
                </a>
            </li>
            <li>
                <a href=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("persona");
        echo "\">
                    Persones
                </a>
            </li>
            <li>
                <a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("usuari");
        echo "\">
                    Usuaris
                </a>
            </li>
            <li>
                <a href=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("admin_serveis");
        echo "\">
                    Serveis
                </a>
            </li>
            <li>
                <a href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("admin_tipusservei");
        echo "\">
                    Tipus de Serveis
                </a>
            </li>
            <li>
                <a href=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("admin_estatservei");
        echo "\">
                    Estat de Serveis
                </a>
            </li>
            <li>
                <a href=\"";
        // line 50
        echo $this->env->getExtension('routing')->getPath("admin_serveisconsumits");
        echo "\">
                    Serveis Consumits
                </a>
            </li>
            <li>
                <a href=\"";
        // line 55
        echo $this->env->getExtension('routing')->getPath("admin_valoracioservei");
        echo "\">
                    Valoracio Serveis
                </a>
            </li>
            <li>
                <a href=\"";
        // line 60
        echo $this->env->getExtension('routing')->getPath("admin_solicituts");
        echo "\">
                    Solicituts
                </a>
            </li>
            <li>
                <a href=\"";
        // line 65
        echo $this->env->getExtension('routing')->getPath("admin_missatges");
        echo "\">
                    Missatges
                </a>
            </li>
        </ul>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "bonavallBancdeltempsBundle:Admin:admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 65,  124 => 60,  116 => 55,  108 => 50,  100 => 45,  92 => 40,  84 => 35,  76 => 30,  68 => 25,  60 => 20,  49 => 12,  43 => 8,  39 => 6,  37 => 5,  31 => 3,  28 => 2,);
    }
}
