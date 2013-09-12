<?php
namespace Admin\Model\DAO;

use Doctrine\ORM\EntityManager;
use Admin\Model\TitanUser;

class UserDAO extends AbstractDAO
{
	public function __construct(\Doctrine\ORM\EntityManager $em)
	{
		parent::__construct($em, 'Admin\Model\TitanUser');
	}
	
	/*
	 * Authenticate user on App
	 * */
	public function authenticate (TitanUser $user, $passGiven)
	{
		return $user->getPassword() == sha1($passGiven);
	}
}