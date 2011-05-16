<?php

/* AcmeStoreBundle:Default:index.html.twig */
class __TwigTemplate_dc0a47325f507f7c2555686ed500e980 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
        echo "What Digs - Login
";
    }

    // line 8
    public function block_mainblock($context, array $blocks = array())
    {
        // line 9
        if ($this->getContext($context, 'error')) {
            // line 10
            echo "    <div>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'error'), "message", array(), "any", false), "html");
            echo "</div>
";
        }
        // line 12
        echo "
<form action=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_security_check"), "html");
        echo "\" method=\"post\">
    <label for=\"username\">Username:</label>
    <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getContext($context, 'last_username'), "html");
        echo "\" />

    <label for=\"password\">Password:</label>
    <input type=\"password\" id=\"password\" name=\"_password\" />

    ";
        // line 24
        echo "
    <input type=\"submit\" name=\"login\" />
</form>
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
