<?php 
/**
 * 
 */
include("../models/connections/investimentos_connect.php");

class InvestimentosModel extends InvestimentosConnect
{
	
	private $id;
	private $codigo_empresa;
	private $valor;
	private $quantidade;
	private $data_compra;
	private $valor_venda;
	private $data_venda;
	private $tipo_investimento;

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

	public function setQuantidade($int)
	{
		$this->quantidade = $int;
	}

	public function setDataCompra($data)
	{
		$this->data_compra = $data;
	}

	public function setValorVenda($float)
	{
		$this->valor_venda = $float;
	}

	public function setDataVenda($data)
	{
		$this->data_venda = $data;
	}

	public function setTipoInvestimento($string)
	{
		$this->tipo_investimento = $string;
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

	public function getValorVenda()
	{
		return $this->valor_venda;
	}

	public function getDataVenda()
	{
		return $this->data_venda;
	}

	public function getTipoInvestimento()
	{
		return $this->tipo_investimento;
	}

	public function add_investimentos()
	{
		return $this->insert($this->getCodigo(), $this->getValor(), $this->getQuantidade(), $this->getDataCompra(), $this->getValorVenda(), $this->getDataVenda(), $this->getTipoInvestimento());
	}

	public function del_investimentos()
	{
		return $this->delete($this->getId());
	}

	public function alt_investimentos()
	{
		return $this->update($this->getId(), $this->getCodigo(), $this->getValor(), $this->getQuantidade(), $this->getDataCompra(), $this->getValorVenda(), $this->getDataVenda(), $this->getTipoInvestimento());
	}
}
?>