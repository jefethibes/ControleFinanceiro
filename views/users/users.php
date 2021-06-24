<!DOCTYPE html>
<html lang="pt-br">

<?php
    include("../bases/head.php");
    include("../bases/paginacao_busca.php");
    include("../../models/connections/users_connect.php");

    $user = new UsersConnect();
    $lista_usuarios = $user->list();
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
                    <h5 class="modal-title" id="exampleModalLabel">Novo Usuário:</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="container">
                    <form class="row g-3" id="formUsers" method="post" action="../../controllers/users_controller.php?log=insert">
                        <div class="form-group">
                            <label>Username:</label>
                            <input class="form-control" type="text" name="username" id="username" minlength="4" maxlength="20" required>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input class="form-control" type="password" name="password" id="password" minlength="4" maxlength="20" required>
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
                    Usuário já cadastrado! Por favor, escolha outro username :(
                <?php elseif ($_GET["method"] == "delete"): ?>
                    Usuário não pode ser removido! É necessário ter no minimo um usuário cadastrado :(
                <?php endif ?>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif ($_GET["log"] == 1): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php if ($_GET["method"] == "insert"): ?>
                    Usuário cadastrado com sucesso! :)
                <?php elseif ($_GET["method"] == "delete"): ?>
                    Usuário removido com sucesso! :)
                <?php elseif ($_GET["method"] == "update"): ?>
                    Usuário alterado com sucesso! :)
                <?php endif ?>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#on" role="tab" aria-controls="nav-home" aria-selected="true">Usuários</a>
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
                                <th class="text-center">Usuário</th>
                                <th class="text-center">Alt/Del</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista_usuarios as $values): ?>
                                <div id="modalForm<?php echo $values['id']; ?>" class="modal fade" tabindex="-1" role="dialog">
                                   <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Alterar Usuário:</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar"></button>
                                            </div>
                                            <br>
                                            <div class="container">
                                                <form class="row g-3" id="formUsers" method="post" action="../../controllers/users_controller.php?log=update&&id=<?php echo $values['id']; ?>">
                                                    <div class="form-group">
                                                        <label>Username:</label>
                                                        <input class="form-control" type="text" name="username" value="<?php echo $values['username']; ?>" minlength="4" maxlength="20" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password:</label>
                                                        <input class="form-control" type="password" name="password" value="<?php echo $values['password']; ?>" minlength="4" maxlength="20" required>
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
                                    <td class="text-center"><?php echo $values["username"]; ?></td>
                                    <td class="text-center"><a type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#modalForm<?php echo $values['id']; ?>"><i class="bi bi-chat-square-text"></i></a> / <a href="../../controllers/users_controller.php?log=delete&&id=<?php echo $values['id']; ?>" class="btn btn-link-danger btn-sm"><i class="bi bi-trash"></i></a></td>
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