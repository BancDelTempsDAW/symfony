<?php

/* bonavallBancdeltempsBundle:Default:userSolicituts.html.twig */
class __TwigTemplate_5d379068a7002f6bdc42d8a06e35215a5004c416f9e8d24ee0cb40d72b7c6159 extends Twig_Template
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
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/missatges.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<div class=\"panel panel-default\">
     <div id=\"missatges-body-header\" class=\"panel-heading\"><h1 class=\"panel-title\">Solicituds</h1></div>
     <div id=\"missatges-panel\" class=\"container-fluid\">
    ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "solicituts"));
        foreach ($context['_seq'] as $context["_key"] => $context["solicitut"]) {
            // line 8
            echo "        <div class=\"solicitut panel panel-primary\">
            <div class=\"panel-heading\"><h3 class=\"panel-title\">";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "solicitut"), "serveiSolicitat"), "nomServei"), "html", null, true);
            echo "</h3></div>
            <div class=\"panel-body\">
                <div class=\"container-fluid\">
                    <div class=\"row\">
                        <div class=\"col-xs-12 col-md-8\">
                            <div class=\"sol_id\">";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "solicitut"), "id"), "html", null, true);
            echo "</div>
                            <div>";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "solicitut"), "solicitant"), "html", null, true);
            echo "</div>
                            <div>";
            // line 16
            if ($this->getAttribute($this->getContext($context, "solicitut"), "dataSolicitut")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "solicitut"), "dataSolicitut"), "d-m-Y H:i:s"), "html", null, true);
            }
            echo "</div>
                            <div>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "solicitut"), "estatSolicitut"), "html", null, true);
            echo "</div>                    
                        </div>
                        <div class=\"\">
                            <div><a id=\"miss_btn_";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "solicitut"), "id"), "html", null, true);
            echo "\" class=\"btn btn-info\" data-toggle=\"tooltip\" title=\"Veure missatges?\" href=\"";
            echo $this->env->getExtension('routing')->getPath("missatges_ajax");
            echo "\" ><span class=\"glyphicon glyphicon-book\"></span> Missatges</a></div>
                        </div>
                    </div>
                    <div id=\"row_missatges_";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "solicitut"), "id"), "html", null, true);
            echo "\" class=\"row\">
                        <div class=\"col-md-8\">
                            <div id=\"output_";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "solicitut"), "id"), "html", null, true);
            echo "\">

                            </div>
                            <div id=\"outputButton_";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "solicitut"), "id"), "html", null, true);
            echo "\">
                                
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['solicitut'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "bonavallBancdeltempsBundle:Default:userSolicituts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 37,  93 => 28,  87 => 25,  82 => 23,  74 => 20,  68 => 17,  62 => 16,  58 => 15,  54 => 14,  46 => 9,  43 => 8,  39 => 7,  31 => 3,  28 => 2,);
    }
}
