<<?php 
	/**
	 * 
	 */
	include("connect.php");

	class ValidateLogin extends ConnectDB
	{
		function validate($username, $password)
		{
			try{
				$sql = "SELECT username, password FROM users WHERE username='$username' and password='$password'";
				$validate = pg_query($this->db, $sql);
				pg_close($this->db);
				if (!$validate) {
					return false;
				} else {
					return pg_fetch_array($validate);
				}
			} catch (Exception $e) {
				echo $e;
			}
		}
	}
?>