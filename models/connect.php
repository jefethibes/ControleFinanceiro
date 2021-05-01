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
			echo "Falha ao conectar com o banco de dados!";
		}
	}


	public function insert($values)
	{
		try {
			$sql = "INSERT INTO empresas(";
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
		} catch (Exception $e) {
			echo "Falha ao inserir os dados";
		}
	}

}

?>