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
            <?php foreach ($lista_empresas as $values): ?>
                <?php if($values["tipo"] == "FII"): ?>
                    <div id="modalForm<?php echo $values['id']; ?>" class="modal fade" tabindex="-1" role="dialog">
                       <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Alterar Empresa:</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <br>
                                <div class="container">
                                     <form class="row g-3" id="formUsers" method="post" action="../../controllers/empresas_controller.php?log=update&&id=<?php echo $values['id']; ?>">
    			                        <div class="form-group">
    			                            <label>Razão social:</label>
    			                            <input class="form-control" type="text" name="razaoSocial" id="razaoSocial" minlength="4" maxlength="150" value="<?php echo $values['razao_social']; ?>" required>
    			                        </div>
    			                        <div class="form-group">
    			                            <label>CNPJ:</label>
    			                            <input class="form-control cnpj-mask" type="text" name="cnpj" id="cnpj" minlength="4" maxlength="20" value="<?php echo $values['cnpj']; ?>" required>
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
    			                            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Cancelar</button>
    			                            <button type="submit" class="btn btn-success btn-lg">Salvar</button>
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
                        <td class="text-center"><a type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#modalForm<?php echo $values['id']; ?>"><i class="bi bi-chat-square-text"></i></a> / <a href="../../controllers/empresas_controller.php?log=delete&&codigo=<?php echo $values['codigo']; ?>" class="btn btn-link-danger btn-sm"><i class="bi bi-trash"></i></a></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination-container">
        <nav>
            <ul class="pagination"></ul>
        </nav>
    </div>
</div>