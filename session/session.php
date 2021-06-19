<?php
/**
  * 
  */
 class Session
 {
 	
 	function __construct()
 	{
 		if (!isset($_SESSION)) session_start();

		if (!isset($_SESSION["username"])) {
			
			session_destroy();

			header("Location: ../views/home/login.php?log=null");
		}
 	}
 } 

new Session();
?>