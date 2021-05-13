<!DOCTYPE html>
<html lang="pt-br">

<?php
    include("head.php");
?>

<body>
    <?php
        include("menu.php");
    ?>
    <?php if ($_GET["log"] == 0): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Usuário cadastrado com sucesso! :)
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php elseif ($_GET["log"] == 1): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Usuário cadastrado com sucesso! :)
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <form method="post" action="../controllers/users_controller.php?crud=0">
        <label>Usuário:</label>
        <input type="text" name="username">
        <label>Senha:</label>
        <input type="password" name="password">
        <button type="submit">+</button>
    </form>
















</body>
<?php
    include("base.php")
?>
</html>