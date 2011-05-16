<?php

/* FOSUserBundle:User:requestResetPassword.html.twig */
class __TwigTemplate_30a21a16b6c2cff340b9ecbc934860ec extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("FOSUserBundle::layout.html.twig");
        }

        return $this->parent;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        $this->env->loadTemplate("FOSUserBundle:User:requestResetPassword_content.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:User:requestResetPassword.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
