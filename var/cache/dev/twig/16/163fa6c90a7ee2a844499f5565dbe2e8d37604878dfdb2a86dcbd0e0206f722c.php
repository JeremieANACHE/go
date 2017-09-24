<?php

/* default/index.html.twig */
class __TwigTemplate_21ff20fb4ad804be5f4aca24655897ece3966a86f460254f0f9e43f5a4daf66e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "default/index.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ff5e9356fa757e9c93a1973d16bba25a41ef0678927787d914f9b8b697351939 = $this->env->getExtension("native_profiler");
        $__internal_ff5e9356fa757e9c93a1973d16bba25a41ef0678927787d914f9b8b697351939->enter($__internal_ff5e9356fa757e9c93a1973d16bba25a41ef0678927787d914f9b8b697351939_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "default/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ff5e9356fa757e9c93a1973d16bba25a41ef0678927787d914f9b8b697351939->leave($__internal_ff5e9356fa757e9c93a1973d16bba25a41ef0678927787d914f9b8b697351939_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_1274b5052ea07a350dac93393fa036b43b5d26cc2b00845b0213e2fb7ace1ba8 = $this->env->getExtension("native_profiler");
        $__internal_1274b5052ea07a350dac93393fa036b43b5d26cc2b00845b0213e2fb7ace1ba8->enter($__internal_1274b5052ea07a350dac93393fa036b43b5d26cc2b00845b0213e2fb7ace1ba8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Accueil";
        
        $__internal_1274b5052ea07a350dac93393fa036b43b5d26cc2b00845b0213e2fb7ace1ba8->leave($__internal_1274b5052ea07a350dac93393fa036b43b5d26cc2b00845b0213e2fb7ace1ba8_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_b23cfdd2a5f85dd2672e8d754a4ce5d9d17f60cd550ee8ca659e25b6be6c542b = $this->env->getExtension("native_profiler");
        $__internal_b23cfdd2a5f85dd2672e8d754a4ce5d9d17f60cd550ee8ca659e25b6be6c542b->enter($__internal_b23cfdd2a5f85dd2672e8d754a4ce5d9d17f60cd550ee8ca659e25b6be6c542b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<h1>Liste des jeux</h1>

<ul>
";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["games"]) ? $context["games"] : $this->getContext($context, "games")));
        foreach ($context['_seq'] as $context["_key"] => $context["game"]) {
            // line 10
            echo "\t<li>
\t\t";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($context["game"], "name", array()), "html", null, true);
            echo "
\t\t<ul>
\t\t\t";
            // line 13
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["game"], "modes", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["mode"]) {
                // line 14
                echo "\t\t\t\t<li>
\t\t\t\t\t<a href=\"";
                // line 15
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("wait", array("gameName" => $this->getAttribute($context["game"], "name", array()), "modeId" => $this->getAttribute($context["mode"], "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["mode"], "name", array()), "html", null, true);
                echo "</a>
\t\t\t\t</li>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mode'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "\t\t</ul>
\t</li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['game'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "</ul>

";
        
        $__internal_b23cfdd2a5f85dd2672e8d754a4ce5d9d17f60cd550ee8ca659e25b6be6c542b->leave($__internal_b23cfdd2a5f85dd2672e8d754a4ce5d9d17f60cd550ee8ca659e25b6be6c542b_prof);

    }

    public function getTemplateName()
    {
        return "default/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 21,  88 => 18,  77 => 15,  74 => 14,  70 => 13,  65 => 11,  62 => 10,  58 => 9,  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }
}
/* {% extends "::base.html.twig" %}*/
/* */
/* {% block title %}Accueil{% endblock %}*/
/* */
/* {% block body %}*/
/* <h1>Liste des jeux</h1>*/
/* */
/* <ul>*/
/* {% for game in games %}*/
/* 	<li>*/
/* 		{{ game.name }}*/
/* 		<ul>*/
/* 			{% for mode in game.modes %}*/
/* 				<li>*/
/* 					<a href="{{ path('wait', {'gameName': game.name, 'modeId': mode.id}) }}">{{ mode.name }}</a>*/
/* 				</li>*/
/* 			{% endfor %}*/
/* 		</ul>*/
/* 	</li>*/
/* {% endfor %}*/
/* </ul>*/
/* */
/* {% endblock %}*/
/* */
