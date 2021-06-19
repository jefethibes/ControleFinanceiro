<!DOCTYPE html>
<html lang="pt-br">

<?php
    include("../bases/head.php");
?>
<link rel="stylesheet" href="../../static/css/login.css">

<body>
	<main class="form-signin">
		<?php if ($_GET["log"] == 0): ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Usuário e/ou Senha inválidos! :(
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endif ?>
		<form method="POST" action="../../session/login.php">
			<div class="form-floating">
				<input type="text" class="form-control" name="username" id="username">
				<label for="username">Login</label>
			</div>
			<div class="form-floating">
				<input type="password" class="form-control" name="password" id="password">
				<label for="password">Password</label>
			</div>
			<button class="w-100 btn btn-lg btn-primary">Acessar</button>
		</form>
	</main>
</body>
</html>