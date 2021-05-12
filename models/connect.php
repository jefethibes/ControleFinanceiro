<?php
/**
 * 
 */
class ConnectDB
{

	protected $host = "localhost";
	protected $port = 5432;
	protected $dbname = "controlefinanceiro";
	protected $user = "postgres";
	protected $password = "2309";
	protected $db = null;

	function __construct()
	{
		try{
			$this->db = pg_connect("host=$this->host port=$this->port dbname=$this->dbname user=$this->user password=$this->password");
		} catch (Exception $e) {
			echo "Falha ao conectar com o banco de dados! " . $e;
		}
	}

	public function list_one($table, $id)
	{
		try{
			$sql = "SELECT * FROM $table where id = $id;";
			$values = pg_query($this->db, $sql);
			pg_close($this->db);
			if (pg_num_rows($values) == 0) {
				return false;
			} else {
				return $values;
			}
		} catch (Exception $e) {
			return $e;
		}
	}

	public function new_delete($table, $id)
	{
		try{
			$sql = "DELETE FROM $table WHERE id = $id";
			pg_query($this->db, $sql);
			pg_close($this->db);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}	

	public function new_insert($table, $values)
	{
		try {
			$sql = "INSERT INTO $table(";
			$columns = null;
			$lines = null;
			$keys = array_keys($values);
			foreach ($values as $key => $value) {
				if(end($keys) == $key){
					$columns .= "$key) VALUES (";
					if (is_numeric($value)) {
						$lines .= "$value);";
					} else {
						$lines .= "'$value');";
					}
				} else {
					$columns .= "$key, ";
					if (is_numeric($value)) {
						$lines .= "$value, ";
					} else {
						$lines .= "'$value', ";
					}
				}
			}
			$sql .= $columns .= $lines;
			pg_query($this->db, $sql);
			pg_close($this->db);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	public function new_list($table)
	{
		try{
			$sql = "SELECT * FROM $table;";
			$values = pg_query($this->db, $sql);
			pg_close($this->db);
			echo var_dump($values);
			if(pg_num_rows($values) == 0){
				return false;
			} else {
				return pg_fetch_all($values);
			} 
		} catch (Exception $e) {
			return $e;
		}
	}

	public function new_update($table, $values, $id)
	{
		try{
			$sql = "UPDATE $table SET ";
			$keys = array_keys($values);
			foreach ($values as $key => $value) {
				if (end($keys) == $key) {
					if (is_numeric($value)) {
						$sql .= "$key = $value WHERE id = $id;";
					} else {
						$sql .= "$key = '$value' WHERE id = $id;";
					}
				} else {
					if (is_numeric($value)) {
						$sql .= "$key = $value, ";
					} else {
						$sql .= "$key = '$value', ";
					}
				}				
			}
			pg_query($this->db, $sql);
			pg_close($this->db);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}					
}

?>