<?php 
/**
 * 
 */
include("proventos_connect.php");

class ProventosModel extends ProventosConnect
{
	private $id;
	private $codigo;
	private $valor;
	private $mes;
	private $ano;

	public function setId($int)
	{
		$this->id = $int;
	}

	public function setCodigo($string)
	{
		$this->codigo = $string;
	}

	public function setValor($float)
	{
		$this->valor = $float;
	}

	public function setMes($string)
	{
		$this->mes = $string;
	}

	public function setAno($int)
	{
		$this->ano = $int;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getCodigo()
	{
		return $this->codigo;
	}

	public function getValor()
	{
		return $this->valor;
	}

	public function getMes()
	{
		return $this->mes;
	}

	public function getAno()
	{
		return $this->ano;
	}

	public function add_proventos()
	{
		return $this->insert($this->getCodigo(), $this->getValor(), $this->getMes(), $this->getAno());
	}

	public function alt_proventos()
	{
		return $this->update($this->getId(), $this->getCodigo(), $this->getValor(), $this->getMes(), $this->getAno());
	}

	public function del_proventos()
	{
		return $this->delete($this->getId());
	}
}
?>