<?php
namespace Admin\Model\DAO;

use Doctrine\ORM\EntityManager;
use Admin\Model\TitanUser;

class CityDAO extends AbstractDAO
{
	public function __construct(\Doctrine\ORM\EntityManager $em)
	{
		parent::__construct($em, 'Admin\Model\TitanCity');
	}
	
	public function getCitiesByName ($offset = 0, $limit = 0, $query)
	{
		$qb = $this->getEntityManager()->createQueryBuilder();
	
		$qb->select('e')->from($this->_entityNamespace, 'e')->setFirstResult($offset);
	
		if($limit)
			$qb->setMaxResults($limit);
		
		$qb->add('where', $qb->expr()->like('lower(e.name)', $qb->expr()->literal('%'.strtolower($query).'%')));
		
		$qb->orderBy('e.name', 'ASC');
		$query = $qb->getQuery();
	
		return $query->getResult();
	}
}
