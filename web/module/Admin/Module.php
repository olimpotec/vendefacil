<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Admin\Service\Notification;
use Doctrine\DBAL\Types\Type;

class Module
{
	/*Actions without authentication */
	protected $whitelist = array('Admin\Controller\Index:login', 
								 'Admin\Controller\Index:logout', 
								 'Admin\Controller\Index:index',
								 'Admin\Controller\Auth:login');
	
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        $app = $e->getParam('application');
        $app->getEventManager()->attach('dispatch', array($this, 'setLayout'));
		$eventManager->attach (MvcEvent::EVENT_ROUTE, array($this, 'isLogged'));
		Notification::singleton($e->getApplication()->getServiceManager());
		
		$this->setUpCustomTypes($e);
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    public function setLayout(MvcEvent $e)
    {
    	
    	$matches    = $e->getRouteMatch();
    	
        $controller = $matches->getParam('controller');
        
        /*
        if (false !== strpos($controller, __NAMESPACE__)) {
            // not a controller from this module
            return;
        }*/
		
        if (false !== strpos($controller, 'Admin\Controller\Index')) {
        	
        	return;
        }
       
      
        // Set the layout template
        $viewModel = $e->getViewModel();
        $viewModel->setTemplate('layout/inner');
        $viewModel->session = $e->getApplication()->getServiceManager()->get('session');
    }
    
    public function isLogged (MvcEvent $e)
    {	
    	
    	$match = $e->getRouteMatch();
    	$action = $match->getParam('action');
    	$controller = $match->getParam('controller');
    	$auth = $e->getApplication()->getServiceManager()->get('Zend\Authentication\AuthenticationService');
    	
    	
    	// No route match, this is a 404
    	if (!$match instanceof RouteMatch) 
    		return;
    
    	// Route is whitelisted
    	//$name = $match->getMatchedRouteName();
    	
    	
    	if (in_array($controller.':'.$action, $this->whitelist)) {
    		return;
    	}
    	
    	// User is authenticated
    	if ($auth->hasIdentity()) {
    		return;
    	}
    	
    	
    	 // Redirect to the user login page, as an example
         $router   = $e->getRouter();
         $url      = $router->assemble(array(), array(
                'name' => 'admin',
            	'controller' => 'index',
            	'action' => 'login'
         ));
    	
    	
    	$response = $e->getResponse();
    	$response->getHeaders()->addHeaderLine('Location', $url);
    	$response->setStatusCode(302);
    
    	return $response;
    }
    
    public function setUpCustomTypes (MvcEvent $e)
    {
    	
    	Type::addType('datetimeutc', 'Admin\Types\DateTimeUTC');
    	
    	$entityManager = $e->getApplication()->getServiceManager()->get('doctrine.entitymanager.orm_default');
    	
    	$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('TIMESTAMP', 'datetimeutc');
    	
    }
}
