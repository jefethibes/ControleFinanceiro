<?php
	/**
	 * 
	 */
	include("../models/users_model.php");

	class UsersController
	{
		
		private $db;

		function __construct()
		{
			$this->db = new UsersModel();
		}

		public function insert_user(){
			$this->db->setUsername($_POST["username"]);
			$this->db->setPassword($password = $_POST["password"]);
			$result = $this->db->new_user();
			if (!$result) {
				echo "false";
			} else {
				echo "true"
			}
		}
	}
?>