<?php
	session_start();

	$token = md5(session_id());

	if (isset($_GET["token"]) && $_GET["token"] === $token) {
		session_destroy();
		header("Location: ../../views/login.php?log=null");
		exit();
	}

?>