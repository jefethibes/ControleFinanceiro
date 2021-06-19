<?php 
/**
 * 
 */
include("connect.php");

class ProventosConnect extends ConnectDB
{
	
	public function insert($codigo, $valor, $mes, $ano)
	{
		$sql = "INSERT INTO proventos(codigo_empresa, valor, mes, ano) VALUES ('$codigo', $valor, '$mes', $ano);";
		pg_query($this->db, $sql);
		return true;
	}

	public function update($id, $codigo, $valor, $mes, $ano)
	{
		$sql = "UPDATE proventos SET codigo_empresa = '$codigo', valor = $valor, mes = '$mes', ano = $ano WHERE id = $id;";
		pg_query($this->db, $sql);
		return true;
	}

	public function delete($id)
	{
		$sql = "DELETE FROM proventos WHERE id = $id;";
		pg_query($this->db, $sql);
		return true;
	}

	public function list()
	{
		$sql = "SELECT * FROM proventos;";
		$result = pg_query($this->db, $sql);
		return pg_fetch_all($result);
	}

	public function list_codigo()
	{
		$sql = "SELECT codigo FROM empresas;";
		$result = pg_query($this->db, $sql);
		return pg_fetch_all($result);
	}
}
?>