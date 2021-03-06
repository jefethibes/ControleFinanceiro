<?php 
/**
 * 
 */
include("connect.php");

class EmpresasConnect extends ConnectDB
{
	
	public function insert($razao_social, $cnpj, $codigo, $tipo)
	{
		$result = $this->check_empresas($codigo);
		if (count($result) == 0) {
			$sql = "INSERT INTO empresas(razao_social, cnpj, codigo, tipo) VALUES ('$razao_social', '$cnpj', '$codigo', '$tipo');";
			pg_query($this->db, $sql);
			return true;
		} else {
			return false;
		}
	}

	public function delete($codigo)
	{
		$verifica_investimentos = "SELECT * FROM investimentos WHERE codigo_empresa = '$codigo';";
		$result_investimentos = pg_query($this->db, $verifica_investimentos);
		$verifica_proventos = "SELECT * FROM proventos WHERE codigo_empresa = '$codigo';";
		$result_proventos = pg_query($this->db, $verifica_proventos);
		if (pg_num_rows($result_investimentos) > 0 || pg_num_rows($result_proventos) > 0) {
			return false;
		} else {
			$sql = "DELETE FROM empresas WHERE codigo = '$codigo';";
			pg_query($this->db, $sql);
			return true;
		}
	}

	public function update($id, $razao_social, $cnpj, $codigo, $tipo)
	{
		$result = $this->list();
		foreach ($result as $value) {
			if ($value["id"] != $id && $value["codigo"] == $codigo) {
				return false;
			}
		}
		$sql = "UPDATE empresas SET razao_social = '$razao_social', cnpj = '$cnpj', codigo = '$codigo', tipo = '$tipo' WHERE id = $id;";
		pg_query($this->db, $sql);
		return true;
	}

	public function list()
	{
		$sql = "SELECT * FROM empresas;";
		$result = pg_query($this->db, $sql);
		return pg_fetch_all($result);
	}

	public function check_empresas($codigo)
	{
		$sql = "SELECT * FROM empresas WHERE codigo = '$codigo';";
		$result = pg_query($this->db, $sql);
		return pg_fetch_all($result);
	}

}
?>