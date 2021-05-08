<?php
	include("../models/validate_login.php");

	if (!empty($_POST) and (empty($_POST["username"]) or empty($_POST["password"]))) {
		header("Location: ../views/login.html");
	}

	$username = $_POST["username"];
	$password = $_POST["password"];

	$db = new ValidateLogin();
	$dados = $db->validate($username, $password);

	if ($dados == false) {
		header("Location: ../views/login.html");
	} else {
		if ($dados["password"] == $password) {
			$_SESSION = $username;
			header("Location: ../views/index.html");
		} else {
			header("Location: ../views/login.html");
		}
	}
?>