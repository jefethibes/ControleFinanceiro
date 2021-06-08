<?php 
/**
 * 
 */
include("investimentos_connect.php");

class InvestimentosModel extends InvestimentosConnect
{
	
	private $id;
	private $codigo_empresa;
	private $valor;
	private $quantidade;
	private $data_compra;
	private $data_venda;

	public function setId($int)
	{
		$this->id = $id;
	}

	public function setCodigo($string)
	{
		$this->codigo = $codigo;
	}

	public function setValor($float)
	{
		$this->valor = $valor;
	}

	public function setQuantidade($int)
	{
		$this->quantidade = $int;
	}

	public function setDataCompra($data)
	{
		$this->data_compra = $data;
	}

	public function setDataVenda($data)
	{
		$this->data_venda = $data;
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

	public function getQuantidade()
	{
		return $this->quantidade;
	}

	public function getDataCompra()
	{
		return $this->data_compra;
	}

	public function getDataVenda()
	{
		return $this->data_venda;
	}

	public function add_investimentos()
	{
		return $this->insert($this->getCodigo(), $this->getValor(), $this->getQuantidade(), $this->getDataCompra(), $this->getDataVenda());
	}
}
?>