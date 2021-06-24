<!DOCTYPE html>
<html lang="pt-br">

<?php
    include("../bases/head.php");
    include("../bases/paginacao_busca.php");
    include("../../models/connections/empresas_connect.php");

    $empresa = new EmpresasConnect();
    $lista_empresas = $empresa->list();
?>

<body>
    <?php
        include("../bases/menu.php");
    ?>
    <br>
    <div id="modalForm" class="modal fade" tabindex="-1" role="dialog">
       <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nova Empresa:</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="container">
                    <form class="row g-3" id="formUsers" method="post" action="../../controllers/empresas_controller.php?log=insert">
                        <div class="form-group">
                            <label>Razão social:</label>
                            <input class="form-control" type="text" name="razaoSocial" id="razaoSocial" minlength="4" maxlength="150" required>
                        </div>
                        <div class="form-group">
                            <label>CNPJ:</label>
                            <input class="form-control cnpj-mask" type="text" name="cnpj" id="cnpj" minlength="4" maxlength="20" required>
                        </div>
                        <div class="form-row">
                        	<div class="row">	                     
		                        <div class="form-group col-md-6">
		                        	<label for="codigo">Código:</label>
		                            <input class="form-control" type="text" name="codigo" id="codigo" minlength="4" maxlength="10" required>
		                        </div>
		                        <div class="form-group col-md-6">
		                        	<label for="tipo">Tipo:</label>
		                        	<select class="form-control" name="tipo" id="tipo">
		                        		<option value="ON">ON</option>
		                        		<option value="PN">PN</option>
		                        		<option value="UNITS">UNITS</option>
		                        		<option value="FII">FII</option>
		                        	</select>
		                        </div>
		                    </div>
                    	</div>
                        <div class="form-group text-center">
                            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success btn-lg">Salvar</button>
                        </div>
                        <p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php if ($_GET["log"] == 0): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php if ($_GET["method"] == "insert"): ?>
                    Código já cadastrado! :(
                <?php elseif ($_GET["method"] == "delete"): ?>
                    Empresa não pode ser removido! Existem investimentos ou proventos cadastrados :(
                <?php endif ?>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif ($_GET["log"] == 1): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php if ($_GET["method"] == "insert"): ?>
                    Empresa cadastrada com sucesso! :)
                <?php elseif ($_GET["method"] == "delete"): ?>
                    Empresa removida com sucesso! :)
                <?php elseif ($_GET["method"] == "update"): ?>
                    Empresa alterado com sucesso! :)
                <?php endif ?>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#on" role="tab" aria-controls="nav-home" aria-selected="true">ON</a>
                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#pn" role="tab" aria-controls="nav-contact" aria-selected="false">PN</a>
                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#units" role="tab" aria-controls="nav-contact" aria-selected="false">UNITS</a>
                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#fii" role="tab" aria-controls="nav-profile" aria-selected="false">FII</a>
                <a type="button" class="nav-link" data-toggle="modal" data-target="#modalForm">Novo</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="on" role="tabpanel" aria-labelledby="nav-home-tab">
                <?php include("empresas_on.php"); ?>
            </div>
            <div class="tab-pane fade" id="pn" role="tabpanel" aria-labelledby="nav-profile-tab">
                <?php include("empresas_pn.php"); ?>
            </div>
            <div class="tab-pane fade" id="units" role="tabpanel" aria-labelledby="nav-profile-tab">
                <?php include("empresas_units.php"); ?>
            </div>
            <div class="tab-pane fade" id="fii" role="tabpanel" aria-labelledby="nav-profile-tab">
                <?php include("empresas_fii.php"); ?>
            </div>
        </div>
    </div>
</body>
</html>