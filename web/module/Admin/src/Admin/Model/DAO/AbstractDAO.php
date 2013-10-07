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
	
	public function findAll ($offset = 0, $limit = 0)
	{
		$qb = $this->getEntityManager()->createQueryBuilder();
		
		$qb->select('e')->from($this->_entityNamespace, 'e')->setFirstResult($offset);
		
		if($limit)
			$qb->setMaxResults($limit);
		
		$query = $qb->getQuery();
		
		return $query->getResult();
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
			try{
				$property = $reflectionClass->getProperty($columns);
				$property->setAccessible(true);
					
				$property->setValue($entity, $value);
					
				$property->setAccessible(false);
			}
			catch (\Exception $e)
			{
				
			}
		}
		
		
		$this->getEntityManager()->merge($entity);
		
		$this->getEntityManager()->flush();
		
	}
	
	public function delete ($id)
	{
		try {
			$this->getEntityManager()->beginTransaction();
			
			$entity = $this->findById($id);
			
			$this->getEntityManager()->remove($entity);
			$this->getEntityManager()->commit();
			$this->getEntityManager()->flush();
		}
		catch (\Exception $e)
		{
			$this->getEntityManager()->rollback();
			die($e->getMessage());
		}
	}
}