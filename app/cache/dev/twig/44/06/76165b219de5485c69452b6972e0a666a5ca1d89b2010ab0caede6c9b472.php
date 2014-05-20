<?php

/* bonavallBancdeltempsBundle:Default:userMissatges.html.twig */
class __TwigTemplate_440676165b219de5485c69452b6972e0a666a5ca1d89b2010ab0caede6c9b472 extends Twig_Template
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "missatges"));
        foreach ($context['_seq'] as $context["_key"] => $context["missatge"]) {
            // line 4
            echo "<table>
<tr>
    
    <td>";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "missatge"), "missatge"), "html", null, true);
            echo "</td>
    <td>";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "missatge"), "autor"), "html", null, true);
            echo "</td>
    <td>";
            // line 9
            if ($this->getAttribute($this->getContext($context, "missatge"), "data")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "missatge"), "data"), "Y-m-d H:i:s"), "html", null, true);
            }
            echo "</td>
    
</tr>
</table>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['missatge'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "bonavallBancdeltempsBundle:Default:userMissatges.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 9,  44 => 8,  40 => 7,  35 => 4,  31 => 3,  28 => 2,);
    }
}
