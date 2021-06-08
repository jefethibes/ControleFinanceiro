<?php
/**
 * 
 */
include("connect.php");

class InvestimentosConnect extends ConnectDB
{
	
	public function insert($codigo, $valor, $data_compra, $data_venda=null)
	{
		if (!$data_venda) {
			$sql = "INSERT INTO investimentos(codigo_empresa, valor, quantidade, data_compra) VALUES ('$codigo', $valor, $data_compra);";
		} else {
			$sql = "INSERT INTO investimentos(codigo_empresa, valor, quantidade, data_compra, data_venda) VALUES ('$codigo', $valor, $data_compra, $data_venda);";
		}
		pg_query($this->db, $sql);
		return true;
	}
}
?>