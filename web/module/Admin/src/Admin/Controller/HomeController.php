<?php
namespace Admin\Controller;

use Admin\Model\TitanUser;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * 
 * @category Admin
 * @package Controller
 * @author  M‡rcio Silva<marcio@olimpotec.com>
 */
class HomeController extends AbstractActionController
{
	protected $em;
	
	public function getEntityManager()
	{
		if (null === $this->em) 
			$this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		
		return $this->em;
	}
	
    /**
     * 
     * @return void
     */
    public function indexAction()
    {	
    	$data = $this->getEntityManager()->getRepository('Admin\Model\TitanUser')->findAll();
    	
    	return new ViewModel();
    }
}