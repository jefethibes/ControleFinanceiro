<?php
/**
 * 
 */
include("../models/users_model.php");

class UsersController
{
	
	private $manager;

	function __construct()
	{
		$this->manager = new UsersModel();
		if ($_GET["log"] == "insert") {
			$this->new_user();
		} elseif ($_GET["log"] == "delete") {
			$this->remove_user();
		}
	}

	public function new_user(){
		$this->manager->setUsername($_POST["username"]);
		$this->manager->setPassword($_POST["password"]);
		$result = $this->manager->add_user();
		if (!$result) {
			header("Location: ../views/users.php?log=0&&method=insert");
		} else {
			header("Location: ../views/users.php?log=1&&method=insert");
		}
	}

	public function remove_user(){
		$result = $this->manager->delete_user($_GET["id"]);
		if (!$result) {
			header("Location: ../views/users.php?log=0&&method=delete");
		} else {
			header("Location: ../views/users.php?log=1&&method=delete");
		}
	}
}

new UsersController();
?>