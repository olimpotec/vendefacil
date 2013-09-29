<?php
namespace Admin\Controller;

use Admin\Controller\VFAbstracController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\Result;
use Admin\Service\Notification;

/**
 * 
 * @category Admin
 * @package Controller
 * @author  M�rcio Silva<marcio@olimpotec.com>
 */
class AuthController extends VFAbstractController
{
    /**
     * Mostra o formul�rio de login
     * @return void
     */
    public function indexAction()
    {
    	return $this->redirect()->toUrl('index/login');
    }

    /**
     * Faz o login do usu�rio
     * @return void
     */
    public function loginAction()
    {
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return  $this->redirect()->toRoute(null, array('controller' => 'index', 'action' => 'login'));
        }

        $data = $request->getPost();
       
        $service = $this->getServiceLocator()->get('Admin\Service\Auth');

        try {
	        $auth = $service->authenticate($data); 
        }
        catch (\Exception $e)
        {	
        	Notification::singleton()->addError ($this->translate('Invalid Login, try again!'));
        	
        	//login inv�lido, volta a p�gina de login
        	return  $this->redirect()->toRoute(null, array('controller' => 'index', 'action' => 'login'));
        }
       
        return $this->redirect()->toRoute(null, array('controller' => 'home', 'action' => 'index'));
    }

    /**
     * Faz o logout do usu�rio
     * @return void
     */
    public function logoutAction()
    {
        $service = $this->getServiceLocator()->get('Admin\Service\Auth');
        $auth = $service->logout();
        
        return $this->redirect()->toRoute(null, array('controller' => 'index', 'action' => 'login'));
    }
}