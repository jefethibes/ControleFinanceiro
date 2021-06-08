<!DOCTYPE html>
<html lang="pt-br">

<?php
    include("head.php");
    include("../models/investimentos_model.php");
    include("../models/empresas_model.php");

    $investimentos = new InvestimentosModel();
    $empresas = new EmpresasModel();
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
                    <h5 class="modal-title" id="exampleModalLabel">Novo Investimento:</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="container">
                    <form class="row g-3" id="formUsers" method="post" action="../controllers/investimentos_controller.php?log=insert">
                        <div class="form-row">
                            <div class="row">                        
                                <div class="form-group col-md-6">
                                    <label>Código Empresa:</label>
                                    <select class="form-control" type="text" name="codigo_empresa" id="codigo_empresa">
                                        <?php foreach ($empresas->list_codigo() as $values) :?>
                                            <option value="<?php $values; ?>"><?php $values; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Valor:</label>
                                    <input class="form-control" type="number" step="0.01" name="valor" id="valor" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Quantidade:</label>
                                    <input class="form-control" type="number" name="quantidade" id="quantidade" required>
                                </div>
                            </div>
                            <div class="row">                        
                                <div class="form-group col-md-6">
                                    <label>Data Compra:</label>
                                    <input class="form-control" type="date" name="data_compra" id="data_compra" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Data Venda:</label>
                                    <input class="form-control" type="date" name="data_venda" id="data_venda">
                                </div>
                            </div>
                        </div>
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
    <div class="container">
        <?php if ($_GET["log"] == 0): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php if ($_GET["method"] == "insert"): ?>
                    Falha ao cadastrar! :(
                <?php elseif ($_GET["method"] == "delete"): ?>
                    Falha ao remover! :(
                <?php endif ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif ($_GET["log"] == 1): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php if ($_GET["method"] == "insert"): ?>
                    Investimento cadastrado com sucesso! :)
                <?php elseif ($_GET["method"] == "delete"): ?>
                    Investimento removido com sucesso! :)
                <?php elseif ($_GET["method"] == "update"): ?>
                    Investimento alterado com sucesso! :)
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
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalForm"><i class="bi bi-person-plus"></i> add investimento</button>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th class="text-center">Código Empresa</th>
                        <th class="text-center">Valor</th>
                        <th class="text-center">Quantidade C.</th>
                        <th class="text-center">Total Compra</th>
                        <th class="text-center">Data Compra</th>
                        <th class="text-center">Data Venda</th>
                        <th class="text-center">Quantidade V.</th>
                        <th class="text-center">Total Venda</th>
                        <th class="text-center">Lucro/Prejuizo</th>
                        <th class="text-center">Alt/Del</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($investimentos->list() as $values): ?>
                        <div id="modalForm<?php echo $values['id']; ?>" class="modal fade" tabindex="-1" role="dialog">
                           <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Alterar investimento:</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar"></button>
                                    </div>
                                    <br>
                                    <div class="container">
                                         <form class="row g-3" id="formUsers" method="post" action="../controllers/empresas_controller.php?log=update&&id=<?php echo $values['id']; ?>">
                                            <div class="row">                        
                                                <div class="form-group col-md-6">
                                                    <label>Código Empresa:</label>
                                                    <select class="form-control" type="text" name="codigo_empresa" id="codigo_empresa">
                                                        <option value="<?php echo $values['codigo_empresa']; ?>"></option>
                                                        <?php foreach ($empresas->list_codigo() as $values) :?>
                                                            <option value="<?php $values; ?>"><?php $values; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Valor:</label>
                                                    <input class="form-control" type="number" step="0.01" name="valor" id="valor" value="<?php echo $values['valor']; ?>" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Quantidade:</label>
                                                    <input class="form-control" type="number" name="quantidade" id="quantidade" value="<?php echo $values['quantidade']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="row">                        
                                                <div class="form-group col-md-6">
                                                    <label>Data Compra:</label>
                                                    <input class="form-control" type="date" name="data_compra" id="data_compra" value="<?php echo $values['data_compra']; ?>" required>
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
                            <td class="text-center"><?php echo $values["data_venda"]; ?></td>
                            <td class="text-center"><?php echo $values["valor_venda"]; ?></td>
                            <td class="text-center"><?php echo $values["quantidade_venda"]; ?></td>
                            <td class="text-center"><?php echo $values["valor_venda"]*$values["quantidade_venda"]; ?></td>
                            <td class="text-center"><?php echo ($values["valor"]*$values["quantidade"])-($values["valor_venda"]*$values["quantidade_venda"]); ?></td>
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
    include("base.php")
?>
<script src="../static/js/pagination.js"></script>
<script src="../static/js/search.js"></script>
</html>