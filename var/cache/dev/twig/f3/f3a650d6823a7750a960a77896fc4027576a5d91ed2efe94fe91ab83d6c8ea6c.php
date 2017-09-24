<?php

/* IsenGamePfGamesGoBundle:Game:play.html.twig */
class __TwigTemplate_f92da3f4ad636e8699fca15cdd4d9af493d5422c9c3f158a5d48c1871b895eeb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "IsenGamePfGamesGoBundle:Game:play.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_7214ce45c1ee149328108085eb859074370ef2060537c5d0341a3edd66a939c1 = $this->env->getExtension("native_profiler");
        $__internal_7214ce45c1ee149328108085eb859074370ef2060537c5d0341a3edd66a939c1->enter($__internal_7214ce45c1ee149328108085eb859074370ef2060537c5d0341a3edd66a939c1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "IsenGamePfGamesGoBundle:Game:play.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_7214ce45c1ee149328108085eb859074370ef2060537c5d0341a3edd66a939c1->leave($__internal_7214ce45c1ee149328108085eb859074370ef2060537c5d0341a3edd66a939c1_prof);

    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        $__internal_1652d4fe7e581cb3fe3efb165558438bd9fd1dd3c25b4da6ce864a32067e8cc8 = $this->env->getExtension("native_profiler");
        $__internal_1652d4fe7e581cb3fe3efb165558438bd9fd1dd3c25b4da6ce864a32067e8cc8->enter($__internal_1652d4fe7e581cb3fe3efb165558438bd9fd1dd3c25b4da6ce864a32067e8cc8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "GO";
        
        $__internal_1652d4fe7e581cb3fe3efb165558438bd9fd1dd3c25b4da6ce864a32067e8cc8->leave($__internal_1652d4fe7e581cb3fe3efb165558438bd9fd1dd3c25b4da6ce864a32067e8cc8_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_63b506076e0c4367b06f6f066bcd4ad07ec6b59be67abb90200b0eb450421390 = $this->env->getExtension("native_profiler");
        $__internal_63b506076e0c4367b06f6f066bcd4ad07ec6b59be67abb90200b0eb450421390->enter($__internal_63b506076e0c4367b06f6f066bcd4ad07ec6b59be67abb90200b0eb450421390_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    ";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("goValidate", array("uniqueUrl" => $this->getAttribute((isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")), "uniqueUrl", array()))), "html", null, true);
        echo "<br>
    <canvas id=\"board\" width=\"700\" height=\"700\">
    </canvas>
    <a href=\"#\" id=\"pass\">Passer</a>
    <p id=\"infos\"></p>
";
        
        $__internal_63b506076e0c4367b06f6f066bcd4ad07ec6b59be67abb90200b0eb450421390->leave($__internal_63b506076e0c4367b06f6f066bcd4ad07ec6b59be67abb90200b0eb450421390_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_7ded61547f0e415fb3ae91af4d919fcd30cff8278267016fb9559ba3b003f551 = $this->env->getExtension("native_profiler");
        $__internal_7ded61547f0e415fb3ae91af4d919fcd30cff8278267016fb9559ba3b003f551->enter($__internal_7ded61547f0e415fb3ae91af4d919fcd30cff8278267016fb9559ba3b003f551_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 12
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/isengamepfgamesgo/js/jquery-2.2.2.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/isengamepfgamesgo/js/go.js"), "html", null, true);
        echo "\"></script>
    <script>
        var go = new Go(\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("goFetch", array("uniqueUrl" => $this->getAttribute((isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")), "uniqueUrl", array()))), "html", null, true);
        echo "\", \"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("goValidate", array("uniqueUrl" => $this->getAttribute((isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")), "uniqueUrl", array()))), "html", null, true);
        echo "\", \"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("goPass", array("uniqueUrl" => $this->getAttribute((isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")), "uniqueUrl", array()))), "html", null, true);
        echo "\", ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")), "rows", array()), "html", null, true);
        echo ");
        go.updateBoard();
    </script>
";
        
        $__internal_7ded61547f0e415fb3ae91af4d919fcd30cff8278267016fb9559ba3b003f551->leave($__internal_7ded61547f0e415fb3ae91af4d919fcd30cff8278267016fb9559ba3b003f551_prof);

    }

    public function getTemplateName()
    {
        return "IsenGamePfGamesGoBundle:Game:play.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 15,  79 => 13,  74 => 12,  68 => 11,  54 => 4,  48 => 3,  36 => 2,  11 => 1,);
    }
}
/* {% extends "::base.html.twig" %}*/
/* {% block title %}GO{% endblock %}*/
/* {% block body %}*/
/*     {{ url('goValidate', {'uniqueUrl': game.uniqueUrl}) }}<br>*/
/*     <canvas id="board" width="700" height="700">*/
/*     </canvas>*/
/*     <a href="#" id="pass">Passer</a>*/
/*     <p id="infos"></p>*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     <script type="text/javascript" src="{{ asset('bundles/isengamepfgamesgo/js/jquery-2.2.2.js') }}"></script>*/
/*     <script type="text/javascript" src="{{ asset('bundles/isengamepfgamesgo/js/go.js') }}"></script>*/
/*     <script>*/
/*         var go = new Go("{{ url('goFetch', {'uniqueUrl': game.uniqueUrl}) }}", "{{ url('goValidate', {'uniqueUrl': game.uniqueUrl}) }}", "{{ url('goPass', {'uniqueUrl': game.uniqueUrl}) }}", {{ game.rows }});*/
/*         go.updateBoard();*/
/*     </script>*/
/* {% endblock %}*/
/* */
/* */
