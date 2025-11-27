<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Login - Teste Backend</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		body { background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; height: 100vh; }
		.card { width: 400px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
	</style>
</head>
<body>

<div class="card">
	<div class="card-body">
		<h3 class="card-title text-center mb-4">Acesso Restrito</h3>

		<?php if($this->session->flashdata('erro')): ?>
			<div class="alert alert-danger">
				<?= $this->session->flashdata('erro') ?>
			</div>
		<?php endif; ?>

		<form action="<?= site_url('login/logar') ?>" method="post">
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" placeholder="Usuário" required autofocus>
			</div>
			<div class="form-group">
				<label>Senha</label>
				<input type="password" name="senha" class="form-control" placeholder="Senha" required>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Entrar</button>
		</form>
	</div>
</div>

</body>
</html>
