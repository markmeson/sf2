<?php

/* FOSUserBundle::layout.html.twig */
class __TwigTemplate_8eab5b990e65b32177ba48b3a864a6b4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
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
    </head>
    <body>
        <div>
            ";
        // line 8
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 9
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_user_show", array("username" => $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "user", array(), "any", false), "username", array(), "any", false))), "html");
            echo "\">
                    ";
            // line 10
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logged_in_as", array("%username%" => $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "user", array(), "any", false), "username", array(), "any", false)), "FOSUserBundle"), "html");
            echo "
                </a> |
                <a href=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_security_logout"), "html");
            echo "\">
                    ";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "FOSUserBundle"), "html");
            echo "
                </a>
            ";
        } else {
            // line 16
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_security_login"), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.login", array(), "FOSUserBundle"), "html");
            echo "</a> |
                <a href=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_user_new"), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.register", array(), "FOSUserBundle"), "html");
            echo "</a>
            ";
        }
        // line 19
        echo "        </div>

        ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "getFlashes", array(), "method", false));
        foreach ($context['_seq'] as $context['key'] => $context['flash']) {
            // line 22
            echo "        <div class=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, 'flash'), "html");
            echo "\">
            ";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, 'key'), array(), "FOSUserBundle"), "html");
            echo "
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['flash'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 26
        echo "
        <div>
            ";
        // line 28
        $this->displayBlock('content', $context, $blocks);
        // line 30
        echo "        </div>
    </body>
</html>
";
    }

    // line 28
    public function block_content($context, array $blocks = array())
    {
        // line 29
        echo "            ";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
