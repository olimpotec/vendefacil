<?php
namespace Admin\Service;


use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Db\Sql\Select;

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
     * @var Zend\Db\Adapter\Adapter
     */
    private $dbAdapter;
    
    private $serviceManager;

    /** 
     * Construtor da classe
     *
     * @return void
     */
    public function __construct($dbAdapter = null, $serviceManager = null)
    {
        $this->dbAdapter = $dbAdapter;
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
        
        $password = sha1($params['password']);
        $auth = new AuthenticationService();
        $authAdapter = new AuthAdapter($this->dbAdapter);
        $authAdapter
            ->setTableName('_user')
            ->setIdentityColumn('_login')
            ->setCredentialColumn('_password')
            ->setIdentity($params['username'])
            ->setCredential($password);
        
        $result = $auth->authenticate($authAdapter);
        
        if (! $result->isValid()) {
            throw new \Exception("Login ou senha inv‡lidos");
        }

        //salva o user na sess‹o
        $session = $this->serviceManager->get('Session');        
        $session->offsetSet('user', $authAdapter->getResultRowObject());

        return true;
    }

    /**
     * Faz o logout do sistema
     *
     * @return void
     */
    public function logout() {
        $auth = new AuthenticationService();
        $session = $this->serviceManager->get('Session');
        $session->offsetUnset('user');
        $auth->clearIdentity();
        return true;
    }

}