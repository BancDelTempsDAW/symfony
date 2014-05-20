<?php

/* bonavallBancdeltempsBundle:UserServeis:index2.html.twig */
class __TwigTemplate_1b19ae4a42e1cb913641d08fc564aab3213f3c543d475d3285d392ba58cd648b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "


<h1>Serveis list</h1>
<div id=\"sortida\"></div>
<table class=\"records_list\">
    <thead>
        <tr>
            <th>Id</th>
            <th>Usuari Ofertant</th>
            <th>Punts</th>
            <th>Nomservei</th>
            <th>Descripcioservei</th>
            <th>Poblacio</th>
            <th>Datainici</th>
            <th>Durada</th>
            <th>Datafinal</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entities"));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 24
            echo "
                ";
            // line 25
            if (((($this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "estatServei"), "descripcio") == "Actiu") && (twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "dataFinal"), "Y-m-d") > twig_date_format_filter($this->env, "now", "Y-m-d"))) && ($this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "iddonant"), "id") != $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "id")))) {
                // line 26
                echo "        <tr>
            <td><a href=\"";
                // line 27
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_serveis_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
                echo "</a></td>
            <td>";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "iddonant"), "nom"), "html", null, true);
                echo "</td>
            <td>";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "punts"), "html", null, true);
                echo "</td>
            <td>";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "nomServei"), "html", null, true);
                echo "</td>
            <td>";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "descripcioServei"), "html", null, true);
                echo "</td>
            <td>";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "poblacio"), "html", null, true);
                echo "</td>
            <td>";
                // line 33
                if ($this->getAttribute($this->getContext($context, "entity"), "dataInici")) {
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "dataInici"), "Y-m-d H:i:s"), "html", null, true);
                }
                echo "</td>
            <td>";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "durada"), "html", null, true);
                echo "</td>
            <td>";
                // line 35
                if ($this->getAttribute($this->getContext($context, "entity"), "dataFinal")) {
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "dataFinal"), "Y-m-d H:i:s"), "html", null, true);
                }
                echo "</td>
            <td>
                <ul>
                    <li>
                        <a href=\"";
                // line 39
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_serveis_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
                echo "\">Mostrar</a>
                    </li> 
                    ";
                // line 41
                $context["counter"] = 0;
                // line 42
                echo "                    ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "solicituts"));
                foreach ($context['_seq'] as $context["_key"] => $context["solicitut"]) {
                    // line 43
                    echo "                        ";
                    if ((($this->getAttribute($this->getAttribute($this->getContext($context, "solicitut"), "solicitant"), "id") == $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "id")) && ($this->getAttribute($this->getContext($context, "entity"), "id") == $this->getAttribute($this->getAttribute($this->getContext($context, "solicitut"), "serveiSolicitat"), "id")))) {
                        // line 44
                        echo "                            ";
                        $context["counter"] = ($this->getContext($context, "counter") + 1);
                        // line 45
                        echo "                        ";
                    }
                    // line 46
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['solicitut'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 47
                echo "                    ";
                if (($this->getContext($context, "counter") > 0)) {
                    // line 48
                    echo "                    <li>Servei ja sol·licitat</li>
                    ";
                } else {
                    // line 50
                    echo "                        <li>
                            <a href=\"";
                    // line 51
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_missatges_solicita", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
                    echo "\">Solicitamiss</a>
                        </li>  
                    ";
                }
                // line 54
                echo "                    </ul>
                </td>
            </tr>
            ";
            }
            // line 58
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "        </tbody>
    </table>

    <ul>
        <li>
            <a href=\"";
        // line 64
        echo $this->env->getExtension('routing')->getPath("user_serveis_new");
        echo "\">
                Create a new entry
            </a>
        </li>
    </ul>
    
";
    }

    public function getTemplateName()
    {
        return "bonavallBancdeltempsBundle:UserServeis:index2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 64,  155 => 59,  149 => 58,  143 => 54,  137 => 51,  134 => 50,  130 => 48,  127 => 47,  121 => 46,  118 => 45,  115 => 44,  112 => 43,  107 => 42,  105 => 41,  100 => 39,  91 => 35,  87 => 34,  81 => 33,  77 => 32,  73 => 31,  69 => 30,  65 => 29,  61 => 28,  55 => 27,  52 => 26,  50 => 25,  47 => 24,  43 => 23,  19 => 1,);
    }
}
