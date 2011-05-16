<?php

/* FOSUserBundle:User:requestResetPassword_content.html.twig */
class __TwigTemplate_e5ffa4d2dfcab1d294920b988c43d9a9 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_user_send_resetting_email"), "html");
        echo "\" method=\"POST\" class=\"fos_user_user_request_reset_password\">
    <div>
        <label for=\"username\">";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("user.password_request_reset.username", array(), "FOSUserBundle"), "html");
        echo "</label>
        <input type=\"text\" id=\"username\" name=\"username\" />
    </div>
    <div>
        <input type=\"submit\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("user.password_request_reset.submit", array(), "FOSUserBundle"), "html");
        echo "\" />
    </div>
</form>";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:User:requestResetPassword_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
