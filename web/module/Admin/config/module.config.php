<?php
use Admin\Model\TitanUser;
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
            'homeAdmin' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/admin',
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'admin' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/admin',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Admin\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action][/]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(),
                        ),
                        'child_routes' => array (
                        		'wildcard' => array ('type' => 'Wildcard'),
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
        'factories' => array(
        		'Session' => function($sm) {
        			return new Zend\Session\Container('vendefacil');
        		},
        		'Admin\Service\Auth' => function($serviceManager) {
        			
        			return new Admin\Service\Auth($serviceManager);
        		},
        		
        		'Zend\Authentication\AuthenticationService' => function($serviceManager) {
        			
        			return $serviceManager->get('doctrine.authenticationservice.orm_default');
        		},
        		'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory', 
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Index' => 'Admin\Controller\IndexController',
        	'Admin\Controller\Auth' => 'Admin\Controller\AuthController',
        	'Admin\Controller\Home' => 'Admin\Controller\HomeController',
        	'Admin\Controller\User' => 'Admin\Controller\UserController',
        	'Admin\Controller\Company' => 'Admin\Controller\CompanyController',
        		'Admin\Controller\Service' => 'Admin\Controller\ServiceController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'admin/index/index' => __DIR__ . '/../view/admin/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    	'strategies' => array(
    				'ViewJsonStrategy',
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
    				__NAMESPACE__ . '_driver' => array(
    						'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
    						'cache' => 'array',
    						'paths' => array(__DIR__ . '/../src/Admin/Model')
    				),
    				'orm_default' => array(
    						'drivers' => array(
    								__NAMESPACE__ . 'Admin\Model' => __NAMESPACE__ . '_driver'
    						)
    				)
    		),
    		'authentication' => array(
    				'orm_default' => array(
    						'object_manager' => 'Doctrine\ORM\EntityManager',
    						'identity_class' => 'Admin\Model\TitanUser',
    						'identity_property' => 'login',
    						'credential_property' => 'password',
    						'credential_callable' => 'Admin\Model\DAO\UserDAO::authenticate',
    				),
    		),
    ),
   
);
