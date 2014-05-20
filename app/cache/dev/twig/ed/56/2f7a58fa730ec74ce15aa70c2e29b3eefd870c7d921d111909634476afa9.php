<?php

/* bonavallBancdeltempsBundle:user:perfil.html.twig */
class __TwigTemplate_ed562f7a58fa730ec74ce15aa70c2e29b3eefd870c7d921d111909634476afa9 extends Twig_Template
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

</br>

<div style=\"margin-left: 95%\">
    <a  href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("logout");
        echo "\" class=\"btn btn-danger btn-large\"><i class=\"icon-white icon-off\"></i> logout</a>

</div>
<div class=\"navbar navbar-default\">
    <div class=\"container\">
        
        <ul class=\"nav navbar-nav\">
            <li class=\"active\">
                <a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("usuari_update", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\">
                    Editar el meu perfil
                </a>
            </li>
            <li>
                <a href=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("gestio_solicituds");
        echo "\">
                    Les meves solicituds
                </a>
            </li>
            <li>
                <a href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("gestio_serveis");
        echo "\">
                    Els meus serveis
                </a>
            </li>
        </ul>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "bonavallBancdeltempsBundle:user:perfil.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 26,  59 => 21,  51 => 16,  40 => 8,  31 => 3,  28 => 2,);
    }
}
