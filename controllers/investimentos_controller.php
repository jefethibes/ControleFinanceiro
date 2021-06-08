<?php
/**
 * 
 */
include("../models/investimentos_model.php");

class InvestimentosController
{
	
	private $manager;

	function __construct()
	{
		$this->manager = new InvestimentosModel();
		if ($_GET["log"] == "insert") {
			$this->new_investimento();
		} elseif ($_GET["log"] == "delete") {
			$this->remove_investimento();
		} elseif ($_GET["log"] == "update") {
			$this->update_investimento();
		}
	}

	public function new_investimento()
	{
		$this->manager->setCodigo($_POST["codigo_empresa"]);
		$this->manager->setValor($_POST["valor"]);
		$this->manager->setQuantidade($_POST["quantidade"]);
		$this->manager->setDataCompra($_POST["data_compra"]);
		$this->manager->setDataVenda($_POST["data_venda"]);
		$result = $this->manager->add_investimentos();
		if (!$result) {
			header("Location: ../views/investimentos.php?log=0&&method=insert");
		} else {
			header("Location: ../views/investimentos.php?log=1&&method=insert");
		}
	}
}
?>