<?php 
/**
 * 
 */
include("../models/proventos/proventos_model.php");

class ProventosController
{
	
	function __construct()
	{
		$this->manager = new ProventosModel();
		if ($_GET["log"] == "insert") {
			$this->new_provento();
		} elseif ($_GET["log"] == "delete") {
			$this->remove_provento();
		} elseif ($_GET["log"] == "update") {
			$this->update_provento();
		}
	}

	public function new_provento()
	{
		$this->manager->setCodigo($_POST["codigo_empresa"]);
		$this->manager->setValor($_POST["valor"]);
		$this->manager->setMes($_POST["mes"]);
		$this->manager->setAno($_POST["ano"]);
		$result = $this->manager->add_proventos();
		if (!$result) {
			header("Location: ../views/proventos/proventos.php?log=0&&method=insert");
		} else {
			header("Location: ../views/proventos/proventos.php?log=1&&method=insert");
		}
	}

	public function remove_provento()
	{
		$this->manager->setId($_GET["id"]);
		$result = $this->manager->del_proventos();
		if (!$result) {
			header("Location: ../views/proventos/proventos.php?log=0&&method=delete");
		} else {
			header("Location: ../views/proventos/proventos.php?log=1&&method=delete");
		}
	}

	public function update_provento()
	{
		$this->manager->setId($_GET["id"]);
		$this->manager->setCodigo($_POST["codigo_empresa"]);
		$this->manager->setValor($_POST["valor"]);
		$this->manager->setMes($_POST["mes"]);
		$this->manager->setAno($_POST["ano"]);
		$result = $this->manager->alt_proventos();
		if (!$result) {
			header("Location: ../views/proventos/proventos.php?log=0&&method=insert");
		} else {
			header("Location: ../views/proventos/proventos.php?log=1&&method=update");
		}
	}
}

new ProventosController();
?>