<?php
namespace Admin\Model\DAO;

use Doctrine\ORM\EntityManager;

abstract class AbstractDAO
{
	protected $_em;
	
	protected $_entityNamespace;
	
	public function __construct(\Doctrine\ORM\EntityManager $em, $entityNamespace)
	{
		$this->_em = $em;
		$this->_entityNamespace = $entityNamespace;
	}
	
	public function getEntityManager ()
	{
		return $this->_em;
	}
	
	public function findAll ()
	{
		return $this->getEntityManager()->getRepository($this->_entityNamespace)->findAll();
	}
	
	public function findById ($id)
	{
		return $this->getEntityManager()->getRepository($this->_entityNamespace)->find($id);
	}
	
	public function save ($entity, $data)
	{
		$reflectionClass = new \ReflectionClass($this->_entityNamespace);
		
		foreach ($data as $columns => $value)
		{
			$property = $reflectionClass->getProperty($columns);
			$property->setAccessible(true);
			
			$property->setValue($entity, $value);
			
			$property->setAccessible(false);
		}
		
		
		$this->getEntityManager()->persist($entity);
		
		$this->getEntityManager()->flush();
		
	}
}