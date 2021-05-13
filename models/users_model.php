<?php
	/**
	 * 
	 */
	include("connect.php");

	class UsersModel extends ConnectDB
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

		public function new_user()
		{
			$array = array
			(
				"username" => $this->getUsername(),
				"password" => $this->getPassword()
			);
			return $this->new_insert("users", $array);
		}
	}
?>