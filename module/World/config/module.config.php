<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'World\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /world/:controller/:action
            'world' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/world',
                    'defaults' => array(
                        '__NAMESPACE__' => 'World\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action]][/:id]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[a-zA-Z0-9]*[&]?[a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            //'World\Controller\Index' => 'World\Controller\IndexController',
            'World\Controller\Country' => 'World\Controller\CountryController',
            //'World\Controller\CountryLanguage' => 'World\Controller\CountryLanguageController',
        //'World\Controller\City' => 'World\Controller\CityController',
        ),
        'factories' => array(
            'World\Controller\Index' =>function (Zend\Mvc\Controller\ControllerManager $pm) {
                return new World\Controller\IndexController($pm->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
            }, 
            'World\Controller\City' => function (Zend\Mvc\Controller\ControllerManager $pm) {
                return new World\Controller\CityController($pm->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
            },
            'World\Controller\CountryLanguage' => function (Zend\Mvc\Controller\ControllerManager $pm) {
                return new World\Controller\CountryLanguageController($pm->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
            }
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'world/index/index' => __DIR__ . '/../view/world/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
            //World templates
            'layout/table' => __DIR__ . '/../view/world/layout/table.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'World_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/World/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'World\Entity' => 'World_driver'
                ),
            ),
        ),
    ),
);
