<?php

/* FOSUserBundle::layout.html.twig */
class __TwigTemplate_73fc701c3e038ef2f279edc54dead289 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
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
    public function block_mainblock($context, array $blocks = array())
    {
        // line 4
        echo "
            ";
        // line 5
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 6
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_user_show", array("username" => $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "user", array(), "any", false), "username", array(), "any", false))), "html");
            echo "\">
                    ";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logged_in_as", array("%username%" => $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "user", array(), "any", false), "username", array(), "any", false)), "FOSUserBundle"), "html");
            echo "
                </a> |
                <a href=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_security_logout"), "html");
            echo "\">
                    ";
            // line 10
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "FOSUserBundle"), "html");
            echo "
                </a>
            ";
        } else {
            // line 13
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_security_login"), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.login", array(), "FOSUserBundle"), "html");
            echo "</a> |
                <a href=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_user_new"), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.register", array(), "FOSUserBundle"), "html");
            echo "</a>
            ";
        }
        // line 16
        echo "
        ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "getFlashes", array(), "method", false));
        foreach ($context['_seq'] as $context['key'] => $context['flash']) {
            // line 18
            echo "        <div class=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, 'flash'), "html");
            echo "\">
            ";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, 'key'), array(), "FOSUserBundle"), "html");
            echo "
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['flash'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 22
        echo "
";
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
