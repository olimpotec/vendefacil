<?php

namespace Admin\Controller;

use Admin\Controller\VFAbstracController;
use Zend\View\Model\ViewModel;
use Admin\Model\DAO\UserDAO;
use Admin\Model\TitanUser;
use Admin\Service\Notification;
use Doctrine\DBAL\DBALException;
use Admin\Model\DAO\CompanyDAO;
use Admin\Model\DAO\CityDAO;
use Admin\Model\MarketCompanies;
/**
 *
 * @category Admin
 * @package Controller
 * @author  M‡rcio Silva<marcio@olimpotec.com>
 */
class CompanyController extends VFAbstractController
{
	private $companyDAO = FALSE;
	
	private function getCompanyDAO ()
	{
		if(!$this->companyDAO)
			$this->companyDAO = new CompanyDAO($this->getEntityManager());
		
		return $this->companyDAO; 
	}
	public function indexAction ()
	{
		return new ViewModel(array(
			'companies' => $this->getCompanyDAO()->findAll ()
		));
	}
	
	public function addAction ()
	{
		return new ViewModel();
	}
	
	public function addNewAction ()
	{
		$post = $this->getRequest()->getPost();
		
		$cityDAO = new CityDAO($this->getEntityManager());
		
		try
		{
			$cityEntity = $cityDAO->findById($post['cityId']);
			$companyEntity = new MarketCompanies();
			$companyEntity->setCity($cityEntity);
			$companyEntity->setFoundedAt(new \DateTime($post['founded_at']));
			$this->getCompanyDAO()->save ($companyEntity, $post);
			
			Notification::singleton()->addMessage ($this->translate('Company sucessfull saved!'));
		}
		catch (\Exception $e)
		{
			Notification::singleton()->addError ($this->translate('Error:'. $e->getMessage()));
		}
		
		return $this->redirect()->toRoute(null, array('controller' => 'company', 'action' => 'index'));
	}
	
	public function deleteAction ()
	{
		$get = $this->getRequest()->getQuery()->toArray();
		
		$this->getCompanyDAO()->delete ((int)$get['item']);
		
		Notification::singleton()->addMessage ($this->translate('Company sucessfull deleted!'));
		
		return $this->redirect()->toRoute(null, array('controller' => 'company', 'action' => 'index'));
	}
	
	
	public function editAction ()
	{
		$get = $this->getRequest()->getQuery()->toArray();
		
		try {
			$companyEntity = $this->getCompanyDAO()->findById((int)$get['item']);
		}
		
		catch (\Exception $e)
		{
			Notification::singleton()->addError ('Error on load company information! Try Again');
			
			return $this->redirect()->toRoute(null, array('controller' => 'company', 'action' => 'index'));
		}
		
		return new ViewModel(
				array ('company' => $companyEntity)
		);
	}
	
	public function editSaveAction ()
	{
		$post = $this->getRequest()->getPost();
	
		$cityDAO = new CityDAO($this->getEntityManager());
	
		try
		{
			$cityEntity = $cityDAO->findById($post['cityId']);
			$companyEntity = new MarketCompanies();
			$companyEntity->setCity($cityEntity);
			$companyEntity->setFoundedAt(new \DateTime($post['founded_at']));
			
			$this->getCompanyDAO()->save ($companyEntity, $post);
				
			Notification::singleton()->addMessage ($this->translate('Company sucessfull updadeted!'));
		}
		catch (Doctrine\DBAL\DBALException $e)
		{
			Notification::singleton()->addError ($this->translate('Error:'. $e->getMessage()));
		}
	
		return $this->redirect()->toRoute(null, array('controller' => 'company', 'action' => 'index'));
	}
}