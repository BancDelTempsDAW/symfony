<?php

/* bonavallBancdeltempsBundle:Security:login.html.twig */
class __TwigTemplate_4a9fef4bc5fcf418f0035f10c2b63516b8affb6319799c4ab87d3cd54d80cd3f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("bonavallBancdeltempsBundle:Default:skel.html.twig");

        $this->blocks = array(
            'login' => array($this, 'block_login'),
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
    public function block_login($context, array $blocks = array())
    {
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        if ($this->getContext($context, "error")) {
            // line 5
            echo "<div class=\"bg-danger\"><h3>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getContext($context, "error"), "message")), "html", null, true);
            echo "</h3></div>
";
        }
        // line 7
        echo "
<form role=\"form\" action=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\">
    <div class=\"form-group\">
        <label for=\"username\">Email:</label>
        <input id=\"login_email\" type=\"text\" name=\"_username\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, "last_username"), "html", null, true);
        echo "\" placeholder=\"Introdueix email\" class=\"form-control\" />
        <span class=\"bg-danger\" id=\"emailMsg\"></span>
    </div>
    <div class=\"form-group\">
        <label for=\"password\">Contraseña:</label>
        <input id=\"login_password\" type=\"password\" name=\"_password\" placeholder=\"Password\" class=\"form-control\" /> 
        <span class=\"bg-danger\" id=\"passwordMsg\"></span>        
    </div>
    <input type=\"submit\" id=\"botologin\" name=\"login\" class=\"btn btn-default\"/>
</form>
<script src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/login.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return "bonavallBancdeltempsBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 21,  54 => 11,  48 => 8,  45 => 7,  39 => 5,  37 => 4,  34 => 3,  29 => 2,);
    }
}
