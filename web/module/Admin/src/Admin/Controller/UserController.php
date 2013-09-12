<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Model\DAO\UserDAO;
use Admin\Model\TitanUser;

/**
 * 
 * @category Admin
 * @package Controller
 * @author  M‡rcio Silva<marcio@olimpotec.com>
 */
class UserController extends AbstractActionController
{
    
	protected $em;
	
	public function getEntityManager()
	{
		if (null === $this->em)
			$this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
	
		return $this->em;
	}
	
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
    
    	$userEntity = $userDAO->findById($data['id']);
    	
    	$userEntity->load($this->getRequest()->getPost());
    	
    	$userDAO->save ($userEntity);
    	
    	$session = $this->getServiceLocator()->get('Session');
    	
    	$session->offsetSet('user', $userEntity);
    	
    	return $this->redirect()->toRoute(null, array('controller' => 'user', 'action' => 'profile'));
    }
}