<?php

/* bonavallBancdeltempsBundle:UserServeis:index.html.twig */
class __TwigTemplate_5205b7c2c6e8d45742e93a89fd54aed777cb78546398342337582f7b2ee12af7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/serveisFind.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
Filtrar per codi postal:
<select id=\"triaCp\" reset=";
        // line 6
        echo $this->env->getExtension('routing')->getPath("user_serveis");
        echo " action=\"";
        echo $this->env->getExtension('routing')->getPath("triacp_ajax");
        echo "\">
    <option value=\"reset\">Tria una opció...</option>
";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "poblacions"));
        foreach ($context['_seq'] as $context["_key"] => $context["poblacio"]) {
            // line 9
            echo "    <option value=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "poblacio"), "id"), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "poblacio"), "codiPostal"), "html", null, true);
            echo "</option>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['poblacio'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "</select>
Filtrar per poblacio
<select id=\"triaPob\" reset=";
        // line 13
        echo $this->env->getExtension('routing')->getPath("user_serveis");
        echo " action=\"";
        echo $this->env->getExtension('routing')->getPath("triapob_ajax");
        echo "\">
    <option value=\"reset\">Tria una opció...</option>
";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "poblacions"));
        foreach ($context['_seq'] as $context["_key"] => $context["poblacio"]) {
            // line 16
            echo "    <option value=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "poblacio"), "id"), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "poblacio"), "poblacio"), "html", null, true);
            echo "</option>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['poblacio'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "</select>
Filtrar per provincia
<select id=\"triaProv\" reset=";
        // line 20
        echo $this->env->getExtension('routing')->getPath("user_serveis");
        echo " action=\"";
        echo $this->env->getExtension('routing')->getPath("triaprov_ajax");
        echo "\">
    <option value=\"reset\">Tria una opció...</option>
";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "provincies"));
        foreach ($context['_seq'] as $context["_key"] => $context["provincia"]) {
            // line 23
            echo "    <option value=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "provincia"), "id"), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "provincia"), "provincia"), "html", null, true);
            echo "</option>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['provincia'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "</select>
<div id=\"sortida\">
<h1>Serveis list</h1>
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
        // line 45
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entities"));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 46
            echo "
                ";
            // line 47
            if (((($this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "estatServei"), "descripcio") == "Actiu") && (twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "dataFinal"), "Y-m-d") > twig_date_format_filter($this->env, "now", "Y-m-d"))) && ($this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "iddonant"), "id") != $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "id")))) {
                // line 48
                echo "        <tr>
            <td><a href=\"";
                // line 49
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_serveis_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
                echo "</a></td>
            <td>";
                // line 50
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "iddonant"), "nom"), "html", null, true);
                echo "</td>
            <td>";
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "punts"), "html", null, true);
                echo "</td>
            <td>";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "nomServei"), "html", null, true);
                echo "</td>
            <td>";
                // line 53
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "descripcioServei"), "html", null, true);
                echo "</td>
            <td>";
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "poblacio"), "html", null, true);
                echo "</td>
            <td>";
                // line 55
                if ($this->getAttribute($this->getContext($context, "entity"), "dataInici")) {
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "dataInici"), "Y-m-d H:i:s"), "html", null, true);
                }
                echo "</td>
            <td>";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "durada"), "html", null, true);
                echo "</td>
            <td>";
                // line 57
                if ($this->getAttribute($this->getContext($context, "entity"), "dataFinal")) {
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "dataFinal"), "Y-m-d H:i:s"), "html", null, true);
                }
                echo "</td>
            <td>
                <ul>
                    <li>
                        <a href=\"";
                // line 61
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_serveis_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
                echo "\">Mostrar</a>
                    </li> 
                    ";
                // line 63
                $context["counter"] = 0;
                // line 64
                echo "                    ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "solicituts"));
                foreach ($context['_seq'] as $context["_key"] => $context["solicitut"]) {
                    // line 65
                    echo "                        ";
                    if ((($this->getAttribute($this->getAttribute($this->getContext($context, "solicitut"), "solicitant"), "id") == $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "id")) && ($this->getAttribute($this->getContext($context, "entity"), "id") == $this->getAttribute($this->getAttribute($this->getContext($context, "solicitut"), "serveiSolicitat"), "id")))) {
                        // line 66
                        echo "                            ";
                        $context["counter"] = ($this->getContext($context, "counter") + 1);
                        // line 67
                        echo "                        ";
                    }
                    // line 68
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['solicitut'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 69
                echo "                    ";
                if (($this->getContext($context, "counter") > 0)) {
                    // line 70
                    echo "                    <li>Servei ja sol·licitat</li>
                    ";
                } else {
                    // line 72
                    echo "                        <li>
                            <a href=\"";
                    // line 73
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_missatges_solicita", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
                    echo "\">Solicitamiss</a>
                        </li>  
                    ";
                }
                // line 76
                echo "                    </ul>
                </td>
            </tr>
            ";
            }
            // line 80
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "        </tbody>
    </table>

    <ul>
        <li>
            <a href=\"";
        // line 86
        echo $this->env->getExtension('routing')->getPath("user_serveis_new");
        echo "\">
                Create a new entry
            </a>
        </li>
    </ul>
</div>
    ";
    }

    public function getTemplateName()
    {
        return "bonavallBancdeltempsBundle:UserServeis:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  252 => 86,  245 => 81,  239 => 80,  233 => 76,  227 => 73,  224 => 72,  220 => 70,  217 => 69,  211 => 68,  208 => 67,  205 => 66,  202 => 65,  197 => 64,  195 => 63,  190 => 61,  181 => 57,  177 => 56,  171 => 55,  167 => 54,  163 => 53,  159 => 52,  155 => 51,  151 => 50,  145 => 49,  142 => 48,  140 => 47,  137 => 46,  133 => 45,  111 => 25,  100 => 23,  96 => 22,  89 => 20,  85 => 18,  74 => 16,  70 => 15,  63 => 13,  59 => 11,  48 => 9,  44 => 8,  37 => 6,  31 => 4,  28 => 3,);
    }
}
