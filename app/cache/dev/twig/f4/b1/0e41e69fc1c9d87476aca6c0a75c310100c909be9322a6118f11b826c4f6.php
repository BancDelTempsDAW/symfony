<?php

/* TwigBundle:Exception:trace.txt.twig */
class __TwigTemplate_f4b10e41e69fc1c9d87476aca6c0a75c310100c909be9322a6118f11b826c4f6 extends Twig_Template
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
        if ($this->getAttribute($this->getContext($context, "trace"), "function")) {
            // line 2
            echo "    at ";
            echo (($this->getAttribute($this->getContext($context, "trace"), "class") . $this->getAttribute($this->getContext($context, "trace"), "type")) . $this->getAttribute($this->getContext($context, "trace"), "function"));
            echo "(";
            echo $this->env->getExtension('code')->formatArgsAsText($this->getAttribute($this->getContext($context, "trace"), "args"));
            echo ")
";
        } else {
            // line 4
            echo "    at n/a
";
        }
        // line 6
        if (($this->getAttribute($this->getContext($context, "trace", true), "file", array(), "any", true, true) && $this->getAttribute($this->getContext($context, "trace", true), "line", array(), "any", true, true))) {
            // line 7
            echo "        in ";
            echo $this->getAttribute($this->getContext($context, "trace"), "file");
            echo " line ";
            echo $this->getAttribute($this->getContext($context, "trace"), "line");
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:trace.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 4,  38 => 13,  35 => 7,  26 => 5,  87 => 20,  21 => 2,  94 => 22,  92 => 21,  89 => 20,  75 => 17,  72 => 16,  68 => 14,  64 => 12,  50 => 8,  24 => 4,  199 => 91,  196 => 90,  183 => 82,  173 => 74,  171 => 73,  166 => 71,  163 => 70,  158 => 67,  151 => 63,  142 => 59,  138 => 57,  136 => 56,  133 => 55,  123 => 47,  121 => 46,  117 => 44,  112 => 42,  105 => 40,  101 => 24,  91 => 31,  86 => 28,  69 => 25,  66 => 15,  51 => 15,  39 => 6,  19 => 1,  93 => 9,  80 => 19,  78 => 40,  46 => 7,  32 => 12,  27 => 4,  22 => 2,  57 => 16,  54 => 21,  43 => 8,  33 => 6,  30 => 3,  311 => 123,  307 => 115,  300 => 111,  296 => 110,  292 => 108,  284 => 103,  280 => 102,  276 => 100,  274 => 99,  271 => 98,  268 => 97,  261 => 119,  256 => 116,  254 => 97,  251 => 96,  244 => 92,  240 => 91,  236 => 90,  231 => 87,  229 => 86,  217 => 76,  211 => 72,  209 => 71,  201 => 92,  191 => 58,  187 => 84,  177 => 50,  172 => 48,  168 => 72,  164 => 46,  160 => 45,  156 => 66,  152 => 43,  148 => 42,  144 => 41,  137 => 36,  135 => 35,  130 => 33,  125 => 30,  122 => 29,  115 => 43,  109 => 23,  107 => 22,  103 => 21,  98 => 40,  95 => 19,  88 => 6,  84 => 13,  79 => 18,  76 => 11,  70 => 10,  58 => 124,  55 => 13,  53 => 29,  49 => 19,  47 => 19,  42 => 14,  40 => 8,  36 => 7,  25 => 3,  85 => 19,  74 => 15,  67 => 13,  62 => 23,  56 => 9,  52 => 9,  48 => 8,  44 => 10,  41 => 9,  37 => 5,  31 => 5,  28 => 2,);
    }
}
