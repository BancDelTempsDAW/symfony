<?php

/* bonavallBancdeltempsBundle:Default:index.html.twig */
class __TwigTemplate_8b08767ab1514045dfaaf55d5dc9360c748f4fa439f353ba86b192bdf0e777a7 extends Twig_Template
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
        echo "         <div class=\"jumbotron\">
           <div class=\"container\">
             <h1>Banc del Temps</h1>
             <p>Tothom té alguna habilitat. Tothom necessita ajuda. Tothom pot ajudar a un altre. Un banc del temps et permet comerciar amb altres persones amb el teu temps i les teves habilitats. Uneix-te ara i descobreix com ajudar i ser ajudat.</p>      
           </div>
         </div>
         <div class=\"container\">
           <div class=\"row\">
             <div class=\"col-md-4\">
               <h2>Comerciar amb temps</h2>
               <p>
                 <p>Ofereix algun tipus de servei (reparacions, classes, vijilar a gent gran...) i posa-li el preu que tu valoris en punts.</p>
                 <p>Hauras d'especificar durant quant temps estara disponible i quina durada en hores.</p>
                 <p>Si un usuari vol el teu servei fara una solicitud i mitjançant missatges podreu especificar com quedar etc...</p>
               </p>
             </div>
             <div class=\"col-md-4\">
               <h2>Dona la teva opinió</h2>
               <p>Una vegada consumit un servei podrás fer una valoració d'àquest.</p>
               <p>Tant si l'experiencia ha estat positiva com negativa és molt important que deixis una opinió per a facilitar l'ús del banc del temps</p>
               <p>No t'oblidis de ser respectuos! Si has tingut algún problema pots utilitzar l'eina de denuncia però no utilitzis les valoracions per resoldre un problema personal amb un altre usuari.</p>
            </div>
             <div class=\"col-md-3\">
               <h2>Ajudar i ser ajudat</h2>
               <p>
                   Per a poder disfrutar d'un servei primer haurás d'haver oferit un tu. Mentre més ofereixis més podrás aconseguir tu. És molt important tenir usuaris actius per a que l'experiencia sigui satisfactória.
               </p>
             </div>
           </div>

        


         </div>
";
    }

    public function getTemplateName()
    {
        return "bonavallBancdeltempsBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 3,  28 => 2,);
    }
}
