<?php
/**
 * 
 */
include("../models/models/users_model.php");

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
		} elseif ($_GET["log"] == "update") {
			$this->update_user();
		}
	}

	public function new_user()
	{
		$this->manager->setUsername($_POST["username"]);
		$this->manager->setPassword($_POST["password"]);
		$result = $this->manager->add_user();
		if (!$result) {
			header("Location: ../views/users/users.php?log=0&&method=insert");
		} else {
			header("Location: ../views/users/users.php?log=1&&method=insert");
		}
	}

	public function remove_user()
	{
		$this->manager->setId($_GET["id"]);
		$result = $this->manager->del_user();
		if (!$result) {
			header("Location: ../views/users/users.php?log=0&&method=delete");
		} else {
			header("Location: ../views/users/users.php?log=1&&method=delete");
		}
	}

	public function update_user()
	{
		$this->manager->setId($_GET["id"]);
		$this->manager->setUsername($_POST["username"]);
		$this->manager->setPassword($_POST["password"]);
		$result = $this->manager->alt_user();
		if (!$result) {
			header("Location: ../views/users/users.php?log=0&&method=insert");
		} else {
			header("Location: ../views/users/users.php?log=1&&method=update");
		}
	}
}

new UsersController();
?>