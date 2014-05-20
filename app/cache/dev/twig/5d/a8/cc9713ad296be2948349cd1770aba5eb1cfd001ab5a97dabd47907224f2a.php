<?php

/* @WebProfiler/Profiler/toolbar_js.html.twig */
class __TwigTemplate_5da8cc9713ad296be2948349cd1770aba5eb1cfd001ab5a97dabd47907224f2a extends Twig_Template
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
        echo "<div id=\"sfwdt";
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "\" class=\"sf-toolbar\" style=\"display: none\"></div>
";
        // line 2
        $this->env->loadTemplate("@WebProfiler/Profiler/base_js.html.twig")->display($context);
        // line 3
        echo "<script>/*<![CDATA[*/
    (function () {
        ";
        // line 5
        if (("top" == $this->getContext($context, "position"))) {
            // line 6
            echo "            var sfwdt = document.getElementById('sfwdt";
            echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
            echo "');
            document.body.insertBefore(
                document.body.removeChild(sfwdt),
                document.body.firstChild
            );
        ";
        }
        // line 12
        echo "
        Sfjs.load(
            'sfwdt";
        // line 14
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "',
            '";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_wdt", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "',
            function(xhr, el) {
                el.style.display = -1 !== xhr.responseText.indexOf('sf-toolbarreset') ? 'block' : 'none';

                if (el.style.display == 'none') {
                    return;
                }

                if (Sfjs.getPreference('toolbar/displayState') == 'none') {
                    document.getElementById('sfToolbarMainContent-";
        // line 24
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'none';
                    document.getElementById('sfToolbarClearer-";
        // line 25
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'none';
                    document.getElementById('sfMiniToolbar-";
        // line 26
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'block';
                } else {
                    document.getElementById('sfToolbarMainContent-";
        // line 28
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'block';
                    document.getElementById('sfToolbarClearer-";
        // line 29
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'block';
                    document.getElementById('sfMiniToolbar-";
        // line 30
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "').style.display = 'none';
                }
            },
            function(xhr) {
                if (xhr.status !== 0) {
                    confirm('An error occurred while loading the web debug toolbar (' + xhr.status + ': ' + xhr.statusText + ').\\n\\nDo you want to open the profiler?') && (window.location = '";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "');
                }
            },
            {'maxTries': 5}
        );
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/toolbar_js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 30,  29 => 4,  38 => 13,  35 => 7,  26 => 3,  87 => 20,  21 => 2,  94 => 22,  92 => 21,  89 => 20,  75 => 28,  72 => 16,  68 => 14,  64 => 12,  50 => 15,  24 => 2,  199 => 91,  196 => 90,  183 => 82,  173 => 74,  171 => 73,  166 => 71,  163 => 70,  158 => 67,  151 => 63,  142 => 59,  138 => 57,  136 => 56,  133 => 55,  123 => 47,  121 => 46,  117 => 44,  112 => 42,  105 => 40,  101 => 24,  91 => 35,  86 => 28,  69 => 25,  66 => 25,  51 => 15,  39 => 6,  19 => 1,  93 => 9,  80 => 19,  78 => 40,  46 => 14,  32 => 6,  27 => 4,  22 => 2,  57 => 16,  54 => 21,  43 => 8,  33 => 6,  30 => 5,  311 => 123,  307 => 115,  300 => 111,  296 => 110,  292 => 108,  284 => 103,  280 => 102,  276 => 100,  274 => 99,  271 => 98,  268 => 97,  261 => 119,  256 => 116,  254 => 97,  251 => 96,  244 => 92,  240 => 91,  236 => 90,  231 => 87,  229 => 86,  217 => 76,  211 => 72,  209 => 71,  201 => 92,  191 => 58,  187 => 84,  177 => 50,  172 => 48,  168 => 72,  164 => 46,  160 => 45,  156 => 66,  152 => 43,  148 => 42,  144 => 41,  137 => 36,  135 => 35,  130 => 33,  125 => 30,  122 => 29,  115 => 43,  109 => 23,  107 => 22,  103 => 21,  98 => 40,  95 => 19,  88 => 6,  84 => 13,  79 => 29,  76 => 11,  70 => 26,  58 => 124,  55 => 13,  53 => 29,  49 => 19,  47 => 19,  42 => 12,  40 => 8,  36 => 7,  25 => 3,  85 => 19,  74 => 15,  67 => 13,  62 => 24,  56 => 9,  52 => 9,  48 => 8,  44 => 10,  41 => 9,  37 => 5,  31 => 5,  28 => 2,);
    }
}
