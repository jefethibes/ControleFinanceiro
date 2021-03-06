<?php
/**
 * 
 */
include("../models/connections/valida_login.php");

class Login
{
	
	function __construct()
	{
		session_start();

		if (!empty($_POST) and (empty($_POST["username"]) or empty($_POST["password"]))) {
			header("Location: ../views/home/login.php");
		}

		$username = $_POST["username"];
		$password = $_POST["password"];

		$db = new ValidateLogin();
		$dados = $db->validate($username, $password);

		if ($dados == false) {
			header("Location: ../views/home/login.php?log=0");
		} else {
			$_SESSION["username"] = $username;
			header("Location: ../views/home/home.php");
		}
	}
}

new Login();
?>