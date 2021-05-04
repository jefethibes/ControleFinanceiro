<?php
	require "vendor/autoload.php";

	$loader = new \Twig\Loader\FilesystemLoader("views");

	$twig = new \Twig\Environment($loader, [
		"debug" => true,
	]);

	echo $twig->render("login.html");
?>