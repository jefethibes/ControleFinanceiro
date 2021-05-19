<?php
/**
 * 
 */
include("users_connect.php");

class UsersModel extends UsersConnect
{
	
	private $username;
	private $password;

	public function setUsername($string)
	{
		$this->username = $string;
	}

	public function setPassword($string)
	{
		$this->password = $string;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function add_user()
	{
		return $this->insert_user($this->getUsername(), $this->getPassword());
	}

}
?>