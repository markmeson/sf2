<?php

/* AcmeStudyBundle:About:index.html.twig */
class __TwigTemplate_75c7bf472abd6d9ce3730491e62bf76b extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'mainblock' => array($this, 'block_mainblock'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("AcmeStudyBundle:Hello:index.html.twig");
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
        echo "What Digs - Hello!
";
    }

    // line 7
    public function block_head($context, array $blocks = array())
    {
        // line 8
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('templating')->getAssetUrl("css/about.css"), "html");
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 11
    public function block_mainblock($context, array $blocks = array())
    {
        // line 12
        echo "  Welcome to the about page!
";
    }

    public function getTemplateName()
    {
        return "AcmeStudyBundle:About:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
