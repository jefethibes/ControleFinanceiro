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
			$this->insert_user();
		}

		public function insert_user(){
			$this->db->setUsername($_POST["username"]);
			$this->db->setPassword($_POST["password"]);
			$result = $this->db->new_user();
			if (!$result) {
				header("Location: ../views/users.php?log=1");
			} else {
				header("Location: ../views/users.php?log=0");
			}
		}
	}

	if ($_GET["crud"] == 0) {
		new UsersController();
	}
?>