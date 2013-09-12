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
	
	public function save ($entity)
	{	
		
		$this->getEntityManager()->persist($entity);
		$this->getEntityManager()->flush();
	}
}