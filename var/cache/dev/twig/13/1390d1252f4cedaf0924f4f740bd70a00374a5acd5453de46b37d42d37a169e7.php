<?php

/* ::base.html.twig */
class __TwigTemplate_41ec391d028bd75c543159796c21c7206215e6884afd186d80596fe657f3a1c4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_7dfb045ef9a523c2d4acf45e17f772f567d34678a1417232e1b91b9dd0842550 = $this->env->getExtension("native_profiler");
        $__internal_7dfb045ef9a523c2d4acf45e17f772f567d34678a1417232e1b91b9dd0842550->enter($__internal_7dfb045ef9a523c2d4acf45e17f772f567d34678a1417232e1b91b9dd0842550_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_7dfb045ef9a523c2d4acf45e17f772f567d34678a1417232e1b91b9dd0842550->leave($__internal_7dfb045ef9a523c2d4acf45e17f772f567d34678a1417232e1b91b9dd0842550_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_4bea686824148d7f820283f2f304d2a3ee9b1d02ac77ee764f3094ac66a95e26 = $this->env->getExtension("native_profiler");
        $__internal_4bea686824148d7f820283f2f304d2a3ee9b1d02ac77ee764f3094ac66a95e26->enter($__internal_4bea686824148d7f820283f2f304d2a3ee9b1d02ac77ee764f3094ac66a95e26_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_4bea686824148d7f820283f2f304d2a3ee9b1d02ac77ee764f3094ac66a95e26->leave($__internal_4bea686824148d7f820283f2f304d2a3ee9b1d02ac77ee764f3094ac66a95e26_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_e4d9e13a3a39aac2536be0eb5e3fe668685f8f8d532a5d4823da1d17a6e02e71 = $this->env->getExtension("native_profiler");
        $__internal_e4d9e13a3a39aac2536be0eb5e3fe668685f8f8d532a5d4823da1d17a6e02e71->enter($__internal_e4d9e13a3a39aac2536be0eb5e3fe668685f8f8d532a5d4823da1d17a6e02e71_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_e4d9e13a3a39aac2536be0eb5e3fe668685f8f8d532a5d4823da1d17a6e02e71->leave($__internal_e4d9e13a3a39aac2536be0eb5e3fe668685f8f8d532a5d4823da1d17a6e02e71_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_2f570d4e3ff8070d2feaa45d20c9f329614f297fb180229c4577e23b44913753 = $this->env->getExtension("native_profiler");
        $__internal_2f570d4e3ff8070d2feaa45d20c9f329614f297fb180229c4577e23b44913753->enter($__internal_2f570d4e3ff8070d2feaa45d20c9f329614f297fb180229c4577e23b44913753_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_2f570d4e3ff8070d2feaa45d20c9f329614f297fb180229c4577e23b44913753->leave($__internal_2f570d4e3ff8070d2feaa45d20c9f329614f297fb180229c4577e23b44913753_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_4f776807123e0032c99010a9c6c970233f7009c97551f1e0abb486d180cf3c80 = $this->env->getExtension("native_profiler");
        $__internal_4f776807123e0032c99010a9c6c970233f7009c97551f1e0abb486d180cf3c80->enter($__internal_4f776807123e0032c99010a9c6c970233f7009c97551f1e0abb486d180cf3c80_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_4f776807123e0032c99010a9c6c970233f7009c97551f1e0abb486d180cf3c80->leave($__internal_4f776807123e0032c99010a9c6c970233f7009c97551f1e0abb486d180cf3c80_prof);

    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
