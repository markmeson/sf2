<?php

/* AcmeStudyBundle:Hello:index.html.twig */
class __TwigTemplate_db46c679db038a18f45fbba4892811f3 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'mainblock' => array($this, 'block_mainblock'),
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
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('templating')->getAssetUrl("css/home.css"), "html");
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        // line 8
        echo "\tWhat Digs - Social Network
";
    }

    // line 21
    public function block_mainblock($context, array $blocks = array())
    {
        // line 22
        echo "
\t\tThis shows up if the content block is not used.
\t\t";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo "
\t<div id=\"logo\"></div>
\t<div id=\"banner\"></div>
\t<div id=\"sidepanel\">
\t\t";
        // line 16
        $this->env->loadTemplate("AcmeStudyBundle:Menu:menu.html.twig")->display($context);
        // line 17
        echo "\t</div>
\t
\t<div id=\"mainblock\">
\t\t<br /><br />
\t\t";
        // line 21
        $this->displayBlock('mainblock', $context, $blocks);
        // line 25
        echo "\t</div>
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
