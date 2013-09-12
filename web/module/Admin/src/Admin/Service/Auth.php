<?php
namespace Admin\Service;


use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Db\Sql\Select;
use Admin\Model\DAO\UserDAO;
use Admin\Model\TitanUser;
use Zend\Authentication\Result;

/**
 * Servio respons‡vel pela autentica‹o da aplica‹o
  * 
 * @category Admin
 * @package Service
 */
class Auth  
{
    /**
     * Adapter usado para a autentica‹o
     * @var Zend\ServiceManager\ServiceManager
     */
    private $serviceManager;


    /** 
     * Construtor da classe
     *
     * @return void
     */
    public function __construct($serviceManager = null)
    {
        $this->serviceManager = $serviceManager;
    }

    /**
     * Faz a autentica‹o dos usu‡rios
     * 
     * @param array $params
     * @return array
     */
    public function authenticate($params)
    {
        if (!isset($params['username']) || !isset($params['password'])) {
            throw new \Exception("Par‰metros inv‡lidos");
        }
        
        $authService = $this->serviceManager->get('Zend\Authentication\AuthenticationService');
        
        $adapter = $authService->getAdapter();
        $adapter->setIdentityValue($params['username']);
        $adapter->setCredentialValue($params['password']);
        
        $authResult = $authService->authenticate($adapter);
        
        if (!$authResult->isValid()) 
        	throw new \Exception ('Error Login', $authResult->getCode());
        
        $loggedUser = $authService->getIdentity();
        
        // Strore user on session
        $session = $this->serviceManager->get('Session');    
            
       	$session->offsetSet('user', $loggedUser);

        return true;
    }

    /**
     * Faz o logout do sistema
     *
     * @return void
     */
    public function logout() {
        $authService = $this->serviceManager->get('Zend\Authentication\AuthenticationService');
        $authService->clearIdentity();
        return true;
    }

}