<?php

use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       '_wdt' => true,
       '_profiler_search' => true,
       '_profiler_purge' => true,
       '_profiler_import' => true,
       '_profiler_export' => true,
       '_profiler_search_results' => true,
       '_profiler' => true,
       '_configurator_home' => true,
       '_configurator_step' => true,
       '_configurator_final' => true,
       '_welcome' => true,
       '_demo_login' => true,
       '_security_check' => true,
       '_demo_logout' => true,
       'acme_demo_secured_hello' => true,
       '_demo_secured_hello' => true,
       '_demo_secured_hello_admin' => true,
       '_demo' => true,
       '_demo_hello' => true,
       '_demo_contact' => true,
       'hello' => true,
       'about' => true,
       '_security_login' => true,
       '_security_logout' => true,
       'fos_user_user_list' => true,
       'fos_user_user_new' => true,
       'fos_user_user_check_confirmation_email' => true,
       'fos_user_user_confirm' => true,
       'fos_user_user_confirmed' => true,
       'fos_user_user_change_password' => true,
       'fos_user_user_change_password_update' => true,
       'fos_user_user_request_reset_password' => true,
       'fos_user_user_send_resetting_email' => true,
       'fos_user_user_check_resetting_email' => true,
       'fos_user_user_reset_password' => true,
       'fos_user_user_reset_password_update' => true,
       'fos_user_user_show' => true,
       'fos_user_user_edit' => true,
       'fos_user_user_delete' => true,
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function generate($name, array $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRouteNames[$name])) {
            throw new \InvalidArgumentException(sprintf('Route "%s" does not exist.', $name));
        }

        $escapedName = str_replace('.', '__', $name);

        list($variables, $defaults, $requirements, $tokens) = $this->{'get'.$escapedName.'RouteInfo'}();

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }

    private function get_wdtRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]*?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_wdt',  ),));
    }

    private function get_profiler_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/search',  ),));
    }

    private function get_profiler_purgeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/purge',  ),));
    }

    private function get_profiler_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/import',  ),));
    }

    private function get_profiler_exportRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '.txt',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]*?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler/export',  ),));
    }

    private function get_profiler_search_resultsRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/results',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]*?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_profilerRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]*?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_configurator_homeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebConfiguratorBundle\\Controller\\ConfiguratorController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/',  ),));
    }

    private function get_configurator_stepRouteInfo()
    {
        return array(array (  0 => 'index',), array (  '_controller' => 'Symfony\\Bundle\\WebConfiguratorBundle\\Controller\\ConfiguratorController::stepAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]*?',    3 => 'index',  ),  1 =>   array (    0 => 'text',    1 => '/_configurator/step',  ),));
    }

    private function get_configurator_finalRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebConfiguratorBundle\\Controller\\ConfiguratorController::finalAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/final',  ),));
    }

    private function get_welcomeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function get_demo_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/login',  ),));
    }

    private function get_security_checkRouteInfo()
    {
        return array(array (), array (  '_controller' => 'fos_user.controller.security:loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/login_check',  ),));
    }

    private function get_demo_logoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/logout',  ),));
    }

    private function getacme_demo_secured_helloRouteInfo()
    {
        return array(array (), array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/hello',  ),));
    }

    private function get_demo_secured_helloRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]*?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/secured/hello',  ),));
    }

    private function get_demo_secured_hello_adminRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]*?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/secured/hello/admin',  ),));
    }

    private function get_demoRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/',  ),));
    }

    private function get_demo_helloRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]*?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/hello',  ),));
    }

    private function get_demo_contactRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/contact',  ),));
    }

    private function gethelloRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\StudyBundle\\Controller\\HelloController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]*?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/hello',  ),));
    }

    private function getaboutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\StudyBundle\\Controller\\AboutController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/about',  ),));
    }

    private function get_security_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'fos_user.controller.security:loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/login',  ),));
    }

    private function get_security_logoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'fos_user.controller.security:logoutAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/logout',  ),));
    }

    private function getfos_user_user_listRouteInfo()
    {
        return array(array (), array (  '_controller' => 'fos_user.controller.user:listAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/user/list',  ),));
    }

    private function getfos_user_user_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'fos_user.controller.user:newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/user/new',  ),));
    }

    private function getfos_user_user_check_confirmation_emailRouteInfo()
    {
        return array(array (), array (  '_controller' => 'fos_user.controller.user:checkConfirmationEmailAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/user/check-confirmation-email',  ),));
    }

    private function getfos_user_user_confirmRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'fos_user.controller.user:confirmAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]*?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/user/confirm',  ),));
    }

    private function getfos_user_user_confirmedRouteInfo()
    {
        return array(array (), array (  '_controller' => 'fos_user.controller.user:confirmedAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/user/confirmed',  ),));
    }

    private function getfos_user_user_change_passwordRouteInfo()
    {
        return array(array (), array (  '_controller' => 'fos_user.controller.user:changePasswordAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/user/change-password',  ),));
    }

    private function getfos_user_user_change_password_updateRouteInfo()
    {
        return array(array (), array (  '_controller' => 'fos_user.controller.user:changePasswordUpdateAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/user/change-password',  ),));
    }

    private function getfos_user_user_request_reset_passwordRouteInfo()
    {
        return array(array (), array (  '_controller' => 'fos_user.controller.user:requestResetPasswordAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/user/request-reset-password',  ),));
    }

    private function getfos_user_user_send_resetting_emailRouteInfo()
    {
        return array(array (), array (  '_controller' => 'fos_user.controller.user:sendResettingEmailAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/user/send-resetting-email',  ),));
    }

    private function getfos_user_user_check_resetting_emailRouteInfo()
    {
        return array(array (), array (  '_controller' => 'fos_user.controller.user:checkResettingEmailAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/user/check-resetting-email',  ),));
    }

    private function getfos_user_user_reset_passwordRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'fos_user.controller.user:resetPasswordAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]*?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/user/reset-password',  ),));
    }

    private function getfos_user_user_reset_password_updateRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'fos_user.controller.user:resetPasswordUpdateAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]*?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/user/reset-password',  ),));
    }

    private function getfos_user_user_showRouteInfo()
    {
        return array(array (  0 => 'username',), array (  '_controller' => 'fos_user.controller.user:showAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]*?',    3 => 'username',  ),  1 =>   array (    0 => 'text',    1 => '/user',  ),));
    }

    private function getfos_user_user_editRouteInfo()
    {
        return array(array (  0 => 'username',), array (  '_controller' => 'fos_user.controller.user:editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]*?',    3 => 'username',  ),  2 =>   array (    0 => 'text',    1 => '/user',  ),));
    }

    private function getfos_user_user_deleteRouteInfo()
    {
        return array(array (  0 => 'username',), array (  '_controller' => 'fos_user.controller.user:deleteAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]*?',    3 => 'username',  ),  2 =>   array (    0 => 'text',    1 => '/user',  ),));
    }
}
