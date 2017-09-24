<?php

/* FOSUserBundle:Registration:register.html.twig */
class __TwigTemplate_92e3ab59e672ec8a51594d6d9690cd13294cd1c6c4d120bce649ced8941c6443 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Registration:register.html.twig", 1);
        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_674b56cea3e8c25ecc34e652a14f0d77ec6a0265460608222f9adaf59aa0d01c = $this->env->getExtension("native_profiler");
        $__internal_674b56cea3e8c25ecc34e652a14f0d77ec6a0265460608222f9adaf59aa0d01c->enter($__internal_674b56cea3e8c25ecc34e652a14f0d77ec6a0265460608222f9adaf59aa0d01c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Registration:register.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_674b56cea3e8c25ecc34e652a14f0d77ec6a0265460608222f9adaf59aa0d01c->leave($__internal_674b56cea3e8c25ecc34e652a14f0d77ec6a0265460608222f9adaf59aa0d01c_prof);

    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_4590008fdab081449cb8eed7b86e5e2dfbe14af9fcefed208832fd484bc2992a = $this->env->getExtension("native_profiler");
        $__internal_4590008fdab081449cb8eed7b86e5e2dfbe14af9fcefed208832fd484bc2992a->enter($__internal_4590008fdab081449cb8eed7b86e5e2dfbe14af9fcefed208832fd484bc2992a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 4
        $this->loadTemplate("FOSUserBundle:Registration:register_content.html.twig", "FOSUserBundle:Registration:register.html.twig", 4)->display($context);
        
        $__internal_4590008fdab081449cb8eed7b86e5e2dfbe14af9fcefed208832fd484bc2992a->leave($__internal_4590008fdab081449cb8eed7b86e5e2dfbe14af9fcefed208832fd484bc2992a_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends "FOSUserBundle::layout.html.twig" %}*/
/* */
/* {% block fos_user_content %}*/
/* {% include "FOSUserBundle:Registration:register_content.html.twig" %}*/
/* {% endblock fos_user_content %}*/
/* */
