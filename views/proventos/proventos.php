<!DOCTYPE html>
<html lang="pt-br">

<?php
    include("../bases/head.php");
    include("../bases/paginacao_busca.php");
    include("../../models/connections/proventos_connect.php");

    $proventos = new ProventosConnect();
    $lista_proventos = $proventos->list();
    $lista_codigos = $proventos->list_codigo();
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
                    <h5 class="modal-title" id="exampleModalLabel">Novo Provento:</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="container">
                    <form class="row g-3" id="formUsers" method="post" action="../../controllers/proventos_controller.php?log=insert">
                        <div class="form-row">
                            <div class="row">                        
                                <div class="form-group col-md-6">
                                    <label>Código Empresa:</label>
                                    <select class="form-control" type="text" name="codigo_empresa" id="codigo_empresa">
                                        <?php foreach ($lista_codigos as $values): ?>
                                            <option value="<?php echo $values['codigo']; ?>"><?php echo $values["codigo"]; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Valor:</label>                              
                                    <input class="form-control" type="number" step="0.01" name="valor" id="valor" required>
                                </div>                                                            
                            </div>
                            <div class="row">  
                                <div class="form-group col-md-6">
                                    <label>Mês:</label>
                                    <select class="form-control" name="mes" id="mes">
                                        <option value="Janeiro">Janeiro</option>
                                        <option value="Fevereiro">Fevereiro</option>
                                        <option value="Março">Março</option>
                                        <option value="Abril">Abril</option>
                                        <option value="Maio">Maio</option>
                                        <option value="Junho">Junho</option>
                                        <option value="Julho">Julho</option>
                                        <option value="Agosto">Agosto</option>
                                        <option value="Setembro">Setembro</option>
                                        <option value="Outubro">Outubro</option>
                                        <option value="Novembro">Novembro</option>
                                        <option value="Dezembro">Dezembro</option>
                                    </select>
                                </div>                      
                                <div class="form-group col-md-6">
                                    <label>Ano:</label>
                                    <input class="form-control" type="number" name="ano" id="ano" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <?php if(count($lista_codigos) == 0): ?>
                                <p>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Por favor, cadastre uma empresa primeiro!
                                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php else: ?>
                                <button type="submit" class="btn btn-success">Salvar</button>
                            <?php endif; ?>
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
                    Falha ao cadastrar! :(
                <?php elseif ($_GET["method"] == "delete"): ?>
                    Falha ao remover! :(
                <?php endif ?>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif ($_GET["log"] == 1): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php if ($_GET["method"] == "insert"): ?>
                    Provento cadastrado com sucesso! :)
                <?php elseif ($_GET["method"] == "delete"): ?>
                    Povento removido com sucesso! :)
                <?php elseif ($_GET["method"] == "update"): ?>
                    Provento alterado com sucesso! :)
                <?php endif ?>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#on" role="tab" aria-controls="nav-home" aria-selected="true">Proventos</a>
                <a type="button" class="nav-link" data-toggle="modal" data-target="#modalForm">Novo</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="on" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                <th class="text-center">Código</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Mês</th>
                                <th class="text-center">Ano</th>
                                <th class="text-center">Alt/Del</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista_proventos as $values): ?>
                                <div id="modalForm<?php echo $values['id']; ?>" class="modal fade" tabindex="-1" role="dialog">
                                   <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Alterar Provento:</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar"></button>
                                            </div>
                                            <br>
                                            <div class="container">
                                                 <form class="row g-3" id="formUsers" method="post" action="../../controllers/proventos_controller.php?log=update&&id=<?php echo $values['id']; ?>">
                                                    <div class="row">                        
                                                        <div class="form-group col-md-6">
                                                            <label>Código Empresa:</label>
                                                            <select class="form-control" type="text" name="codigo_empresa" id="codigo_empresa">
                                                                <option value="<?php echo $values['codigo_empresa']; ?>"><?php echo $values['codigo_empresa']; ?></option>
                                                                <?php foreach ($lista_codigos as $value) :?>
                                                                    <option value="<?php echo $value['codigo']; ?>"><?php echo $value['codigo']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Valor:</label>
                                                            <input class="form-control" type="number" step="0.01" name="valor" id="valor" value="<?php echo $values['valor']; ?>" required>
                                                        </div>                                                            
                                                    </div>
                                                    <div class="row">  
                                                        <div class="form-group col-md-6">
                                                            <label>Mês:</label>
                                                            <select name="mes" id="mes">
                                                                <option value="<?php echo $values['mes']; ?>"><?php echo $values['mes']; ?></option>
                                                                <option value="Janeiro">Janeiro</option>
                                                                <option value="Fevereiro">Fevereiro</option>
                                                                <option value="Março">Março</option>
                                                                <option value="Abril">Abril</option>
                                                                <option value="Maio">Maio</option>
                                                                <option value="Junho">Junho</option>
                                                                <option value="Julho">Julho</option>
                                                                <option value="Agosto">Agosto</option>
                                                                <option value="Setembro">Setembro</option>
                                                                <option value="Outubro">Outubro</option>
                                                                <option value="Novembro">Novembro</option>
                                                                <option value="Dezembro">Dezembro</option>
                                                            </select>
                                                        </div>                      
                                                        <div class="form-group col-md-6">
                                                            <label>Ano:</label>
                                                            <input class="form-control" type="number" name="ano" id="ano" value="<?php echo $values['ano']; ?>" required>
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
                                    <td class="text-center"><?php echo $values["mes"]; ?></td>
                                    <td class="text-center"><?php echo $values["ano"]; ?></td>
                                    <td class="text-center"><a type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#modalForm<?php echo $values['id']; ?>"><i class="bi bi-chat-square-text"></i></a> / <a href="../../controllers/proventos_controller.php?log=delete&&id=<?php echo $values['id']; ?>" class="btn btn-link-danger btn-sm"><i class="bi bi-trash"></i></a></td>
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
        </div>
    </div>
</body>
</html>