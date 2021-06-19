<?php
/**
 * 
 */
include("connect.php");

class InvestimentosConnect extends ConnectDB
{
	
	public function insert($codigo, $valor, $quantidade, $data_compra, $valor_venda, $data_venda, $tipo_investimento)
	{
		if (!$data_venda || !$valor_venda) {
			$sql = "INSERT INTO investimentos(codigo_empresa, valor, quantidade, data_compra, tipo_investimento) VALUES ('$codigo', $valor, $quantidade, '$data_compra', '$tipo_investimento');";
		} else {
			$sql = "INSERT INTO investimentos(codigo_empresa, valor, quantidade, data_compra, valor_venda, data_venda, tipo_investimento) VALUES ('$codigo', $valor, $quantidade, '$data_compra', $valor_venda, '$data_venda', '$tipo_investimento');";
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

	public function delete($id)
	{
		$sql = "DELETE FROM investimentos WHERE id = $id;";
		pg_query($this->db, $sql);
		return true;
	}

	public function update($id, $codigo, $valor, $quantidade, $data_compra, $valor_venda, $data_venda, $tipo_investimento)
	{
		if (!$data_venda || !$valor_venda) {
			return false;
		} elseif(!$data_venda && !$valor_venda) {
			$sql = "UPDATE investimentos SET codigo_empresa = '$codigo', valor = $valor, quantidade = $quantidade, data_compra = '$data_compra', tipo_investimento = '$tipo_investimento' WHERE id = $id;";
		} else {
			$sql = "UPDATE investimentos SET codigo_empresa = '$codigo', valor = $valor, quantidade = $quantidade, data_compra = '$data_compra', valor_venda = $valor_venda, data_venda = '$data_venda', tipo_investimento = '$tipo_investimento' WHERE id = $id;";
		}
		pg_query($this->db, $sql);
		return true;
	}
}
?>