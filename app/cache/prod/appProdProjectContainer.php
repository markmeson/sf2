<?php
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InactiveScopeException;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Parameter;
class appProdProjectContainer extends Container
{
    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();
        $this->services =
        $this->scopedServices =
        $this->scopeStacks = array();
        $this->set('service_container', $this);
        $this->scopes = array('request' => 'container');
        $this->scopeChildren = array('request' => array());
    }
    protected function getAcme_Demo_ListenerService()
    {
        return $this->services['acme.demo.listener'] = new \Acme\DemoBundle\ControllerListener($this->get('twig.extension.acme.demo'));
    }
    protected function getAnnotations_Cache_ArrayService()
    {
        return new \Doctrine\Common\Cache\ArrayCache();
    }
    protected function getAnnotations_ConfigurationReaderService()
    {
        return $this->services['annotations.configuration_reader'] = new \Sensio\Bundle\FrameworkExtraBundle\Configuration\AnnotationReader(new \Doctrine\Common\Cache\ArrayCache(), $this->get('annotations.parser'));
    }
    protected function getAnnotations_ControllerParserService()
    {
        return $this->services['annotations.controller_parser'] = new \Sensio\Bundle\FrameworkExtraBundle\Controller\ControllerAnnotationParser($this->get('annotations.configuration_reader'));
    }
    protected function getAnnotations_ParserService()
    {
        $this->services['annotations.parser'] = $instance = new \Doctrine\Common\Annotations\Parser();
        $instance->setAutoloadAnnotations(true);
        $instance->setAnnotationNamespaceAlias('Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\', 'extra');
        return $instance;
    }
    protected function getAnnotations_ReaderService()
    {
        return $this->services['annotations.reader'] = new \Doctrine\Common\Annotations\AnnotationReader(new \Doctrine\Common\Cache\ArrayCache(), $this->get('annotations.parser'));
    }
    protected function getAssetic_AssetManagerService()
    {
        $a = $this->get('templating.loader');
        $this->services['assetic.asset_manager'] = $instance = new \Assetic\Factory\LazyAssetManager($this->get('assetic.asset_factory'), array('twig' => new \Assetic\Factory\Loader\CachedFormulaLoader(new \Assetic\Extension\Twig\TwigFormulaLoader($this->get('twig')), new \Assetic\Cache\ConfigCache('/var/www/Symfony/app/cache/prod/assetic/config'), false)));
        $instance->addResource(new \Assetic\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'FrameworkBundle', '/var/www/Symfony/app/Resources/FrameworkBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'FrameworkBundle', '/var/www/Symfony/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Assetic\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SecurityBundle', '/var/www/Symfony/app/Resources/SecurityBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SecurityBundle', '/var/www/Symfony/vendor/symfony/src/Symfony/Bundle/SecurityBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Assetic\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'TwigBundle', '/var/www/Symfony/app/Resources/TwigBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'TwigBundle', '/var/www/Symfony/vendor/symfony/src/Symfony/Bundle/TwigBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Assetic\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'MonologBundle', '/var/www/Symfony/app/Resources/MonologBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'MonologBundle', '/var/www/Symfony/vendor/symfony/src/Symfony/Bundle/MonologBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Assetic\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SwiftmailerBundle', '/var/www/Symfony/app/Resources/SwiftmailerBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SwiftmailerBundle', '/var/www/Symfony/vendor/symfony/src/Symfony/Bundle/SwiftmailerBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Assetic\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'DoctrineBundle', '/var/www/Symfony/app/Resources/DoctrineBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'DoctrineBundle', '/var/www/Symfony/vendor/symfony/src/Symfony/Bundle/DoctrineBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Assetic\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'AsseticBundle', '/var/www/Symfony/app/Resources/AsseticBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'AsseticBundle', '/var/www/Symfony/vendor/symfony/src/Symfony/Bundle/AsseticBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Assetic\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SensioFrameworkExtraBundle', '/var/www/Symfony/app/Resources/SensioFrameworkExtraBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SensioFrameworkExtraBundle', '/var/www/Symfony/vendor/bundles/Sensio/Bundle/FrameworkExtraBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Assetic\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'JMSSecurityExtraBundle', '/var/www/Symfony/app/Resources/JMSSecurityExtraBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'JMSSecurityExtraBundle', '/var/www/Symfony/vendor/bundles/JMS/SecurityExtraBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Assetic\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'AcmeDemoBundle', '/var/www/Symfony/app/Resources/AcmeDemoBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'AcmeDemoBundle', '/var/www/Symfony/src/Acme/DemoBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Assetic\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'AcmeStudyBundle', '/var/www/Symfony/app/Resources/AcmeStudyBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'AcmeStudyBundle', '/var/www/Symfony/src/Acme/StudyBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, '', '/var/www/Symfony/app/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'), 'twig');
        return $instance;
    }
    protected function getAssetic_Filter_CssrewriteService()
    {
        return $this->services['assetic.filter.cssrewrite'] = new \Assetic\Filter\CssRewriteFilter();
    }
    protected function getAssetic_FilterManagerService()
    {
        return $this->services['assetic.filter_manager'] = new \Symfony\Bundle\AsseticBundle\FilterManager($this, array('cssrewrite' => 'assetic.filter.cssrewrite'));
    }
    protected function getCache_AnnotationService()
    {
        return $this->services['cache.annotation'] = new \Sensio\Bundle\FrameworkExtraBundle\Cache\AnnotationCacheListener();
    }
    protected function getCacheWarmerService()
    {
        return $this->services['cache_warmer'] = new \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate(array(0 => new \Symfony\Bundle\AsseticBundle\CacheWarmer\AssetManagerCacheWarmer($this), 1 => new \Symfony\Bundle\FrameworkBundle\CacheWarmer\RouterCacheWarmer($this->get('router.real')), 2 => new \Symfony\Bundle\DoctrineBundle\CacheWarmer\ProxyCacheWarmer($this), 3 => new \Symfony\Bundle\AsseticBundle\CacheWarmer\AssetWriterCacheWarmer($this, new \Assetic\AssetWriter('/var/www/Symfony/app/../web'))));
    }
    protected function getConverter_Doctrine_Mongodb_OdmService()
    {
        return $this->services['converter.doctrine.mongodb.odm'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter(NULL);
    }
    protected function getConverter_Doctrine_OrmService()
    {
        return $this->services['converter.doctrine.orm'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getConverter_ListenerService()
    {
        return $this->services['converter.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\Controller\ParamConverterListener($this->get('converter.manager'));
    }
    protected function getConverter_ManagerService()
    {
        $this->services['converter.manager'] = $instance = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager(array());
        $instance->add($this->get('converter.doctrine.orm'), 0);
        $instance->add($this->get('converter.doctrine.mongodb.odm'), 0);
        return $instance;
    }
    protected function getDoctrine_Dbal_ConnectionFactoryService()
    {
        return $this->services['doctrine.dbal.connection_factory'] = new \Symfony\Bundle\DoctrineBundle\ConnectionFactory(array());
    }
    protected function getDoctrine_Dbal_DefaultConnectionService()
    {
        return $this->services['doctrine.dbal.default_connection'] = $this->get('doctrine.dbal.connection_factory')->createConnection(array('dbname' => 'symfony', 'host' => 'localhost', 'user' => 'mark', 'password' => 'i0r3I)R#', 'driver' => 'pdo_sqlite', 'port' => NULL, 'logging' => false, 'driverOptions' => array()), $this->get('doctrine.dbal.default_connection.configuration'), $this->get('doctrine.dbal.default_connection.event_manager'));
    }
    protected function getDoctrine_Dbal_DefaultConnection_ConfigurationService()
    {
        return $this->services['doctrine.dbal.default_connection.configuration'] = new \Doctrine\DBAL\Configuration();
    }
    protected function getDoctrine_Dbal_DefaultConnection_EventManagerService()
    {
        return $this->services['doctrine.dbal.default_connection.event_manager'] = new \Doctrine\Common\EventManager();
    }
    protected function getDoctrine_Orm_DefaultConfigurationService()
    {
        $a = new \Doctrine\Common\Cache\ArrayCache();
        $a->setNamespace('sf2orm_default_0238367f698cf338d71f2caaff0015d1');
        $b = new \Doctrine\Common\Cache\ArrayCache();
        $b->setNamespace('sf2orm_default_0238367f698cf338d71f2caaff0015d1');
        $c = new \Doctrine\Common\Cache\ArrayCache();
        $c->setNamespace('sf2orm_default_0238367f698cf338d71f2caaff0015d1');
        $this->services['doctrine.orm.default_configuration'] = $instance = new \Doctrine\ORM\Configuration();
        $instance->setEntityNamespaces(array());
        $instance->setMetadataCacheImpl($a);
        $instance->setQueryCacheImpl($b);
        $instance->setResultCacheImpl($c);
        $instance->setMetadataDriverImpl(new \Doctrine\ORM\Mapping\Driver\DriverChain());
        $instance->setProxyDir('/var/www/Symfony/app/cache/prod/doctrine/orm/Proxies');
        $instance->setProxyNamespace('Proxies');
        $instance->setAutoGenerateProxyClasses(false);
        $instance->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
        return $instance;
    }
    protected function getDoctrine_Orm_DefaultEntityManagerService()
    {
        return $this->services['doctrine.orm.default_entity_manager'] = call_user_func(array('Doctrine\\ORM\\EntityManager', 'create'), $this->get('doctrine.dbal.default_connection'), $this->get('doctrine.orm.default_configuration'));
    }
    protected function getErrorHandlerService()
    {
        return $this->services['error_handler'] = new \Symfony\Component\HttpKernel\Debug\ErrorHandler('');
    }
    protected function getEventDispatcherService()
    {
        $this->services['event_dispatcher'] = $instance = new \Symfony\Bundle\FrameworkBundle\ContainerAwareEventDispatcher($this);
        $instance->addListenerService('onCoreRequest', 'request_listener', 0);
        $instance->addListenerService('onCoreResponse', 'response_listener', 0);
        $instance->addListenerService('onCoreException', 'exception_listener', -128);
        $instance->addListenerService('onCoreRequest', 'security.firewall', -128);
        $instance->addListenerService('onCoreResponse', 'security.rememberme.response_listener', 0);
        $instance->addListenerService('onCoreController', 'annotations.controller_parser', 0);
        $instance->addListenerService('onCoreController', 'converter.listener', 0);
        $instance->addListenerService('onCoreController', 'view.template_annotation', 0);
        $instance->addListenerService('onCoreView', 'view.template_annotation', 0);
        $instance->addListenerService('onCoreResponse', 'cache.annotation', 0);
        $instance->addListenerService('onCoreController', 'security.extra.controller_listener', -255);
        $instance->addListenerService('onCoreController', 'acme.demo.listener', 0);
        return $instance;
    }
    protected function getExceptionListenerService()
    {
        return $this->services['exception_listener'] = new \Symfony\Component\HttpKernel\Debug\ExceptionListener('Symfony\\Bundle\\FrameworkBundle\\Controller\\ExceptionController::showAction', $this->get('monolog.logger.request'));
    }
    protected function getFile_TemporaryStorageService()
    {
        return $this->services['file.temporary_storage'] = new \Symfony\Component\HttpFoundation\File\SessionBasedTemporaryStorage($this->get('session'), '88d40b7e910f589c10e5d1048508214b3b', '/var/www/Symfony/app/cache/prod/upload');
    }
    protected function getFileLocatorService()
    {
        return $this->services['file_locator'] = new \Symfony\Component\HttpKernel\Config\FileLocator($this->get('kernel'), '/var/www/Symfony/app/Resources');
    }
    protected function getFilesystemService()
    {
        return $this->services['filesystem'] = new \Symfony\Component\HttpKernel\Util\Filesystem();
    }
    protected function getForm_CsrfProviderService()
    {
        return $this->services['form.csrf_provider'] = new \Symfony\Component\Form\Extension\Csrf\CsrfProvider\SessionCsrfProvider($this->get('session'), '88d40b7e910f589c10e5d1048508214b3b');
    }
    protected function getForm_FactoryService()
    {
        return $this->services['form.factory'] = new \Symfony\Component\Form\FormFactory(array(0 => new \Symfony\Component\Form\Extension\DependencyInjection\DependencyInjectionExtension($this, array('field' => 'form.type.field', 'form' => 'form.type.form', 'birthday' => 'form.type.birthday', 'checkbox' => 'form.type.checkbox', 'choice' => 'form.type.choice', 'collection' => 'form.type.collection', 'country' => 'form.type.country', 'date' => 'form.type.date', 'datetime' => 'form.type.datetime', 'email' => 'form.type.email', 'file' => 'form.type.file', 'hidden' => 'form.type.hidden', 'integer' => 'form.type.integer', 'language' => 'form.type.language', 'locale' => 'form.type.locale', 'money' => 'form.type.money', 'number' => 'form.type.number', 'password' => 'form.type.password', 'percent' => 'form.type.percent', 'radio' => 'form.type.radio', 'repeated' => 'form.type.repeated', 'textarea' => 'form.type.textarea', 'text' => 'form.type.text', 'time' => 'form.type.time', 'timezone' => 'form.type.timezone', 'url' => 'form.type.url', 'csrf' => 'form.type.csrf', 'entity' => 'form.type.entity'), array('field' => array(0 => 'form.type_extension.field'), 'form' => array(0 => 'form.type_extension.csrf')), array(0 => 'form.type_guesser.validator', 1 => 'form.type_guesser.doctrine'))));
    }
    protected function getForm_Type_BirthdayService()
    {
        return $this->services['form.type.birthday'] = new \Symfony\Component\Form\Extension\Core\Type\BirthdayType();
    }
    protected function getForm_Type_CheckboxService()
    {
        return $this->services['form.type.checkbox'] = new \Symfony\Component\Form\Extension\Core\Type\CheckboxType();
    }
    protected function getForm_Type_ChoiceService()
    {
        return $this->services['form.type.choice'] = new \Symfony\Component\Form\Extension\Core\Type\ChoiceType();
    }
    protected function getForm_Type_CollectionService()
    {
        return $this->services['form.type.collection'] = new \Symfony\Component\Form\Extension\Core\Type\CollectionType();
    }
    protected function getForm_Type_CountryService()
    {
        return $this->services['form.type.country'] = new \Symfony\Component\Form\Extension\Core\Type\CountryType();
    }
    protected function getForm_Type_CsrfService()
    {
        return $this->services['form.type.csrf'] = new \Symfony\Component\Form\Extension\Csrf\Type\CsrfType($this->get('form.csrf_provider'));
    }
    protected function getForm_Type_DateService()
    {
        return $this->services['form.type.date'] = new \Symfony\Component\Form\Extension\Core\Type\DateType();
    }
    protected function getForm_Type_DatetimeService()
    {
        return $this->services['form.type.datetime'] = new \Symfony\Component\Form\Extension\Core\Type\DateTimeType();
    }
    protected function getForm_Type_EmailService()
    {
        return $this->services['form.type.email'] = new \Symfony\Component\Form\Extension\Core\Type\EmailType();
    }
    protected function getForm_Type_EntityService()
    {
        return $this->services['form.type.entity'] = new \Symfony\Bridge\Doctrine\Form\Type\EntityType($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getForm_Type_FieldService()
    {
        return $this->services['form.type.field'] = new \Symfony\Component\Form\Extension\Core\Type\FieldType($this->get('validator'));
    }
    protected function getForm_Type_FileService()
    {
        return $this->services['form.type.file'] = new \Symfony\Component\Form\Extension\Core\Type\FileType($this->get('file.temporary_storage'));
    }
    protected function getForm_Type_FormService()
    {
        return $this->services['form.type.form'] = new \Symfony\Component\Form\Extension\Core\Type\FormType();
    }
    protected function getForm_Type_HiddenService()
    {
        return $this->services['form.type.hidden'] = new \Symfony\Component\Form\Extension\Core\Type\HiddenType();
    }
    protected function getForm_Type_IntegerService()
    {
        return $this->services['form.type.integer'] = new \Symfony\Component\Form\Extension\Core\Type\IntegerType();
    }
    protected function getForm_Type_LanguageService()
    {
        return $this->services['form.type.language'] = new \Symfony\Component\Form\Extension\Core\Type\LanguageType();
    }
    protected function getForm_Type_LocaleService()
    {
        return $this->services['form.type.locale'] = new \Symfony\Component\Form\Extension\Core\Type\LocaleType();
    }
    protected function getForm_Type_MoneyService()
    {
        return $this->services['form.type.money'] = new \Symfony\Component\Form\Extension\Core\Type\MoneyType();
    }
    protected function getForm_Type_NumberService()
    {
        return $this->services['form.type.number'] = new \Symfony\Component\Form\Extension\Core\Type\NumberType();
    }
    protected function getForm_Type_PasswordService()
    {
        return $this->services['form.type.password'] = new \Symfony\Component\Form\Extension\Core\Type\PasswordType();
    }
    protected function getForm_Type_PercentService()
    {
        return $this->services['form.type.percent'] = new \Symfony\Component\Form\Extension\Core\Type\PercentType();
    }
    protected function getForm_Type_RadioService()
    {
        return $this->services['form.type.radio'] = new \Symfony\Component\Form\Extension\Core\Type\RadioType();
    }
    protected function getForm_Type_RepeatedService()
    {
        return $this->services['form.type.repeated'] = new \Symfony\Component\Form\Extension\Core\Type\RepeatedType();
    }
    protected function getForm_Type_TextService()
    {
        return $this->services['form.type.text'] = new \Symfony\Component\Form\Extension\Core\Type\TextType();
    }
    protected function getForm_Type_TextareaService()
    {
        return $this->services['form.type.textarea'] = new \Symfony\Component\Form\Extension\Core\Type\TextareaType();
    }
    protected function getForm_Type_TimeService()
    {
        return $this->services['form.type.time'] = new \Symfony\Component\Form\Extension\Core\Type\TimeType();
    }
    protected function getForm_Type_TimezoneService()
    {
        return $this->services['form.type.timezone'] = new \Symfony\Component\Form\Extension\Core\Type\TimezoneType();
    }
    protected function getForm_Type_UrlService()
    {
        return $this->services['form.type.url'] = new \Symfony\Component\Form\Extension\Core\Type\UrlType();
    }
    protected function getForm_TypeExtension_CsrfService()
    {
        return $this->services['form.type_extension.csrf'] = new \Symfony\Component\Form\Extension\Csrf\Type\FormTypeCsrfExtension(true, '_token');
    }
    protected function getForm_TypeExtension_FieldService()
    {
        return $this->services['form.type_extension.field'] = new \Symfony\Component\Form\Extension\Validator\Type\FieldTypeValidatorExtension($this->get('validator'));
    }
    protected function getForm_TypeGuesser_DoctrineService()
    {
        return $this->services['form.type_guesser.doctrine'] = new \Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getForm_TypeGuesser_ValidatorService()
    {
        return $this->services['form.type_guesser.validator'] = new \Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser($this->get('validator.mapping.class_metadata_factory'));
    }
    protected function getHttpKernelService()
    {
        return $this->services['http_kernel'] = new \Symfony\Bundle\FrameworkBundle\HttpKernel($this->get('event_dispatcher'), $this, new \Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver($this, $this->get('controller_name_converter'), $this->get('monolog.logger.request')));
    }
    protected function getKernelService()
    {
        throw new \RuntimeException('You have requested a synthetic service ("kernel"). The DIC does not know how to construct this service.');
    }
    protected function getLoggerService()
    {
        $this->services['logger'] = $instance = new \Symfony\Bundle\MonologBundle\Logger\Logger('app');
        $instance->pushHandler($this->get('monolog.handler.main'));
        return $instance;
    }
    protected function getMailerService()
    {
        require_once '/var/www/Symfony/vendor/swiftmailer/lib/swift_init.php';
        return $this->services['mailer'] = new \Swift_Mailer($this->get('swiftmailer.transport'));
    }
    protected function getMonolog_Handler_MainService()
    {
        return $this->services['monolog.handler.main'] = new \Monolog\Handler\FingersCrossedHandler($this->get('monolog.handler.nested'), 400, 0, false);
    }
    protected function getMonolog_Handler_NestedService()
    {
        return $this->services['monolog.handler.nested'] = new \Monolog\Handler\StreamHandler('/var/www/Symfony/app/logs/prod.log', 100, false);
    }
    protected function getMonolog_Logger_DoctrineService()
    {
        $this->services['monolog.logger.doctrine'] = $instance = new \Symfony\Bundle\MonologBundle\Logger\Logger('doctrine');
        $instance->pushHandler($this->get('monolog.handler.main'));
        return $instance;
    }
    protected function getMonolog_Logger_RequestService()
    {
        $this->services['monolog.logger.request'] = $instance = new \Symfony\Bundle\MonologBundle\Logger\Logger('request');
        $instance->pushHandler($this->get('monolog.handler.main'));
        return $instance;
    }
    protected function getMonolog_Logger_RouterService()
    {
        $this->services['monolog.logger.router'] = $instance = new \Symfony\Bundle\MonologBundle\Logger\Logger('router');
        $instance->pushHandler($this->get('monolog.handler.main'));
        return $instance;
    }
    protected function getMonolog_Logger_SecurityService()
    {
        $this->services['monolog.logger.security'] = $instance = new \Symfony\Bundle\MonologBundle\Logger\Logger('security');
        $instance->pushHandler($this->get('monolog.handler.main'));
        return $instance;
    }
    protected function getRequestService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('request', 'request');
        }
        throw new \RuntimeException('You have requested a synthetic service ("request"). The DIC does not know how to construct this service.');
    }
    protected function getRequestListenerService()
    {
        return $this->services['request_listener'] = new \Symfony\Bundle\FrameworkBundle\RequestListener($this, $this->get('router.real'), 80, 443, $this->get('monolog.logger.request'));
    }
    protected function getResponseListenerService()
    {
        return $this->services['response_listener'] = new \Symfony\Component\HttpKernel\ResponseListener('UTF-8');
    }
    protected function getRouter_CachedService()
    {
        return $this->services['router.cached'] = new \Symfony\Bundle\FrameworkBundle\Routing\CachedRouter('/var/www/Symfony/app/cache/prod', 'appprodUrlMatcher', 'appprodUrlGenerator');
    }
    protected function getRouter_RealService()
    {
        return $this->services['router.real'] = new \Symfony\Component\Routing\Router(new \Symfony\Bundle\FrameworkBundle\Routing\LazyLoader($this, 'routing.loader.real'), '/var/www/Symfony/app/config/routing.yml', array('cache_dir' => '/var/www/Symfony/app/cache/prod', 'debug' => false, 'generator_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator', 'generator_base_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator', 'generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\PhpGeneratorDumper', 'generator_cache_class' => 'appprodUrlGenerator', 'matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher', 'matcher_base_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher', 'matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\PhpMatcherDumper', 'matcher_cache_class' => 'appprodUrlMatcher'));
    }
    protected function getRouting_Loader_RealService()
    {
        $a = $this->get('file_locator');
        $b = $this->get('annotations.reader');
        $c = $this->get('annotations.configuration_reader');
        $d = new \Sensio\Bundle\FrameworkExtraBundle\Routing\AnnotatedRouteControllerLoader($b, $c);
        $d->setRouteAnnotationClass('Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route');
        $d->setRoutesAnnotationClass('Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Routes');
        $e = new \Symfony\Component\Config\Loader\LoaderResolver();
        $e->addLoader(new \Symfony\Component\Routing\Loader\XmlFileLoader($a));
        $e->addLoader(new \Symfony\Component\Routing\Loader\YamlFileLoader($a));
        $e->addLoader(new \Symfony\Component\Routing\Loader\PhpFileLoader($a));
        $e->addLoader(new \Symfony\Component\Routing\Loader\AnnotationGlobLoader($a, $d));
        $e->addLoader(new \Symfony\Component\Routing\Loader\AnnotationDirectoryLoader($a, $d));
        $e->addLoader(new \Symfony\Component\Routing\Loader\AnnotationFileLoader($a, $d));
        $e->addLoader($d);
        return $this->services['routing.loader.real'] = new \Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader($this->get('controller_name_converter'), $this->get('monolog.logger.router'), $e);
    }
    protected function getSecurity_Access_MethodInterceptorService()
    {
        return $this->services['security.access.method_interceptor'] = new \JMS\SecurityExtraBundle\Security\Authorization\Interception\MethodSecurityInterceptor($this->get('security.context'), $this->get('security.authentication.manager'), $this->get('security.access.decision_manager'), new \JMS\SecurityExtraBundle\Security\Authorization\AfterInvocation\AfterInvocationManager(array()), new \JMS\SecurityExtraBundle\Security\Authorization\RunAsManager('RunAsToken', 'ROLE_'), $this->get('logger'));
    }
    protected function getSecurity_ContextService()
    {
        return $this->services['security.context'] = new \Symfony\Component\Security\Core\SecurityContext($this->get('security.authentication.manager'), $this->get('security.access.decision_manager'), false);
    }
    protected function getSecurity_EncoderFactoryService()
    {
        return $this->services['security.encoder_factory'] = new \Symfony\Component\Security\Core\Encoder\EncoderFactory(array('Symfony\\Component\\Security\\Core\\User\\User' => array('class' => 'Symfony\\Component\\Security\\Core\\Encoder\\PlaintextPasswordEncoder', 'arguments' => array(0 => false))));
    }
    protected function getSecurity_Extra_ControllerListenerService()
    {
        return $this->services['security.extra.controller_listener'] = new \JMS\SecurityExtraBundle\Controller\ControllerListener($this);
    }
    protected function getSecurity_FirewallService()
    {
        return $this->services['security.firewall'] = new \Symfony\Component\Security\Http\Firewall(new \Symfony\Bundle\SecurityBundle\Security\FirewallMap($this, array('security.firewall.map.context.profiler' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/_profiler'), 'security.firewall.map.context.wdt' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/_wdt'), 'security.firewall.map.context.login' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/demo/secured/login$'), 'security.firewall.map.context.secured_area' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/demo/secured/'))), $this->get('event_dispatcher'));
    }
    protected function getSecurity_Firewall_Map_Context_LoginService()
    {
        return $this->services['security.firewall.map.context.login'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(), NULL);
    }
    protected function getSecurity_Firewall_Map_Context_ProfilerService()
    {
        return $this->services['security.firewall.map.context.profiler'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(), NULL);
    }
    protected function getSecurity_Firewall_Map_Context_SecuredAreaService()
    {
        $a = $this->get('monolog.logger.security');
        $b = $this->get('security.context');
        $c = $this->get('event_dispatcher');
        $d = $this->get('security.authentication.manager');
        $e = new \Symfony\Component\Security\Http\AccessMap();
        $f = new \Symfony\Component\Security\Http\Firewall\LogoutListener($b, '/demo/secured/logout', '/demo/', NULL);
        $f->addHandler(new \Symfony\Component\Security\Http\Logout\SessionLogoutHandler());
        return $this->services['security.firewall.map.context.secured_area'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => new \Symfony\Component\Security\Http\Firewall\ChannelListener($e, new \Symfony\Component\Security\Http\EntryPoint\RetryAuthenticationEntryPoint(), $a), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($b, array(0 => $this->get('security.user.provider.concrete.in_memory')), 'secured_area', $a, $c), 2 => $f, 3 => new \Symfony\Component\Security\Http\Firewall\UsernamePasswordFormAuthenticationListener($b, $d, new \Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy('migrate'), 'secured_area', array('check_path' => '/demo/secured/login_check', 'login_path' => '/demo/secured/login', 'use_forward' => false, 'always_use_default_target_path' => false, 'default_target_path' => '/', 'target_path_parameter' => '_target_path', 'use_referer' => false, 'failure_path' => NULL, 'failure_forward' => false, 'username_parameter' => '_username', 'password_parameter' => '_password', 'csrf_parameter' => '_csrf_token', 'csrf_page_id' => 'form_login', 'post_only' => true), NULL, NULL, $a, $c), 4 => new \Symfony\Component\Security\Http\Firewall\AccessListener($b, $this->get('security.access.decision_manager'), $e, $d, $a)), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($b, $this->get('security.authentication.trust_resolver'), new \Symfony\Component\Security\Http\EntryPoint\FormAuthenticationEntryPoint($this->get('http_kernel'), '/demo/secured/login', false), NULL, NULL, $a));
    }
    protected function getSecurity_Firewall_Map_Context_WdtService()
    {
        return $this->services['security.firewall.map.context.wdt'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(), NULL);
    }
    protected function getSecurity_Rememberme_ResponseListenerService()
    {
        return $this->services['security.rememberme.response_listener'] = new \Symfony\Bundle\SecurityBundle\ResponseListener();
    }
    protected function getServiceContainerService()
    {
        throw new \RuntimeException('You have requested a synthetic service ("service_container"). The DIC does not know how to construct this service.');
    }
    protected function getSessionService()
    {
        $this->services['session'] = $instance = new \Symfony\Component\HttpFoundation\Session($this->get('session.storage'), 'en');
        $instance->start();
        return $instance;
    }
    protected function getSession_StorageService()
    {
        return $this->services['session.storage'] = new \Symfony\Component\HttpFoundation\SessionStorage\NativeSessionStorage(array('lifetime' => 3600));
    }
    protected function getSwiftmailer_TransportService()
    {
        $this->services['swiftmailer.transport'] = $instance = new \Swift_Transport_EsmtpTransport(new \Swift_Transport_StreamBuffer(new \Swift_StreamFilters_StringReplacementFilterFactory()), array(0 => new \Swift_Transport_Esmtp_AuthHandler(array(0 => new \Swift_Transport_Esmtp_Auth_CramMd5Authenticator(), 1 => new \Swift_Transport_Esmtp_Auth_LoginAuthenticator(), 2 => new \Swift_Transport_Esmtp_Auth_PlainAuthenticator()))), new \Swift_Events_SimpleEventDispatcher());
        $instance->setHost('localhost');
        $instance->setPort(25);
        $instance->setEncryption(NULL);
        $instance->setUsername('');
        $instance->setPassword('');
        $instance->setAuthMode(NULL);
        return $instance;
    }
    protected function getTemplatingService()
    {
        return $this->services['templating'] = new \Symfony\Bundle\TwigBundle\TwigEngine($this->get('twig'), $this->get('templating.name_parser'), $this->get('templating.globals'));
    }
    protected function getTemplating_GlobalsService()
    {
        return $this->services['templating.globals'] = new \Symfony\Bundle\FrameworkBundle\Templating\GlobalVariables($this);
    }
    protected function getTemplating_Helper_ActionsService()
    {
        return $this->services['templating.helper.actions'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\ActionsHelper($this->get('http_kernel'));
    }
    protected function getTemplating_Helper_AssetsService()
    {
        return $this->services['templating.helper.assets'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\AssetsHelper($this->get('request'), array(), NULL, array());
    }
    protected function getTemplating_Helper_CodeService()
    {
        return $this->services['templating.helper.code'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\CodeHelper('', '/var/www/Symfony/app');
    }
    protected function getTemplating_Helper_FormService()
    {
        $a = new \Symfony\Bundle\FrameworkBundle\Templating\PhpEngine($this->get('templating.name_parser'), $this, $this->get('templating.loader'), $this->get('templating.globals'));
        $a->setCharset('UTF-8');
        $a->setHelpers(array('slots' => 'templating.helper.slots', 'assets' => 'templating.helper.assets', 'request' => 'templating.helper.request', 'session' => 'templating.helper.session', 'router' => 'templating.helper.router', 'actions' => 'templating.helper.actions', 'code' => 'templating.helper.code', 'translator' => 'templating.helper.translator', 'form' => 'templating.helper.form', 'security' => 'templating.helper.security', 'assetic' => 'assetic.helper.static'));
        return $this->services['templating.helper.form'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper($a);
    }
    protected function getTemplating_Helper_RequestService()
    {
        return $this->services['templating.helper.request'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\RequestHelper($this->get('request'));
    }
    protected function getTemplating_Helper_RouterService()
    {
        return $this->services['templating.helper.router'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper($this->get('router.real'));
    }
    protected function getTemplating_Helper_SecurityService()
    {
        return $this->services['templating.helper.security'] = new \Symfony\Bundle\SecurityBundle\Templating\Helper\SecurityHelper($this->get('security.context'));
    }
    protected function getTemplating_Helper_SessionService()
    {
        return $this->services['templating.helper.session'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\SessionHelper($this->get('request'));
    }
    protected function getTemplating_Helper_SlotsService()
    {
        return $this->services['templating.helper.slots'] = new \Symfony\Component\Templating\Helper\SlotsHelper();
    }
    protected function getTemplating_Helper_TranslatorService()
    {
        return $this->services['templating.helper.translator'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\TranslatorHelper($this->get('translator'));
    }
    protected function getTemplating_LoaderService()
    {
        return $this->services['templating.loader'] = new \Symfony\Bundle\FrameworkBundle\Templating\Loader\FilesystemLoader($this->get('templating.locator'));
    }
    protected function getTemplating_LocatorService()
    {
        return $this->services['templating.locator'] = new \Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator($this->get('file_locator'));
    }
    protected function getTemplating_NameParserService()
    {
        return $this->services['templating.name_parser'] = new \Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser($this->get('kernel'));
    }
    protected function getTranslation_Loader_PhpService()
    {
        return $this->services['translation.loader.php'] = new \Symfony\Component\Translation\Loader\PhpFileLoader();
    }
    protected function getTranslation_Loader_XliffService()
    {
        return $this->services['translation.loader.xliff'] = new \Symfony\Component\Translation\Loader\XliffFileLoader();
    }
    protected function getTranslation_Loader_YmlService()
    {
        return $this->services['translation.loader.yml'] = new \Symfony\Component\Translation\Loader\YamlFileLoader();
    }
    protected function getTranslatorService()
    {
        return $this->services['translator'] = new \Symfony\Component\Translation\IdentityTranslator($this->get('translator.selector'));
    }
    protected function getTranslator_RealService()
    {
        return $this->services['translator.real'] = new \Symfony\Bundle\FrameworkBundle\Translation\Translator($this, $this->get('translator.selector'), array('translation.loader.php' => 'php', 'translation.loader.yml' => 'yml', 'translation.loader.xliff' => 'xliff'), array('cache_dir' => '/var/www/Symfony/app/cache/prod/translations', 'debug' => false), $this->get('session'));
    }
    protected function getTwigService()
    {
        $this->services['twig'] = $instance = new \Twig_Environment($this->get('twig.loader'), array('debug' => false, 'strict_variables' => false, 'cache' => '/var/www/Symfony/app/cache/prod/twig', 'charset' => 'UTF-8'));
        $instance->addExtension(new \Symfony\Bundle\SecurityBundle\Twig\Extension\SecurityExtension($this->get('security.context')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension($this->get('translator')));
        $instance->addExtension(new \Symfony\Bundle\TwigBundle\Extension\TemplatingExtension($this));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\RoutingExtension($this->get('router.real')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\YamlExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\FormExtension(array(0 => 'TwigBundle:Form:div_layout.html.twig')));
        $instance->addExtension(new \Symfony\Bundle\AsseticBundle\Twig\AsseticExtension($this->get('assetic.asset_factory'), false, array()));
        $instance->addExtension($this->get('twig.extension.acme.demo'));
        return $instance;
    }
    protected function getTwig_LoaderService()
    {
        return $this->services['twig.loader'] = new \Symfony\Bundle\TwigBundle\Loader\FilesystemLoader($this->get('templating.locator'), $this->get('templating.name_parser'));
    }
    protected function getValidatorService()
    {
        return $this->services['validator'] = new \Symfony\Component\Validator\Validator($this->get('validator.mapping.class_metadata_factory'), new \Symfony\Bundle\FrameworkBundle\Validator\ConstraintValidatorFactory($this, array()));
    }
    protected function getView_TemplateAnnotationService()
    {
        return $this->services['view.template_annotation'] = new \Sensio\Bundle\FrameworkExtraBundle\View\AnnotationTemplateListener($this);
    }
    protected function getAnnotations_CacheService()
    {
        return $this->get('annotations.cache.array');
    }
    protected function getDatabaseConnectionService()
    {
        return $this->get('doctrine.dbal.default_connection');
    }
    protected function getDoctrine_Orm_EntityManagerService()
    {
        return $this->get('doctrine.orm.default_entity_manager');
    }
    protected function getRouterService()
    {
        return $this->get('router.real');
    }
    protected function getAssetic_AssetFactoryService()
    {
        $this->services['assetic.asset_factory'] = $instance = new \Symfony\Bundle\AsseticBundle\Factory\AssetFactory($this->get('kernel'), '/var/www/Symfony/app/../web', false);
        $instance->setFilterManager($this->get('assetic.filter_manager'));
        return $instance;
    }
    protected function getControllerNameConverterService()
    {
        return $this->services['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser($this->get('kernel'), $this->get('monolog.logger.request'));
    }
    protected function getSecurity_Access_DecisionManagerService()
    {
        return $this->services['security.access.decision_manager'] = new \Symfony\Component\Security\Core\Authorization\AccessDecisionManager(array(0 => new \Symfony\Component\Security\Core\Authorization\Voter\RoleHierarchyVoter(new \Symfony\Component\Security\Core\Role\RoleHierarchy(array('ROLE_ADMIN' => array(0 => 'ROLE_USER'), 'ROLE_SUPER_ADMIN' => array(0 => 'ROLE_USER', 1 => 'ROLE_ADMIN', 2 => 'ROLE_ALLOWED_TO_SWITCH')))), 1 => new \Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter($this->get('security.authentication.trust_resolver'))), 'affirmative', false, true);
    }
    protected function getSecurity_Authentication_ManagerService()
    {
        return $this->services['security.authentication.manager'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager(array(0 => new \Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider($this->get('security.user.provider.concrete.in_memory'), new \Symfony\Component\Security\Core\User\UserChecker(), 'secured_area', $this->get('security.encoder_factory'))));
    }
    protected function getSecurity_Authentication_TrustResolverService()
    {
        return $this->services['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver('Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken', 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken');
    }
    protected function getSecurity_User_Provider_Concrete_InMemoryService()
    {
        $this->services['security.user.provider.concrete.in_memory'] = $instance = new \Symfony\Component\Security\Core\User\InMemoryUserProvider();
        $instance->createUser(new \Symfony\Component\Security\Core\User\User('user', 'userpass', array(0 => 'ROLE_USER')));
        $instance->createUser(new \Symfony\Component\Security\Core\User\User('admin', 'adminpass', array(0 => 'ROLE_ADMIN')));
        return $instance;
    }
    protected function getTranslator_SelectorService()
    {
        return $this->services['translator.selector'] = new \Symfony\Component\Translation\MessageSelector();
    }
    protected function getTwig_Extension_Acme_DemoService()
    {
        return $this->services['twig.extension.acme.demo'] = new \Acme\DemoBundle\Twig\Extension\DemoExtension($this->get('twig.loader'));
    }
    protected function getValidator_Mapping_ClassMetadataFactoryService()
    {
        return $this->services['validator.mapping.class_metadata_factory'] = new \Symfony\Component\Validator\Mapping\ClassMetadataFactory(new \Symfony\Component\Validator\Mapping\Loader\LoaderChain(array(0 => new \Symfony\Component\Validator\Mapping\Loader\AnnotationLoader(array('assert' => 'Symfony\\Component\\Validator\\Constraints\\')), 1 => new \Symfony\Component\Validator\Mapping\Loader\StaticMethodLoader(), 2 => new \Symfony\Component\Validator\Mapping\Loader\XmlFilesLoader(array(0 => '/var/www/Symfony/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/DependencyInjection/../../../Component/Form/Resources/config/validation.xml')), 3 => new \Symfony\Component\Validator\Mapping\Loader\YamlFilesLoader(array()))), NULL);
    }
    public function getParameter($name)
    {
        $name = strtolower($name);
        if (!array_key_exists($name, $this->parameters)) {
            throw new \InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }
        return $this->parameters[$name];
    }
    public function hasParameter($name)
    {
        return array_key_exists(strtolower($name), $this->parameters);
    }
    public function setParameter($name, $value)
    {
        throw new \LogicException('Impossible to call set() on a frozen ParameterBag.');
    }
    protected function getDefaultParameters()
    {
        return array(
            'kernel.root_dir' => '/var/www/Symfony/app',
            'kernel.environment' => 'prod',
            'kernel.debug' => false,
            'kernel.name' => 'app',
            'kernel.cache_dir' => '/var/www/Symfony/app/cache/prod',
            'kernel.logs_dir' => '/var/www/Symfony/app/logs',
            'kernel.bundles' => array(
                'FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle',
                'SecurityBundle' => 'Symfony\\Bundle\\SecurityBundle\\SecurityBundle',
                'TwigBundle' => 'Symfony\\Bundle\\TwigBundle\\TwigBundle',
                'MonologBundle' => 'Symfony\\Bundle\\MonologBundle\\MonologBundle',
                'SwiftmailerBundle' => 'Symfony\\Bundle\\SwiftmailerBundle\\SwiftmailerBundle',
                'DoctrineBundle' => 'Symfony\\Bundle\\DoctrineBundle\\DoctrineBundle',
                'AsseticBundle' => 'Symfony\\Bundle\\AsseticBundle\\AsseticBundle',
                'SensioFrameworkExtraBundle' => 'Sensio\\Bundle\\FrameworkExtraBundle\\SensioFrameworkExtraBundle',
                'JMSSecurityExtraBundle' => 'JMS\\SecurityExtraBundle\\JMSSecurityExtraBundle',
                'AcmeDemoBundle' => 'Acme\\DemoBundle\\AcmeDemoBundle',
                'AcmeStudyBundle' => 'Acme\\StudyBundle\\AcmeStudyBundle',
            ),
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'appProdProjectContainer',
            'database_driver' => 'pdo_sqlite',
            'database_host' => 'localhost',
            'database_name' => 'symfony',
            'database_user' => 'mark',
            'database_password' => 'i0r3I)R#',
            'mailer_transport' => 'smtp',
            'mailer_host' => 'localhost',
            'mailer_user' => '',
            'mailer_password' => '',
            'locale' => 'en',
            'secret' => '88d40b7e910f589c10e5d1048508214b3b',
            'request_listener.class' => 'Symfony\\Bundle\\FrameworkBundle\\RequestListener',
            'controller_resolver.class' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ControllerResolver',
            'controller_name_converter.class' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ControllerNameParser',
            'response_listener.class' => 'Symfony\\Component\\HttpKernel\\ResponseListener',
            'exception_listener.class' => 'Symfony\\Component\\HttpKernel\\Debug\\ExceptionListener',
            'form.extension.class' => 'Symfony\\Component\\Form\\Extension\\DependencyInjection\\DependencyInjectionExtension',
            'form.factory.class' => 'Symfony\\Component\\Form\\FormFactory',
            'form.type_guesser.validator.class' => 'Symfony\\Component\\Form\\Extension\\Validator\\ValidatorTypeGuesser',
            'form.csrf_provider.class' => 'Symfony\\Component\\Form\\Extension\\Csrf\\CsrfProvider\\SessionCsrfProvider',
            'file.temporary_storage.class' => 'Symfony\\Component\\HttpFoundation\\File\\SessionBasedTemporaryStorage',
            'event_dispatcher.class' => 'Symfony\\Bundle\\FrameworkBundle\\ContainerAwareEventDispatcher',
            'http_kernel.class' => 'Symfony\\Bundle\\FrameworkBundle\\HttpKernel',
            'error_handler.class' => 'Symfony\\Component\\HttpKernel\\Debug\\ErrorHandler',
            'filesystem.class' => 'Symfony\\Component\\HttpKernel\\Util\\Filesystem',
            'cache_warmer.class' => 'Symfony\\Component\\HttpKernel\\CacheWarmer\\CacheWarmerAggregate',
            'file_locator.class' => 'Symfony\\Component\\HttpKernel\\Config\\FileLocator',
            'translator.class' => 'Symfony\\Bundle\\FrameworkBundle\\Translation\\Translator',
            'translator.identity.class' => 'Symfony\\Component\\Translation\\IdentityTranslator',
            'translator.selector.class' => 'Symfony\\Component\\Translation\\MessageSelector',
            'translation.loader.php.class' => 'Symfony\\Component\\Translation\\Loader\\PhpFileLoader',
            'translation.loader.yml.class' => 'Symfony\\Component\\Translation\\Loader\\YamlFileLoader',
            'translation.loader.xliff.class' => 'Symfony\\Component\\Translation\\Loader\\XliffFileLoader',
            'kernel.cache_warmup' => true,
            'kernel.secret' => '88d40b7e910f589c10e5d1048508214b3b',
            'router.class' => 'Symfony\\Component\\Routing\\Router',
            'router.cached.class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\CachedRouter',
            'routing.loader.class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\DelegatingLoader',
            'routing.resolver.class' => 'Symfony\\Component\\Config\\Loader\\LoaderResolver',
            'routing.loader.xml.class' => 'Symfony\\Component\\Routing\\Loader\\XmlFileLoader',
            'routing.loader.yml.class' => 'Symfony\\Component\\Routing\\Loader\\YamlFileLoader',
            'routing.loader.php.class' => 'Symfony\\Component\\Routing\\Loader\\PhpFileLoader',
            'router.options.generator_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
            'router.options.generator_base_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
            'router.options.generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\PhpGeneratorDumper',
            'router.options.matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher',
            'router.options.matcher_base_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher',
            'router.options.matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\PhpMatcherDumper',
            'router.cache_warmer.class' => 'Symfony\\Bundle\\FrameworkBundle\\CacheWarmer\\RouterCacheWarmer',
            'router.options.matcher.cache_class' => 'appprodUrlMatcher',
            'router.options.generator.cache_class' => 'appprodUrlGenerator',
            'session.class' => 'Symfony\\Component\\HttpFoundation\\Session',
            'session.storage.native.class' => 'Symfony\\Component\\HttpFoundation\\SessionStorage\\NativeSessionStorage',
            'session.storage.filesystem.class' => 'Symfony\\Component\\HttpFoundation\\SessionStorage\\FilesystemSessionStorage',
            'session.storage.options' => array(
                'lifetime' => 3600,
            ),
            'templating.engine.delegating.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\DelegatingEngine',
            'templating.name_parser.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\TemplateNameParser',
            'templating.cache_warmer.template_paths.class' => 'Symfony\\Bundle\\FrameworkBundle\\CacheWarmer\\TemplatePathsCacheWarmer',
            'templating.locator.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Loader\\TemplateLocator',
            'templating.locator.cached.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Loader\\CachedTemplateLocator',
            'templating.loader.filesystem.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Loader\\FilesystemLoader',
            'templating.loader.cache.class' => 'Symfony\\Component\\Templating\\Loader\\CacheLoader',
            'templating.loader.chain.class' => 'Symfony\\Component\\Templating\\Loader\\ChainLoader',
            'templating.finder.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Loader\\TemplateFinder',
            'templating.engine.php.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\PhpEngine',
            'templating.helper.slots.class' => 'Symfony\\Component\\Templating\\Helper\\SlotsHelper',
            'templating.helper.assets.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\AssetsHelper',
            'templating.helper.actions.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\ActionsHelper',
            'templating.helper.router.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\RouterHelper',
            'templating.helper.request.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\RequestHelper',
            'templating.helper.session.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\SessionHelper',
            'templating.helper.code.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\CodeHelper',
            'templating.helper.translator.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\TranslatorHelper',
            'templating.helper.form.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\FormHelper',
            'templating.globals.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\GlobalVariables',
            'templating.asset_package.class' => 'Symfony\\Component\\Templating\\Asset\\AssetPackage',
            'templating.engines' => array(
                0 => 'twig',
            ),
            'validator.class' => 'Symfony\\Component\\Validator\\Validator',
            'validator.mapping.class_metadata_factory.class' => 'Symfony\\Component\\Validator\\Mapping\\ClassMetadataFactory',
            'validator.mapping.cache.apc.class' => 'Symfony\\Component\\Validator\\Mapping\\Cache\\ApcCache',
            'validator.mapping.cache.prefix' => '',
            'validator.mapping.loader.loader_chain.class' => 'Symfony\\Component\\Validator\\Mapping\\Loader\\LoaderChain',
            'validator.mapping.loader.static_method_loader.class' => 'Symfony\\Component\\Validator\\Mapping\\Loader\\StaticMethodLoader',
            'validator.mapping.loader.annotation_loader.class' => 'Symfony\\Component\\Validator\\Mapping\\Loader\\AnnotationLoader',
            'validator.mapping.loader.xml_files_loader.class' => 'Symfony\\Component\\Validator\\Mapping\\Loader\\XmlFilesLoader',
            'validator.mapping.loader.yaml_files_loader.class' => 'Symfony\\Component\\Validator\\Mapping\\Loader\\YamlFilesLoader',
            'validator.validator_factory.class' => 'Symfony\\Bundle\\FrameworkBundle\\Validator\\ConstraintValidatorFactory',
            'security.context.class' => 'Symfony\\Component\\Security\\Core\\SecurityContext',
            'security.user_checker.class' => 'Symfony\\Component\\Security\\Core\\User\\UserChecker',
            'security.encoder_factory.generic.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\EncoderFactory',
            'security.encoder.digest.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\MessageDigestPasswordEncoder',
            'security.encoder.plain.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\PlaintextPasswordEncoder',
            'security.user.provider.entity.class' => 'Symfony\\Component\\Security\\Core\\User\\EntityUserProvider',
            'security.user.provider.in_memory.class' => 'Symfony\\Component\\Security\\Core\\User\\InMemoryUserProvider',
            'security.user.provider.in_memory.user.class' => 'Symfony\\Component\\Security\\Core\\User\\User',
            'security.user.provider.chain.class' => 'Symfony\\Component\\Security\\Core\\User\\ChainUserProvider',
            'security.authentication.trust_resolver.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\AuthenticationTrustResolver',
            'security.authentication.trust_resolver.anonymous_class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken',
            'security.authentication.trust_resolver.rememberme_class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken',
            'security.authentication.manager.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\AuthenticationProviderManager',
            'security.authentication.session_strategy.class' => 'Symfony\\Component\\Security\\Http\\Session\\SessionAuthenticationStrategy',
            'security.access.decision_manager.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\AccessDecisionManager',
            'security.access.simple_role_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\RoleVoter',
            'security.access.authenticated_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\AuthenticatedVoter',
            'security.access.role_hierarchy_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\RoleHierarchyVoter',
            'security.firewall.class' => 'Symfony\\Component\\Security\\Http\\Firewall',
            'security.firewall.map.class' => 'Symfony\\Bundle\\SecurityBundle\\Security\\FirewallMap',
            'security.firewall.context.class' => 'Symfony\\Bundle\\SecurityBundle\\Security\\FirewallContext',
            'security.matcher.class' => 'Symfony\\Component\\HttpFoundation\\RequestMatcher',
            'security.role_hierarchy.class' => 'Symfony\\Component\\Security\\Core\\Role\\RoleHierarchy',
            'security.authentication.retry_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\RetryAuthenticationEntryPoint',
            'security.channel_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\ChannelListener',
            'security.authentication.form_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\FormAuthenticationEntryPoint',
            'security.authentication.listener.form.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\UsernamePasswordFormAuthenticationListener',
            'security.authentication.listener.basic.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\BasicAuthenticationListener',
            'security.authentication.basic_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\BasicAuthenticationEntryPoint',
            'security.authentication.listener.digest.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\DigestAuthenticationListener',
            'security.authentication.digest_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\DigestAuthenticationEntryPoint',
            'security.authentication.listener.x509.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\X509AuthenticationListener',
            'security.authentication.listener.anonymous.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\AnonymousAuthenticationListener',
            'security.authentication.switchuser_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\SwitchUserListener',
            'security.logout_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\LogoutListener',
            'security.logout.handler.session.class' => 'Symfony\\Component\\Security\\Http\\Logout\\SessionLogoutHandler',
            'security.logout.handler.cookie_clearing.class' => 'Symfony\\Component\\Security\\Http\\Logout\\CookieClearingLogoutHandler',
            'security.access_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\AccessListener',
            'security.access_map.class' => 'Symfony\\Component\\Security\\Http\\AccessMap',
            'security.exception_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\ExceptionListener',
            'security.context_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\ContextListener',
            'security.authentication.provider.dao.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\DaoAuthenticationProvider',
            'security.authentication.provider.pre_authenticated.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\PreAuthenticatedAuthenticationProvider',
            'security.authentication.provider.anonymous.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\AnonymousAuthenticationProvider',
            'security.authentication.provider.rememberme.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\RememberMeAuthenticationProvider',
            'security.authentication.listener.rememberme.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\RememberMeListener',
            'security.rememberme.token.provider.in_memory.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\RememberMe\\InMemoryTokenProvider',
            'security.authentication.rememberme.services.persistent.class' => 'Symfony\\Component\\Security\\Http\\RememberMe\\PersistentTokenBasedRememberMeServices',
            'security.authentication.rememberme.services.simplehash.class' => 'Symfony\\Component\\Security\\Http\\RememberMe\\TokenBasedRememberMeServices',
            'security.rememberme.response_listener.class' => 'Symfony\\Bundle\\SecurityBundle\\ResponseListener',
            'templating.helper.security.class' => 'Symfony\\Bundle\\SecurityBundle\\Templating\\Helper\\SecurityHelper',
            'data_collector.security.class' => 'Symfony\\Bundle\\SecurityBundle\\DataCollector\\SecurityDataCollector',
            'security.access.denied_url' => NULL,
            'security.access.always_authenticate_before_granting' => false,
            'security.role_hierarchy.roles' => array(
                'ROLE_ADMIN' => array(
                    0 => 'ROLE_USER',
                ),
                'ROLE_SUPER_ADMIN' => array(
                    0 => 'ROLE_USER',
                    1 => 'ROLE_ADMIN',
                    2 => 'ROLE_ALLOWED_TO_SWITCH',
                ),
            ),
            'twig.class' => 'Twig_Environment',
            'twig.loader.class' => 'Symfony\\Bundle\\TwigBundle\\Loader\\FilesystemLoader',
            'templating.engine.twig.class' => 'Symfony\\Bundle\\TwigBundle\\TwigEngine',
            'twig.cache_warmer.class' => 'Symfony\\Bundle\\TwigBundle\\CacheWarmer\\TemplateCacheCacheWarmer',
            'twig.form.resources' => array(
                0 => 'TwigBundle:Form:div_layout.html.twig',
            ),
            'twig.options' => array(
                'debug' => false,
                'strict_variables' => false,
                'cache' => '/var/www/Symfony/app/cache/prod/twig',
                'charset' => 'UTF-8',
            ),
            'monolog.logger.class' => 'Symfony\\Bundle\\MonologBundle\\Logger\\Logger',
            'monolog.handler.stream.class' => 'Monolog\\Handler\\StreamHandler',
            'monolog.handler.fingers_crossed.class' => 'Monolog\\Handler\\FingersCrossedHandler',
            'monolog.handler.buffer.class' => 'Monolog\\Handler\\BufferHandler',
            'monolog.handler.rotating_file.class' => 'Monolog\\Handler\\RotatingFileHandler',
            'monolog.handler.syslog.class' => 'Monolog\\Handler\\SyslogHandler',
            'monolog.handler.null.class' => 'Monolog\\Handler\\NullHandler',
            'monolog.handler.test.class' => 'Monolog\\Handler\\TestHandler',
            'monolog.handler.firephp.class' => 'Symfony\\Bundle\\MonologBundle\\Logger\\FirePHPHandler',
            'monolog.handler.debug.class' => 'Symfony\\Bundle\\MonologBundle\\Logger\\DebugHandler',
            'swiftmailer.class' => 'Swift_Mailer',
            'swiftmailer.transport.sendmail.class' => 'Swift_Transport_SendmailTransport',
            'swiftmailer.transport.mail.class' => 'Swift_Transport_MailTransport',
            'swiftmailer.transport.failover.class' => 'Swift_Transport_FailoverTransport',
            'swiftmailer.plugin.redirecting.class' => 'Swift_Plugins_RedirectingPlugin',
            'swiftmailer.plugin.blackhole.class' => 'Swift_Plugins_BlackholePlugin',
            'swiftmailer.plugin.messagelogger.class' => 'Symfony\\Bundle\\SwiftmailerBundle\\Logger\\MessageLogger',
            'swiftmailer.data_collector.class' => 'Symfony\\Bundle\\SwiftmailerBundle\\DataCollector\\MessageDataCollector',
            'swiftmailer.transport.smtp.class' => 'Swift_Transport_EsmtpTransport',
            'swiftmailer.transport.name' => 'smtp',
            'swiftmailer.transport.smtp.encryption' => NULL,
            'swiftmailer.transport.smtp.port' => 25,
            'swiftmailer.transport.smtp.host' => 'localhost',
            'swiftmailer.transport.smtp.username' => '',
            'swiftmailer.transport.smtp.password' => '',
            'swiftmailer.transport.smtp.auth_mode' => NULL,
            'swiftmailer.single_address' => NULL,
            'doctrine.dbal.default_connection' => 'default',
            'doctrine.dbal.connection.class' => 'Doctrine\\DBAL\\Connection',
            'doctrine.dbal.logger.debug.class' => 'Doctrine\\DBAL\\Logging\\DebugStack',
            'doctrine.dbal.logger.class' => 'Symfony\\Bundle\\DoctrineBundle\\Logger\\DbalLogger',
            'doctrine.dbal.configuration.class' => 'Doctrine\\DBAL\\Configuration',
            'doctrine.data_collector.class' => 'Symfony\\Bundle\\DoctrineBundle\\DataCollector\\DoctrineDataCollector',
            'doctrine.dbal.connection.event_manager.class' => 'Doctrine\\Common\\EventManager',
            'doctrine.dbal.connection_factory.class' => 'Symfony\\Bundle\\DoctrineBundle\\ConnectionFactory',
            'doctrine.dbal.events.mysql_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\MysqlSessionInit',
            'doctrine.dbal.events.oracle_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\OracleSessionInit',
            'doctrine.orm.configuration.class' => 'Doctrine\\ORM\\Configuration',
            'doctrine.orm.entity_manager.class' => 'Doctrine\\ORM\\EntityManager',
            'doctrine.orm.entity_managers' => array(
                0 => 'default',
            ),
            'doctrine.orm.cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine.orm.cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine.orm.cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine.orm.cache.memcache_host' => 'localhost',
            'doctrine.orm.cache.memcache_port' => 11211,
            'doctrine.orm.cache.memcache_instance.class' => 'Memcache',
            'doctrine.orm.cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine.orm.metadata.driver_chain.class' => 'Doctrine\\ORM\\Mapping\\Driver\\DriverChain',
            'doctrine.orm.metadata.annotation.class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
            'doctrine.orm.metadata.annotation_reader.class' => 'Doctrine\\Common\\Annotations\\AnnotationReader',
            'doctrine.orm.metadata.xml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
            'doctrine.orm.metadata.yml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\YamlDriver',
            'doctrine.orm.metadata.php.class' => 'Doctrine\\ORM\\Mapping\\Driver\\PHPDriver',
            'doctrine.orm.metadata.staticphp.class' => 'Doctrine\\ORM\\Mapping\\Driver\\StaticPHPDriver',
            'doctrine.orm.class_metadata_factory_name' => 'Doctrine\\ORM\\Mapping\\ClassMetadataFactory',
            'doctrine.orm.proxy_cache_warmer.class' => 'Symfony\\Bundle\\DoctrineBundle\\CacheWarmer\\ProxyCacheWarmer',
            'form.type_guesser.doctrine.class' => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser',
            'doctrine.orm.default_entity_manager' => 'default',
            'doctrine.orm.auto_generate_proxy_classes' => false,
            'doctrine.orm.proxy_dir' => '/var/www/Symfony/app/cache/prod/doctrine/orm/Proxies',
            'doctrine.orm.proxy_namespace' => 'Proxies',
            'assetic.asset_factory.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\AssetFactory',
            'assetic.asset_manager.class' => 'Assetic\\Factory\\LazyAssetManager',
            'assetic.asset_manager_cache_warmer.class' => 'Symfony\\Bundle\\AsseticBundle\\CacheWarmer\\AssetManagerCacheWarmer',
            'assetic.cached_formula_loader.class' => 'Assetic\\Factory\\Loader\\CachedFormulaLoader',
            'assetic.config_cache.class' => 'Assetic\\Cache\\ConfigCache',
            'assetic.coalescing_directory_resource.class' => 'Assetic\\Factory\\Resource\\CoalescingDirectoryResource',
            'assetic.directory_resource.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Resource\\DirectoryResource',
            'assetic.filter_manager.class' => 'Symfony\\Bundle\\AsseticBundle\\FilterManager',
            'assetic.node.paths' => array(
            ),
            'assetic.cache_dir' => '/var/www/Symfony/app/cache/prod/assetic',
            'assetic.twig_extension.class' => 'Symfony\\Bundle\\AsseticBundle\\Twig\\AsseticExtension',
            'assetic.twig_formula_loader.class' => 'Assetic\\Extension\\Twig\\TwigFormulaLoader',
            'assetic.helper.dynamic.class' => 'Symfony\\Bundle\\AsseticBundle\\Templating\\DynamicAsseticHelper',
            'assetic.helper.static.class' => 'Symfony\\Bundle\\AsseticBundle\\Templating\\StaticAsseticHelper',
            'assetic.php_formula_loader.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Loader\\AsseticHelperFormulaLoader',
            'assetic.debug' => false,
            'assetic.use_controller' => false,
            'assetic.read_from' => '/var/www/Symfony/app/../web',
            'assetic.write_to' => '/var/www/Symfony/app/../web',
            'assetic.java.bin' => '/usr/bin/java',
            'assetic.node.bin' => '/usr/bin/node',
            'assetic.sass.bin' => '/usr/bin/sass',
            'assetic.filter.cssrewrite.class' => 'Assetic\\Filter\\CssRewriteFilter',
            'assetic.asset_writer_cache_warmer.class' => 'Symfony\\Bundle\\AsseticBundle\\CacheWarmer\\AssetWriterCacheWarmer',
            'assetic.asset_writer.class' => 'Assetic\\AssetWriter',
            'annotations.reader.class' => 'Doctrine\\Common\\Annotations\\AnnotationReader',
            'annotations.configuration_reader.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\AnnotationReader',
            'annotations.parser.class' => 'Doctrine\\Common\\Annotations\\Parser',
            'annotations.controller_parser.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Controller\\ControllerAnnotationParser',
            'routing.loader.annot_glob.class' => 'Symfony\\Component\\Routing\\Loader\\AnnotationGlobLoader',
            'routing.loader.annot_dir.class' => 'Symfony\\Component\\Routing\\Loader\\AnnotationDirectoryLoader',
            'routing.loader.annot_file.class' => 'Symfony\\Component\\Routing\\Loader\\AnnotationFileLoader',
            'routing.loader.annot_class.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Routing\\AnnotatedRouteControllerLoader',
            'converter.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Controller\\ParamConverterListener',
            'converter.manager.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\ParamConverterManager',
            'converter.doctrine.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\DoctrineParamConverter',
            'view.template_annotation.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\View\\AnnotationTemplateListener',
            'security.secured_services' => array(
            ),
            'security.access.method_interceptor.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Interception\\MethodSecurityInterceptor',
            'security.access.run_as_manager.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\RunAsManager',
            'security.authentication.provider.run_as.class' => 'JMS\\SecurityExtraBundle\\Security\\Authentication\\Provider\\RunAsAuthenticationProvider',
            'security.run_as.key' => 'RunAsToken',
            'security.run_as.role_prefix' => 'ROLE_',
            'security.access.after_invocation_manager.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\AfterInvocation\\AfterInvocationManager',
            'security.access.after_invocation.acl_provider.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\AfterInvocation\\AclAfterInvocationProvider',
            'security.extra.controller_listener.class' => 'JMS\\SecurityExtraBundle\\Controller\\ControllerListener',
            'security.access.iddqd_voter.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Voter\\IddqdVoter',
            'security.extra.secure_all_services' => false,
            'kernel.compiled_classes' => array(
                0 => 'Symfony\\Component\\Routing\\RouterInterface',
                1 => 'Symfony\\Component\\Routing\\Matcher\\UrlMatcherInterface',
                2 => 'Symfony\\Component\\Routing\\Matcher\\UrlMatcher',
                3 => 'Symfony\\Component\\Routing\\Generator\\UrlGeneratorInterface',
                4 => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
                5 => 'Symfony\\Component\\Routing\\Router',
                6 => 'Symfony\\Component\\HttpFoundation\\SessionStorage\\SessionStorageInterface',
                7 => 'Symfony\\Component\\HttpFoundation\\Session',
                8 => 'Symfony\\Component\\HttpFoundation\\SessionStorage\\NativeSessionStorage',
                9 => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\EngineInterface',
                10 => 'Symfony\\Component\\Templating\\TemplateNameParserInterface',
                11 => 'Symfony\\Component\\Templating\\TemplateNameParser',
                12 => 'Symfony\\Component\\Templating\\EngineInterface',
                13 => 'Symfony\\Component\\Config\\FileLocatorInterface',
                14 => 'Symfony\\Component\\Templating\\TemplateReferenceInterface',
                15 => 'Symfony\\Component\\Templating\\TemplateReference',
                16 => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\TemplateReference',
                17 => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\TemplateNameParser',
                18 => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Loader\\TemplateLocator',
                19 => 'Symfony\\Component\\HttpFoundation\\ParameterBag',
                20 => 'Symfony\\Component\\HttpFoundation\\HeaderBag',
                21 => 'Symfony\\Component\\HttpFoundation\\Request',
                22 => 'Symfony\\Component\\HttpFoundation\\Response',
                23 => 'Symfony\\Component\\HttpFoundation\\ResponseHeaderBag',
                24 => 'Symfony\\Component\\EventDispatcher\\EventDispatcherInterface',
                25 => 'Symfony\\Component\\EventDispatcher\\EventDispatcher',
                26 => 'Symfony\\Component\\EventDispatcher\\Event',
                27 => 'Symfony\\Component\\EventDispatcher\\EventSubscriberInterface',
                28 => 'Symfony\\Component\\HttpKernel\\HttpKernel',
                29 => 'Symfony\\Component\\HttpKernel\\ResponseListener',
                30 => 'Symfony\\Component\\HttpKernel\\Controller\\ControllerResolver',
                31 => 'Symfony\\Component\\HttpKernel\\Controller\\ControllerResolverInterface',
                32 => 'Symfony\\Component\\HttpKernel\\Event\\KernelEvent',
                33 => 'Symfony\\Component\\HttpKernel\\Event\\FilterControllerEvent',
                34 => 'Symfony\\Component\\HttpKernel\\Event\\FilterResponseEvent',
                35 => 'Symfony\\Component\\HttpKernel\\Event\\GetResponseEvent',
                36 => 'Symfony\\Component\\HttpKernel\\Event\\GetResponseForControllerResultEvent',
                37 => 'Symfony\\Component\\HttpKernel\\Event\\GetResponseForExceptionEvent',
                38 => 'Symfony\\Component\\HttpKernel\\Events',
                39 => 'Symfony\\Bundle\\FrameworkBundle\\RequestListener',
                40 => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ControllerNameParser',
                41 => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ControllerResolver',
                42 => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller',
                43 => 'Symfony\\Bundle\\FrameworkBundle\\ContainerAwareEventDispatcher',
                44 => 'Symfony\\Component\\Security\\Http\\Firewall',
                45 => 'Symfony\\Component\\Security\\Http\\FirewallMapInterface',
                46 => 'Symfony\\Component\\Security\\Core\\SecurityContext',
                47 => 'Symfony\\Component\\Security\\Core\\SecurityContextInterface',
                48 => 'Symfony\\Component\\Security\\Core\\User\\UserProviderInterface',
                49 => 'Symfony\\Component\\Security\\Core\\Authentication\\AuthenticationProviderManager',
                50 => 'Symfony\\Component\\Security\\Core\\Authentication\\AuthenticationManagerInterface',
                51 => 'Symfony\\Component\\Security\\Core\\Authorization\\AccessDecisionManager',
                52 => 'Symfony\\Component\\Security\\Core\\Authorization\\AccessDecisionManagerInterface',
                53 => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\VoterInterface',
                54 => 'Symfony\\Bundle\\SecurityBundle\\Security\\FirewallMap',
                55 => 'Symfony\\Bundle\\SecurityBundle\\Security\\FirewallContext',
                56 => 'Symfony\\Component\\HttpFoundation\\RequestMatcher',
                57 => 'Symfony\\Component\\HttpFoundation\\RequestMatcherInterface',
                58 => 'Twig_Environment',
                59 => 'Twig_ExtensionInterface',
                60 => 'Twig_Extension',
                61 => 'Twig_Extension_Core',
                62 => 'Twig_Extension_Escaper',
                63 => 'Twig_Extension_Optimizer',
                64 => 'Twig_LoaderInterface',
                65 => 'Twig_Markup',
                66 => 'Twig_TemplateInterface',
                67 => 'Twig_Template',
                68 => 'Monolog\\Formatter\\FormatterInterface',
                69 => 'Monolog\\Formatter\\LineFormatter',
                70 => 'Monolog\\Handler\\HandlerInterface',
                71 => 'Monolog\\Handler\\AbstractHandler',
                72 => 'Monolog\\Handler\\StreamHandler',
                73 => 'Monolog\\Handler\\FingersCrossedHandler',
                74 => 'Monolog\\Logger',
                75 => 'Symfony\\Bundle\\MonologBundle\\Logger\\Logger',
                76 => 'Symfony\\Bundle\\MonologBundle\\Logger\\DebugHandler',
                77 => 'JMS\\SecurityExtraBundle\\Controller\\ControllerListener',
                78 => 'JMS\\SecurityExtraBundle\\Mapping\\Driver\\AnnotationParser',
                79 => 'JMS\\SecurityExtraBundle\\Mapping\\Driver\\AnnotationConverter',
                80 => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Interception\\MethodInvocation',
            ),
        );
    }
}
