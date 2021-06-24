<!DOCTYPE html>
<html lang="pt-br">

<?php
    include("../bases/head.php");
    include("../bases/paginacao_busca.php");
    include("../../models/connections/investimentos_connect.php");

    $investimentos = new InvestimentosConnect();
    $lista_codigos = $investimentos->list_codigo();
    $lista_investimentos = $investimentos->list();
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
                    <h5 class="modal-title" id="exampleModalLabel">Novo Investimento:</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="container">
                    <form class="row g-3" id="formUsers" method="post" action="../../controllers/investimentos_controller.php?log=insert">
                        <div class="form-row">
                            <div class="row">                        
                                <div class="form-group col-md-4">
                                    <label>Código Empresa:</label>
                                    <select class="form-control" type="text" name="codigo_empresa" id="codigo_empresa">
                                        <?php foreach ($lista_codigos as $values): ?>
                                            <option value="<?php echo $values['codigo']; ?>"><?php echo $values["codigo"]; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Quantidade:</label>
                                    <input class="form-control" type="number" name="quantidade" id="quantidade" required>
                                </div> 
                                <div class="form-group col-md-4">
                                    <label>Tipo Investimento:</label>
                                    <select class="form-control" type="text" name="tipo_investimento" id="tipo_investimento">
                                        <option value="Buy And Hold">Buy And Hold</option>
                                        <option value="Swing Trade">Swing Trade</option>
                                        <option value="Day Trade">Day Trade</option>
                                    </select>
                                </div>                                                           
                            </div>
                            <div class="row">  
                                <div class="form-group col-md-6">
                                    <label>Valor:</label>
                                    <input class="form-control" type="number" step="0.01" name="valor" id="valor" required>
                                </div>                      
                                <div class="form-group col-md-6">
                                    <label>Data Compra:</label>
                                    <input class="form-control" type="date" name="data_compra" id="data_compra" required>
                                </div>
                            </div>
                            <div class="row">                        
                                <div class="form-group col-md-6">
                                    <label>Valor Venda:</label>
                                    <input class="form-control" type="number" step="0.01" name="valor_venda" id="valor_venda">
                                </div>  
                                <div class="form-group col-md-6">
                                    <label>Data Venda:</label>
                                    <input class="form-control" type="date" name="data_venda" id="data_venda">
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
                <?php elseif ($_GET["method"] == "update"): ?>
                    Os campos valor venda e data venda devem ser alterados simultaneamente! :(
                <?php endif ?>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
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
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#swingTrade" role="tab" aria-controls="nav-home" aria-selected="true">Swing Trade</a>
                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#dayTrade" role="tab" aria-controls="nav-contact" aria-selected="false">Day Trade</a>
                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#buyAndHold" role="tab" aria-controls="nav-contact" aria-selected="false">Buy and Hold</a>
                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#finalizados" role="tab" aria-controls="nav-profile" aria-selected="false">Finalizados</a>
                <a type="button" class="nav-link" data-toggle="modal" data-target="#modalForm">Novo</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="swingTrade" role="tabpanel" aria-labelledby="nav-home-tab">
                <?php include("investimentos_swingtrade.php"); ?>
            </div>
            <div class="tab-pane fade" id="dayTrade" role="tabpanel" aria-labelledby="nav-profile-tab">
                <?php include("investimentos_daytrade.php"); ?>
            </div>
            <div class="tab-pane fade" id="buyAndHold" role="tabpanel" aria-labelledby="nav-profile-tab">
                <?php include("investimentos_buyandhold.php"); ?>
            </div>
            <div class="tab-pane fade" id="finalizados" role="tabpanel" aria-labelledby="nav-profile-tab">
                <?php include("investimentos_finalizados.php"); ?>
            </div>
        </div>
    </div>
</body>
</html>