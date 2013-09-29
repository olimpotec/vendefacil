<?php
namespace Admin\Controller;

use Admin\Controller\VFAbstracController;
use Zend\View\Model\ViewModel;
use Admin\Model\DAO\UserDAO;
use Admin\Model\TitanUser;
use Admin\Service\Notification;
/**
 * 
 * @category Admin
 * @package Controller
 * @author  M‡rcio Silva<marcio@olimpotec.com>
 */
class UserController extends VFAbstractController
{
	
    /**
     * Profile do usu‡rio
     * @return void
     */
    public function profileAction()
    {
    	return new ViewModel();   
    } 

    /**
     * Profile do usu‡rio
     * @return void
     */
    public function updateAction()
    {	
    	$data = $this->getRequest()->getPost();
    	
    	$userDAO = new UserDAO($this->getEntityManager());
    	
    	try {
    		$userEntity = $userDAO->findById($data['id']);
    		 
    		$userEntity->load($this->getRequest()->getPost());
    		 
    		$userDAO->save ($userEntity);
    		 
    		$session = $this->getServiceLocator()->get('Session');
    		 
    		$session->offsetSet('user', $userEntity);
    		
    		Notification::singleton()->addMessage ($this->translate('Profile sucessfull updated!'));
    	}
    	catch (\Exception $e)
    	{
    		Notification::singleton()->addMessage ($this->translate('Error on update your Profile!'));
    	}
    	
    	Notification::singleton()->save ();
    	
    	return $this->redirect()->toRoute(null, array('controller' => 'user', 'action' => 'profile'));
    }
}