<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Exception
{
	protected $CI="";
	
	public function __construct()
	{
		$this->CI=& get_instance();
	}
	
	public function throw_mysql_exception($success) {
		
		if(!$success)
			throw new Exception("You cant delete these records with foreign key references");	
		else
			return true;
	}
        
}        