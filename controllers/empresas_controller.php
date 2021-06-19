<?php
/**
 * 
 */
include("../models/models/empresas_model.php");

class EmpresasController
{
	
	private $manager;

	function __construct()
	{
		$this->manager = new EmpresasModel();
		if ($_GET["log"] == "insert") {
			$this->new_empresa();
		} elseif ($_GET["log"] == "delete") {
			$this->remove_empresa();
		} elseif ($_GET["log"] == "update") {
			$this->update_empresa();
		}
	}

	public function new_empresa()
	{
		$this->manager->setRazaoSocial($_POST["razaoSocial"]);
		$this->manager->setCnpj($_POST["cnpj"]);
		$this->manager->setCodigo($_POST["codigo"]);
		$this->manager->setTipo($_POST["tipo"]);
		$result = $this->manager->add_empresas();
		if (!$result) {
			header("Location: ../views/empresas/empresas.php?log=0&&method=insert");
		} else {
			header("Location: ../views/empresas/empresas.php?log=1&&method=insert");
		}
	}

	public function remove_empresa()
	{
		$this->manager->setCodigo($_GET["codigo"]);
		$result = $this->manager->del_empresas();
		if (!$result) {
			header("Location: ../views/empresas/empresas.php?log=0&&method=delete");
		} else {
			header("Location: ../views/empresas/empresas.php?log=1&&method=delete");
		}
	}

	public function update_empresa()
	{
		$this->manager->setId($_GET["id"]);
		$this->manager->setRazaoSocial($_POST["razaoSocial"]);
		$this->manager->setCnpj($_POST["cnpj"]);
		$this->manager->setCodigo($_POST["codigo"]);
		$this->manager->setTipo($_POST["tipo"]);
		$result = $this->manager->alt_empresas();
		if (!$result) {
			header("Location: ../views/empresas/empresas.php?log=0&&method=insert");
		} else {
			header("Location: ../views/empresas/empresas.php?log=1&&method=update");
		}
	}
}

new EmpresasController();
?>