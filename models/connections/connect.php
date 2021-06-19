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
	protected $db_password = "2309";
	protected $db = null;

	function __construct()
	{
		try{
			$this->db = pg_connect("host=$this->host port=$this->port dbname=$this->dbname user=$this->user password=$this->db_password");
		} catch (Exception $e) {
			echo "Falha ao conectar com o banco de dados! " . $e;
		}
	}

}

?>