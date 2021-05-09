<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle Financeiro</title>
    <link rel="icon" type="image/jpg" href="../static/images/graph-up.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../static/css/login.css">
</head>
<body>
	<main class="form-signin">
		<?php if ($_GET["log"] == 0): ?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				Usuário e/ou Senha inválidos! :(
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endif ?>
		<form method="POST" action="../controllers/login.php">
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</html>