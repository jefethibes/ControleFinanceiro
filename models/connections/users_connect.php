<?php 
/**
 * 
 */
include("connect.php");

class UsersConnect extends ConnectDB
{
	
	public function insert($username, $password)
	{
		$result = $this->check_user($username);
		if (count($result) == 0) {
			$sql = "INSERT INTO users(username, password) VALUES ('$username', '$password');";
			pg_query($this->db, $sql);
			return true;
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		$check_num_users = $this->list();
		if (count($check_num_users) <= 1) {
			return false;
		} else {
			$sql = "DELETE FROM users WHERE id = $id;";
			pg_query($this->db, $sql);
			return true;
		}
	}

	public function list()
	{
		$sql = "SELECT * FROM users;";
		$result = pg_query($this->db, $sql);
		return pg_fetch_all($result);
	}

	public function update($id, $username, $password)
	{
		$result = $this->check_user($username);
		$check_id = false;
		foreach ($result as $value) {
			if ($value["id"] == $id) {
				$check_id = true;
			}
		}
		if (count($result) == 0 || $check_id == true) {
			$sql = "UPDATE users SET username = '$username', password = '$password' WHERE id = $id";
			pg_query($this->db, $sql);
			return true;
		} else {
			return false;
		}
	}

	public function check_user($username)
	{
		$sql = "SELECT * FROM users WHERE username = '$username';";
		$result = pg_query($this->db, $sql);
		return pg_fetch_all($result);
	}
}
?>