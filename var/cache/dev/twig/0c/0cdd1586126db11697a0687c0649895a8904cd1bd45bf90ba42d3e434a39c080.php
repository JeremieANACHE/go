<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_fae94ad73ffa3ac2984c8a6e15c4fb17c75ec204185fb4477f8c995e8bc1f824 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f84fa190f8d708297e1164b4d77b9d652350108aeec025f0eb075e77a20a85e4 = $this->env->getExtension("native_profiler");
        $__internal_f84fa190f8d708297e1164b4d77b9d652350108aeec025f0eb075e77a20a85e4->enter($__internal_f84fa190f8d708297e1164b4d77b9d652350108aeec025f0eb075e77a20a85e4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f84fa190f8d708297e1164b4d77b9d652350108aeec025f0eb075e77a20a85e4->leave($__internal_f84fa190f8d708297e1164b4d77b9d652350108aeec025f0eb075e77a20a85e4_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_0e98903577ed89720fa00109e5903ae5482fffa496b783ab27ba6c417abc54c7 = $this->env->getExtension("native_profiler");
        $__internal_0e98903577ed89720fa00109e5903ae5482fffa496b783ab27ba6c417abc54c7->enter($__internal_0e98903577ed89720fa00109e5903ae5482fffa496b783ab27ba6c417abc54c7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_0e98903577ed89720fa00109e5903ae5482fffa496b783ab27ba6c417abc54c7->leave($__internal_0e98903577ed89720fa00109e5903ae5482fffa496b783ab27ba6c417abc54c7_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_9714c0f149e5a1d75c1c9c325a5195e433e2b538fe30dd7edc122975d310d128 = $this->env->getExtension("native_profiler");
        $__internal_9714c0f149e5a1d75c1c9c325a5195e433e2b538fe30dd7edc122975d310d128->enter($__internal_9714c0f149e5a1d75c1c9c325a5195e433e2b538fe30dd7edc122975d310d128_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_9714c0f149e5a1d75c1c9c325a5195e433e2b538fe30dd7edc122975d310d128->leave($__internal_9714c0f149e5a1d75c1c9c325a5195e433e2b538fe30dd7edc122975d310d128_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_0c5f1ffb69bb6fb4e5481b77f86da9ee04cf0c8984c6ded42be7c42a1ae90d59 = $this->env->getExtension("native_profiler");
        $__internal_0c5f1ffb69bb6fb4e5481b77f86da9ee04cf0c8984c6ded42be7c42a1ae90d59->enter($__internal_0c5f1ffb69bb6fb4e5481b77f86da9ee04cf0c8984c6ded42be7c42a1ae90d59_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_0c5f1ffb69bb6fb4e5481b77f86da9ee04cf0c8984c6ded42be7c42a1ae90d59->leave($__internal_0c5f1ffb69bb6fb4e5481b77f86da9ee04cf0c8984c6ded42be7c42a1ae90d59_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
