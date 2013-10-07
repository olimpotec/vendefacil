<?php

namespace Admin\Controller;

use Admin\Controller\VFAbstracController;
use Zend\View\Model\JsonModel;
use Admin\Model\DAO\CityDAO;

/**
 *
 * @category Admin
 * @package Controller
 * @author  M‡rcio Silva<marcio@olimpotec.com>
 */
class ServiceController extends VFAbstractController
{
	public function indexAction()
	{
		$json = new JsonModel(array(
				'title' => 'Some Title'
		));
		
		return $json;
	}
	
	public function citiesAction()
	{
		$cityDAO = new CityDAO($this->getEntityManager());
		
		$results = array (array());
		
		$get = $this->getRequest()->getQuery()->toArray();
		
		$limit = isset($get['limit']) ? (int)$get['limit'] : 30;
		
		$offset = isset($get['offset']) ? (int)$get['offset'] : 0;
		
		foreach ($cityDAO->getCitiesByName($offset, $limit, $get['term']) as $index => $city)
		{
			$results [$index]['id']  = $city->getId();
			$results [$index]['label']  = $city->getName().' - '. $city->getState()->getUf();
			$results [$index]['value']  = $city->getName().' - '. $city->getState()->getUf();
		}
		
		return new JsonModel($results);
	}
}