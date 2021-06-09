<!DOCTYPE html>
<html lang="pt-br">

<?php
    include("head.php");
    include("../models/empresas_model.php");

    $empresa = new EmpresasModel();
?>

<body>
    <?php
        include("menu.php");
    ?>
    <br>
    <div id="modalForm" class="modal fade" tabindex="-1" role="dialog">
       <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nova empresa:</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="container">
                    <form class="row g-3" id="formUsers" method="post" action="../controllers/empresas_controller.php?log=insert">
                        <div class="form-group">
                            <label>Razão social:</label>
                            <input class="form-control" type="text" name="razaoSocial" id="razaoSocial" minlength="4" maxlength="150" required>
                        </div>
                        <div class="form-group">
                            <label>CNPJ:</label>
                            <input class="form-control" type="text" name="cnpj" id="cnpj" minlength="4" maxlength="20" required>
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Salvar</button>
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
                    Empresa não pode ser removido! Existem investimentos cadastrados :(
                <?php endif ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
        <div class="table-responsive">
            <table id="mytable" class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th><input type="text" id="txtColuna1" placeholder="Busca" class="form-control" /></th>
                        <th><input type="text" id="txtColuna2" placeholder="Busca" class="form-control" /></th>
                        <th><input type="text" id="txtColuna3" placeholder="Busca" class="form-control" /></th>
                        <th><input type="text" id="txtColuna4" placeholder="Busca" class="form-control" /></th>
                        <th>
                            <div class="input-group">
                                <select name="state" id="maxRows" class="form-control">
                                    <option>Paginação</option>
                                    <option value="10">10</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="999999999">Todos</option>
                                </select>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalForm"><i class="bi bi-person-plus"></i> add empresa</button>
                            </div>
                        </th>
                    </tr>
                    <tr>
                    	<th class="text-center">Razão Social</th>
                    	<th class="text-center">CNPJ</th>
                    	<th class="text-center">Código</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Alt/Del</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($empresa->list() as $values): ?>
                        <div id="modalForm<?php echo $values['id']; ?>" class="modal fade" tabindex="-1" role="dialog">
                           <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Alterar empresa:</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar"></button>
                                    </div>
                                    <br>
                                    <div class="container">
                                         <form class="row g-3" id="formUsers" method="post" action="../controllers/empresas_controller.php?log=update&&id=<?php echo $values['id']; ?>">
					                        <div class="form-group">
					                            <label>Razão social:</label>
					                            <input class="form-control" type="text" name="razaoSocial" id="razaoSocial" minlength="4" maxlength="150" value="<?php echo $values['razao_social']; ?>" required>
					                        </div>
					                        <div class="form-group">
					                            <label>CNPJ:</label>
					                            <input class="form-control" type="text" name="cnpj" id="cnpj" minlength="4" maxlength="20" value="<?php echo $values['cnpj']; ?>" required>
					                        </div>
					                        <div class="form-row">
					                        	<div class="row">	                     
							                        <div class="form-group col-md-6">
							                        	<label for="codigo">Código:</label>
							                            <input class="form-control" type="text" name="codigo" id="codigo" minlength="4" maxlength="10" value="<?php echo $values['codigo']; ?>" required>
							                        </div>
							                        <div class="form-group col-md-6">
							                        	<label for="tipo">Tipo:</label>
							                        	<select class="form-control" name="tipo" id="tipo">
							                        		<option value="<?php echo $values['tipo']; ?>"><?php echo $values['tipo']; ?></option>
							                        		<option value="ON">ON</option>
							                        		<option value="PN">PN</option>
							                        		<option value="UNITS">UNITS</option>
							                        		<option value="FII">FII</option>
							                        	</select>
							                        </div>
							                    </div>
					                    	</div>
					                    	<br>
					                        <div class="form-group text-center">
					                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					                            <button type="submit" class="btn btn-success">Salvar</button>
					                        </div>
					                        <br>
					                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <tr>
                            <td class="text-center"><?php echo $values["razao_social"]; ?></td>
                            <td class="text-center"><?php echo $values["cnpj"]; ?></td>
                            <td class="text-center"><?php echo $values["codigo"]; ?></td>
                            <td class="text-center"><?php echo $values["tipo"]; ?></td>
                            <td class="text-center"><a type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#modalForm<?php echo $values['id']; ?>"><i class="bi bi-chat-square-text"></i></a> / <a href="../controllers/empresas_controller.php?log=delete&&id=<?php echo $values['id']; ?>" class="btn btn-link-danger btn-sm"><i class="bi bi-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="pagination-container">
                <nav>
                    <ul class="pagination"></ul>
                </nav>
            </div>
        </div>
    </div>
</body>
<?php
    include("base.php");
?>
<script src="../static/js/pagination.js"></script>
<script src="../static/js/search.js"></script>
</html>