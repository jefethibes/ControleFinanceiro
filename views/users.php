<!DOCTYPE html>
<html lang="pt-br">

<?php
    include("head.php");
    include("../models/users_model.php");

    $user = new UsersModel();
?>

<body>
    <?php
        include("menu.php");
    ?>
    <?php if ($_GET["log"] == 0): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php if ($_GET["method"] == "insert"): ?>
                Usuário já cadastrado! Por favor, escolha outro username :(
            <?php elseif ($_GET["method"] == "delete"): ?>
                Usuário não pode ser removido! É necessário ter no minimo um usuário cadastrado :(
            <?php endif ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php elseif ($_GET["log"] == 1): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php if ($_GET["method"] == "insert"): ?>
                Usuário cadastrado com sucesso! :)
            <?php elseif ($_GET["method"] == "delete"): ?>
                Usuário removido com sucesso! :)
            <?php endif ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <br>
    <div class="container">
        <form class="row g-3" id="formUsers" method="post" action="../controllers/users_controller.php?log=insert">
            <div class="col-md-6">
                <input class="form-control" type="text" name="username">
            </div>
            <div class="col-md-6">
                <input class="form-control" type="password" name="password">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success"><i class="bi bi-person-plus"></i></button>
            </div>
        </form>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th class="text-center">Usuário</th>
                        <th class="text-center">Alt/Del</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user->list_users() as $values): ?>
                        <tr>
                            <td class="text-center"><?php echo $values["username"]; ?></td>
                            <td class="text-center"><a href="" class="btn btn-link btn-sm"><i class="bi bi-chat-square-text"></i></a> / <a href="../controllers/users_controller.php?log=delete&&id=<?php echo $values['id']; ?>" class="btn btn-link btn-sm"><i class="bi bi-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<?php
    include("base.php")
?>
</html>