<?php

/* bonavallBancdeltempsBundle:UserServeis:show.html.twig */
class __TwigTemplate_73fdf05fac00c82b6d2d165f2b217d1d494510edadaf1ccdd13d5e37f62adf8e extends Twig_Template
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
        echo "<h1>Serveis</h1>

    <table class=\"record_properties\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Punts</th>
                <td>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "punts"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Nomservei</th>
                <td>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "nomServei"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Descripcioservei</th>
                <td>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "descripcioServei"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Poblacio</th>
                <td>";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "poblacio"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Datainici</th>
                <td>";
        // line 30
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "dataInici"), "d-m-Y H:i:s"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Durada</th>
                <td>";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "durada"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Datafinal</th>
                <td>";
        // line 38
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "dataFinal"), "d-m-Y H:i:s"), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
    </table>

        <ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("user_serveis");
        echo "\">
            Torna al llistat
        </a>
    </li>
    <li>";
        // line 49
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "solicita_form"), 'form');
        echo "</li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "bonavallBancdeltempsBundle:UserServeis:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 49,  98 => 45,  88 => 38,  81 => 34,  74 => 30,  67 => 26,  60 => 22,  53 => 18,  46 => 14,  39 => 10,  31 => 4,  28 => 3,);
    }
}
