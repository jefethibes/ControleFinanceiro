<?php 
/**
 * 
 */
include("../models/connections/empresas_connect.php");

class EmpresasModel extends EmpresasConnect
{
	
	private $id;
	private $razao_social;
	private $cnpj;
	private $codigo;
	private $tipo;

	public function setId($int)
	{
		$this->id = $int;
	}

	public function setRazaoSocial($string)
	{
		$this->razao_social = $string;
	}

	public function setCnpj($string)
	{
		$this->cnpj = $string;
	}

	public function setCodigo($string)
	{
		$this->codigo = $string;
	}

	public function setTipo($string)
	{
		$this->tipo = $string;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getRazaoSocial()
	{
		return $this->razao_social;
	}

	public function getCnpj()
	{
		return $this->cnpj;
	}

	public function getCodigo()
	{
		return $this->codigo;
	}

	public function getTipo()
	{
		return $this->tipo;
	}

	public function add_empresas()
	{
		return $this->insert($this->getRazaoSocial(), $this->getCnpj(), $this->getCodigo(), $this->getTipo());
	}

	public function del_empresas()
	{
		return $this->delete($this->getCodigo());
	}

	public function alt_empresas()
	{
		return $this->update($this->getId(), $this->getRazaoSocial(), $this->getCnpj(), $this->getCodigo(), $this->getTipo());
	}
}
?>