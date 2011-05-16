<?php

/* AcmeStudyBundle:Hello:index.html.twig */
class __TwigTemplate_db46c679db038a18f45fbba4892811f3 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("::layout.html.twig");
        }

        return $this->parent;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "\tCustomizing the Title!
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "\tHello ";
        echo twig_escape_filter($this->env, (isset($context['name']) ? $context['name'] : null), "html");
        echo "!
";
    }

    public function getTemplateName()
    {
        return "AcmeStudyBundle:Hello:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
