<?php

/* bonavallBancdeltempsBundle:Default:skel.html.twig */
class __TwigTemplate_40eddc230a78d3b7a2254eb0762ce9ccb0d6a09bf0b5312aaa050fc7ead9280d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'navbar' => array($this, 'block_navbar'),
            'login' => array($this, 'block_login'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta name=\"description\" content=\"\">
        <meta name=\"author\" content=\"\">
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8”/>
        <title>";
        // line 10
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 11
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 17
        echo "        ";
        // line 18
        echo "
        ";
        // line 19
        $this->displayBlock('javascripts', $context, $blocks);
        // line 27
        echo "    </head>
    <body>
        ";
        // line 29
        $this->displayBlock('navbar', $context, $blocks);
        // line 126
        echo "        ";
        $this->displayBlock('body', $context, $blocks);
        // line 127
        echo "        <hr>
        <nav id=\"navbar-foot\" class=\"navbar navbar-default navbar-static-bottom\" role=\"navigation\">
          <div class=\"container-fluid\">
              <p>&copy; Bonavall 2014</p>
          </div>
        </nav>
    </body>
</html>
";
    }

    // line 10
    public function block_title($context, array $blocks = array())
    {
        echo "Banc del Temps";
    }

    // line 11
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 12
        echo "        <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/jumbotron.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bancdeltemps.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        
        ";
    }

    // line 19
    public function block_javascripts($context, array $blocks = array())
    {
        // line 20
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-1.11.1.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/skel.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            ";
        // line 22
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 23
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/user.js"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
            ";
        }
        // line 25
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        ";
    }

    // line 29
    public function block_navbar($context, array $blocks = array())
    {
        // line 30
        echo "          <nav id=\"navbar-head\" class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\">
            <div class=\"container-fluid\">
              <div class=\"navbar-header\">
                <a class=\"navbar-brand\" href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("bonavall_bancdeltemps_inici");
        echo "\">Banc del temps</a>
              </div>
              ";
        // line 35
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 36
            echo "                <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                <ul class=\"nav navbar-nav\">
                    <li>
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Admin<b class=\"caret\"></b></a>                                       
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"";
            // line 41
            echo $this->env->getExtension('routing')->getPath("persona");
            echo "\">Persona</a></li>
                            <li><a href=\"";
            // line 42
            echo $this->env->getExtension('routing')->getPath("usuari");
            echo "\">Usuari</a></li>
                            <li><a href=\"";
            // line 43
            echo $this->env->getExtension('routing')->getPath("admin_serveis");
            echo "\">Serveis</a></li>
                            <li><a href=\"";
            // line 44
            echo $this->env->getExtension('routing')->getPath("admin_estatservei");
            echo "\">Estats</a></li>
                            <li><a href=\"";
            // line 45
            echo $this->env->getExtension('routing')->getPath("admin_serveisconsumits");
            echo "\">Serveis Consumits</a></li>
                            <li><a href=\"";
            // line 46
            echo $this->env->getExtension('routing')->getPath("admin_valoracioservei");
            echo "\">Valoració Serveis</a></li>
                            <li><a href=\"";
            // line 47
            echo $this->env->getExtension('routing')->getPath("admin_solicituts");
            echo "\">Solicituts </a></li>
                            <li><a href=\"";
            // line 48
            echo $this->env->getExtension('routing')->getPath("admin_missatges");
            echo "\">Missatges</a></li>
                            <li><a href=\"";
            // line 49
            echo $this->env->getExtension('routing')->getPath("admin_poblacion");
            echo "\">Poblacions</a></li>
                            <li><a href=\"";
            // line 50
            echo $this->env->getExtension('routing')->getPath("admin_provincia");
            echo "\">Provincies</a></li>
                            <li class=\"divider\"></li>
                            <li><a href=\"";
            // line 52
            echo $this->env->getExtension('routing')->getPath("Admin_bancdeltemps");
            echo "\">Configuració Global</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class=\"nav navbar-nav navbar-right\">
                    <form class=\"navbar-form navbar-right\">
                      <div class=\"form-group\">
                          Hola <a href=\"\" id=\"user-span\" data-container=\"body\" title=\"Perfil\" data-toggle=\"popover\" data-placement=\"bottom\" >";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "username"), "html", null, true);
            echo "</a>
                          <a id=\"disconnect-button\" class=\"btn btn-danger\" data-toggle=\"tooltip\" title=\"Tornaras Aviat?\" href=\"";
            // line 60
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\" ><span class=\"glyphicon glyphicon-off\"></span> Desconnecta't</a>
                      </div>
                    </form>
                </ul>
                </div>

              ";
        } else {
            // line 67
            echo "               <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                <ul class=\"nav navbar-nav\">
                  <li>
                      <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Serveis<b class=\"caret\"></b></a>
                      <ul class=\"dropdown-menu\">
                          <li><a href=\"";
            // line 72
            echo $this->env->getExtension('routing')->getPath("user_serveis");
            echo "\">Buscar</a></li>
                          ";
            // line 73
            if (((!(null === $this->getAttribute($this->getContext($context, "app"), "user"))) && $this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY"))) {
                // line 74
                echo "                              <li class=\"divider\"></li>
                              <li><a href=\"#\">Crear</a></li>
                              <li><a href=\"#\">Historial</a></li>
                          ";
            }
            // line 78
            echo "                      </ul>
                  </li>
                  
                  <li>
                      <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Usuaris<b class=\"caret\"></b></a>                                       
                      <ul class=\"dropdown-menu\">
                          <li><a href=\"#\">Buscar</a></li>
                      </ul>
                  </li>

                    ";
            // line 88
            if (((!(null === $this->getAttribute($this->getContext($context, "app"), "user"))) && $this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY"))) {
                // line 89
                echo "                        <li class=\"dropdown\">
                             <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Perfil<b class=\"caret\"></b></a>
                             <ul class=\"dropdown-menu\">
                                 <li><a href=\"";
                // line 92
                echo $this->env->getExtension('routing')->getPath("perfil_user");
                echo "\">Informació Personal</a></li>
                                 <li><a href=\"";
                // line 93
                echo $this->env->getExtension('routing')->getPath("gestio_solicituds_enviades");
                echo "\">Solicituts enviades</a></li>
                                 <li><a href=\"";
                // line 94
                echo $this->env->getExtension('routing')->getPath("gestio_solicituds_rebudes");
                echo "\">Solicituts rebudes</a></li>
                                 <li><a href=\"";
                // line 95
                echo $this->env->getExtension('routing')->getPath("gestio_serveis");
                echo "\">Els meus serveis</a></li>
                             </ul>
                         </li>
                     ";
            }
            // line 99
            echo "                </ul>
                ";
            // line 100
            $this->displayBlock('login', $context, $blocks);
            // line 119
            echo "                </ul>
              </div><!-- /.navbar-collapse -->
              ";
        }
        // line 122
        echo "            </div><!-- /.container-fluid -->
          </nav>

        ";
    }

    // line 100
    public function block_login($context, array $blocks = array())
    {
        // line 101
        echo "                <ul class=\"nav navbar-nav navbar-right\">
                ";
        // line 102
        if (((!(null === $this->getAttribute($this->getContext($context, "app"), "user"))) && $this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY"))) {
            // line 103
            echo "                    <form class=\"navbar-form navbar-right\">
                      <div class=\"form-group\">
                          Hola <a href=\"\" id=\"user-span\" data-container=\"body\" title=\"Perfil\" data-toggle=\"popover\" data-placement=\"bottom\" >";
            // line 105
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "nom"), "html", null, true);
            echo "</a>
                          <a id=\"disconnect-button\" class=\"btn btn-danger\" data-toggle=\"tooltip\" title=\"Tornaras Aviat?\" href=\"";
            // line 106
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\" ><span class=\"glyphicon glyphicon-off\"></span> Desconnecta't</a>
                      </div>
                    </form>
                
                ";
        } else {
            // line 111
            echo "                    <form class=\"navbar-form navbar-right\">
                        <li class=\"form-group\">
                            <a id=\"login-button\" class=\"btn btn-primary\" data-toggle=\"tooltip\" title=\"Benvingut!\" href=\"";
            // line 113
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\" ><span class=\"glyphicon glyphicon-user\"></span> Accedeix</a>
                            <a id=\"register-button\" class=\"btn btn-success\" data-toggle=\"tooltip\" title=\"Es gratis eh!\" href=\"";
            // line 114
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\" ><span class=\"glyphicon glyphicon-pencil\"></span> Registra't</a>
                        </li>
                     </form>
                ";
        }
        // line 118
        echo "                ";
    }

    // line 126
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "bonavallBancdeltempsBundle:Default:skel.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  326 => 126,  322 => 118,  315 => 114,  311 => 113,  307 => 111,  299 => 106,  295 => 105,  291 => 103,  289 => 102,  286 => 101,  283 => 100,  276 => 122,  271 => 119,  269 => 100,  266 => 99,  259 => 95,  255 => 94,  251 => 93,  247 => 92,  242 => 89,  240 => 88,  228 => 78,  222 => 74,  220 => 73,  216 => 72,  209 => 67,  199 => 60,  195 => 59,  185 => 52,  180 => 50,  176 => 49,  172 => 48,  168 => 47,  164 => 46,  160 => 45,  156 => 44,  152 => 43,  148 => 42,  144 => 41,  137 => 36,  135 => 35,  130 => 33,  125 => 30,  122 => 29,  115 => 25,  109 => 23,  107 => 22,  103 => 21,  98 => 20,  95 => 19,  88 => 14,  84 => 13,  79 => 12,  76 => 11,  70 => 10,  58 => 127,  55 => 126,  53 => 29,  49 => 27,  47 => 19,  44 => 18,  42 => 17,  40 => 11,  36 => 10,  25 => 1,);
    }
}
