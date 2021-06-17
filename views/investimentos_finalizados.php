<div class="table-responsive">
    <table id="mytable" class="table table-bordered table-sm">
        <thead>
            <tr>
                <th><input type="text" id="txtColuna1" placeholder="Busca" class="form-control" /></th>
                <th><input type="text" id="txtColuna2" placeholder="Busca" class="form-control" /></th>
                <th><input type="text" id="txtColuna3" placeholder="Busca" class="form-control" /></th>
                <th><input type="text" id="txtColuna4" placeholder="Busca" class="form-control" /></th>
                <th><input type="text" id="txtColuna5" placeholder="Busca" class="form-control" /></th>
                <th><input type="text" id="txtColuna6" placeholder="Busca" class="form-control" /></th>
                <th><input type="text" id="txtColuna7" placeholder="Busca" class="form-control" /></th>
                <th><input type="text" id="txtColuna8" placeholder="Busca" class="form-control" /></th>
                <th><input type="text" id="txtColuna9" placeholder="Busca" class="form-control" /></th>
                <th><input type="text" id="txtColuna10" placeholder="Busca" class="form-control" /></th>
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
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalForm"><i class="bi bi-plus-square"></i></button>
                    </div>
                </th>
            </tr>
            <tr>
                <th class="text-center">Código</th>
                <th class="text-center">Valor C/</th>
                <th class="text-center">Qnt</th>
                <th class="text-center">Total C/</th>
                <th class="text-center">Data C/</th>
                <th class="text-center">Valor V/</th>
                <th class="text-center">Data V/</th>
                <th class="text-center">Total V/</th>
                <th class="text-center">Lucro/Prejuizo</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Alt/Del</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista_investimentos as $values): ?>
                <?php if($values["valor_venda"]): ?>
                    <div id="modalForm<?php echo $values['id']; ?>" class="modal fade" tabindex="-1" role="dialog">
                       <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Alterar Investimento:</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <br>
                                <div class="container">
                                     <form class="row g-3" id="formUsers" method="post" action="../controllers/investimentos_controller.php?log=update&&id=<?php echo $values['id']; ?>">
                                        <div class="row">                        
                                            <div class="form-group col-md-4">
                                                <label>Código Empresa:</label>
                                                <select class="form-control" type="text" name="codigo_empresa" id="codigo_empresa">
                                                    <option value="<?php echo $values['codigo_empresa']; ?>"><?php echo $values['codigo_empresa']; ?></option>
                                                    <?php foreach ($lista_codigos as $value) :?>
                                                        <option value="<?php echo $value['codigo']; ?>"><?php echo $value['codigo']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Quantidade:</label>
                                                <input class="form-control" type="number" name="quantidade" id="quantidade" value="<?php echo $values['quantidade']; ?>" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Tipo Investimento:</label>
                                                <select class="form-control" type="text" name="tipo_investimento" id="tipo_investimento">
                                                    <option value="<?php echo $values['tipo_investimento']; ?>"><?php echo $values['tipo_investimento']; ?></option>
                                                    <option value="Buy and Hold">Buy and Hold</option>
                                                    <option value="Swing Trade">Swing Trade</option>
                                                    <option value="Day Trade">Day Trade</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">   
                                            <div class="form-group col-md-6">
                                                <label>Valor Compra:</label>
                                                <input class="form-control" type="number" step="0.01" name="valor" id="valor" value="<?php echo $values['valor']; ?>" required>
                                            </div>                     
                                            <div class="form-group col-md-6">
                                                <label>Data Compra:</label>
                                                <input class="form-control" type="date" name="data_compra" id="data_compra" value="<?php echo $values['data_compra']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row">   
                                            <div class="form-group col-md-6">
                                                <label>Valor Venda:</label>
                                                <input class="form-control" type="number" step="0.01" name="valor_venda" id="valor_venda" value="<?php echo $values['valor_venda']; ?>" required>
                                            </div>                     
                                            <div class="form-group col-md-6">
                                                <label>Data Venda:</label>
                                                <input class="form-control" type="date" name="data_venda" id="data_venda" value="<?php echo $values['data_venda']; ?>">
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
                        <td class="text-center"><?php echo $values["codigo_empresa"]; ?></td>
                        <td class="text-center"><?php echo $values["valor"]; ?></td>
                        <td class="text-center"><?php echo $values["quantidade"]; ?></td>
                        <td class="text-center"><?php echo $values["valor"]*$values["quantidade"]; ?></td>
                        <td class="text-center"><?php echo $values["data_compra"]; ?></td>
                        <td class="text-center"><?php echo $values["valor_venda"]; ?></td>
                        <td class="text-center"><?php echo $values["data_venda"]; ?></td>
                        <?php if (!$values["valor_venda"]): ?>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                        <?php else: ?> 
                            <td class="text-center"><?php echo $values["valor_venda"]*$values["quantidade"]; ?></td>
                            <td class="text-center"><?php echo ($values["valor_venda"]*$values["quantidade"])-($values["valor"]*$values["quantidade"]); ?></td>
                        <?php endif; ?>
                        <td class="text-center"><?php echo $values["tipo_investimento"]; ?></td>
                        <td class="text-center"><a type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#modalForm<?php echo $values['id']; ?>"><i class="bi bi-chat-square-text"></i></a> / <a href="../controllers/investimentos_controller.php?log=delete&&id=<?php echo $values['id']; ?>" class="btn btn-link-danger btn-sm"><i class="bi bi-trash"></i></a></td>
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