<?php

/* AcmeStudyBundle:Menu:menu.html.twig */
class __TwigTemplate_b87f5fdb88b1cddbb94a898cd04891b0 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<div id=\"mainmenu\">
  <ul>
    <a href=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("hello", array("name" => "mark")), "html");
        echo "\"><li id=\"btnHome\">Home</li></a>
    <a href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("about"), "html");
        echo "\"><li id=\"btnAbout\">About</li></a>
    <a href=\"#\"><li id=\"btnGroups\">Groups</li></a>
    <a href=\"#\"><li id=\"btnMessages\">Messages</li></a>
    <a href=\"#\"><li id=\"btnLogout\">Logout</li></a>
  </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "AcmeStudyBundle:Menu:menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
