<?php

/* ::layout.html.twig */
class __TwigTemplate_2bcff1da603cfc56d34a7e00f958326a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
\t<link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('templating')->getAssetUrl("css/main.css"), "html");
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
\t<title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t";
        // line 7
        $this->displayBlock('head', $context, $blocks);
        // line 8
        echo "    </head>
    <body>
\t";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Hello Application";
    }

    // line 7
    public function block_head($context, array $blocks = array())
    {
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
