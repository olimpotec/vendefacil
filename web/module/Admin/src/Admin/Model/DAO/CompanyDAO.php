<?php
namespace Admin\Model\DAO;

use Doctrine\ORM\EntityManager;
use Admin\Model\TitanUser;

class CompanyDAO extends AbstractDAO
{
	public function __construct(\Doctrine\ORM\EntityManager $em)
	{
		parent::__construct($em, 'Admin\Model\MarketCompanies');
	}
}