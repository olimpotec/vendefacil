<?php

namespace Admin\Service;

/**
 *
 * @category Admin
 * @package Controller
 * @author  M‡rcio Silva<marcio@olimpotec.com>
 */
class Notification
{
	static private $message = FALSE;
	
	static private $serviceManager;
	
	private $array = array ();

	private $cont = 0;

	const TEXT = 0;
	const HTML = 1;

	const WARNING = 0;
	const MESSAGE = 1;
	const ERROR	  = 2;

	private final function __construct ()
	{
		$this->load ();
	}
	
	static public function singleton ($sm = null)
	{
		if (self::$message !== FALSE)
			return self::$message;
		
		self::$serviceManager = $sm;
		
		$class = __CLASS__;

		self::$message = new $class ();

		return self::$message;
	}
	
	
	public function save ()
	{
		$session = self::$serviceManager->get('Session');
		
		$session->offsetSet('CACHE_MESSAGES', serialize ($this->array));
	}

	public function load ()
	{
		
		$session = self::$serviceManager->get('Session');
		
		if ( $session->offsetGet('CACHE_MESSAGES'))
			$this->array = unserialize ($session->offsetGet('CACHE_MESSAGES'));
	}

	public function addMessage ($message)
	{
		if (trim ($message) != '')
			$this->array [] = array (self::MESSAGE, $message);
		
		$this->save();
	}

	public function addWarning ($warning)
	{
		if (trim ($warning) != '')
			$this->array [] = array (self::WARNING, $warning);
		
		$this->save();
	}

	public function addError ($error)
	{
		if (trim ($error) != '')
			$this->array [] = array (self::ERROR, $error);
		
		$this->save();
	}
	
	public function get ($type = self::HTML)
	{
		if (!array_key_exists ($this->cont, $this->array))
			return NULL;

		$key = $this->cont++;

		if ($type == self::TEXT)
			return $this->array [$key][1];

		if ($this->array [$key][0] == self::MESSAGE)
			return '{"text":"'.$this->array [$key][1].'","layout":"top","type":"success", "closeButton":"true"}';
		
		if ($this->array [$key][0] == self::WARNING)
			return '{"text":"'.$this->array [$key][1].'","layout":"top","type":"information", "closeButton":"true"}';
		
		return '{"text":"'.$this->array [$key][1].'","layout":"top","type":"error", "closeButton":"true"}';
	}

	public function has ()
	{
		return sizeof ($this->array);
	}

	public function clear ()
	{
		$session = self::$serviceManager->get('Session');
		
		$this->array = array ();

		$session->offsetSet('CACHE_MESSAGES', null);
	}
}