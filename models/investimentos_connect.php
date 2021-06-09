<?php
/**
 * 
 */
include("connect.php");

class InvestimentosConnect extends ConnectDB
{
	
	public function insert($codigo, $valor, $quantidade, $data_compra, $valor_venda, $data_venda)
	{
		if (!$data_venda || !$valor_venda) {
			$sql = "INSERT INTO investimentos(codigo_empresa, valor, quantidade, data_compra) VALUES ('$codigo', $valor, $quantidade, '$data_compra');";
		} else {
			$sql = "INSERT INTO investimentos(codigo_empresa, valor, quantidade, data_compra, valor_venda, data_venda) VALUES ('$codigo', $valor, $quantidade, '$data_compra', $valor_venda, '$data_venda');";
		}
		pg_query($this->db, $sql);
		return true;
	}

	public function list_codigo()
	{
		$sql = "SELECT codigo FROM empresas;";
		$result = pg_query($this->db, $sql);
		return pg_fetch_all($result);
	}

	public function list()
	{
		$sql = "SELECT * FROM investimentos;";
		$result = pg_query($this->db, $sql);
		return pg_fetch_all($result);
	}
}
?>