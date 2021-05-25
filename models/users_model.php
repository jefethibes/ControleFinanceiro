<?php
/**
 * 
 */
include("users_connect.php");

class UsersModel extends UsersConnect
{
	
	private $id;
	private $username;
	private $password;

	public function setId($int)
	{
		$this->id = $int;
	}

	public function setUsername($string)
	{
		$this->username = $string;
	}

	public function setPassword($string)
	{
		$this->password = $string;
	}

	public function getId()
	{
		return $this->id;
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
		return $this->insert($this->getUsername(), $this->getPassword());
	}

	public function del_user()
	{
		return $this->delete($this->getId());
	}

	public function alt_user()
	{
		return $this->update($this->getId(), $this->getUsername(), $this->getPassword());
	}
}
?>