<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * 
 * @category Admin
 * @package Controller
 * @author  M‡rcio Silva<marcio@olimpotec.com>
 */
class VFAbstractController extends AbstractActionController
{
    
	protected $em;
	
	
	public function getEntityManager()
	{
		if (null === $this->em)
			$this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
	
		return $this->em;
	}
	
	public function translate ($text)
	{
		return $this->getServiceLocator()->get ('translator')->translate($text);
	}
}