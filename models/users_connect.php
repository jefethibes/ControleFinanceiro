<?php 
/**
 * 
 */
include("connect.php");

class UsersConnect extends ConnectDB
{
	
	public function insert_user($username, $password)
	{
		$check_user = "SELECT * FROM users WHERE username = '$username';";
		$result = pg_query($this->db, $check_user);
		if (pg_num_rows($result) == 0) {
			$sql = "INSERT INTO users(username, password) VALUES ('$username', '$password');";
			pg_query($this->db, $sql);
			return true;
		} else {
			return false;
		}
	}

	public function delete_user($id)
	{
		$check_num_users = $this->list_users();
		if (count($check_num_users) <= 1) {
			return false;
		} else {
			$sql = "DELETE FROM users WHERE id = $id;";
			pg_query($this->db, $sql);
			return true;
		}
	}

	public function list_users()
	{
		$sql = "SELECT * FROM users;";
		$result = pg_query($this->db, $sql);
		return pg_fetch_all($result);
	}
}
?>