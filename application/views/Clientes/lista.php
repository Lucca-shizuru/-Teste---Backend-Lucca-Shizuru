<?php
/**
 * @var Cliente[] $clientes
 */
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Clientes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
	<span class="navbar-brand">Sistema Clientes</span>
	<a href="<?= base_url('auth/logout') ?>" class="btn btn-outline-light btn-sm">Sair</a>
</nav>

<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h2>Gerenciar Clientes</h2>
		<a href="<?= base_url('clientes/novo') ?>" class="btn btn-success"><i class="fas fa-plus"></i> Novo</a>
	</div>

	<?php if($this->session->flashdata('sucesso')): ?>
		<div class="alert alert-success"><?= $this->session->flashdata('sucesso') ?></div>
	<?php endif; ?>
	<?php if($this->session->flashdata('erro')): ?>
		<div class="alert alert-danger"><?= $this->session->flashdata('erro') ?></div>
	<?php endif; ?>

	<div class="card shadow">
		<div class="card-body">
			<table class="table table-hover">
				<thead class="thead-light">
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Telefone</th>
					<th style="width: 150px;">Ações</th>
				</tr>
				</thead>
				<tbody>
				<?php if(!empty($clientes)): ?>
					<?php foreach($clientes as $c): ?>
						<tr>
							<td><?= $c->getNome() ?></td>
							<td><?= $c->getEmail() ?></td>
							<td><?= $c->getTelefone() ?></td>
							<td>
								<a href="<?= base_url('clientes/editar/'.$c->getId()) ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
								<a href="<?= base_url('clientes/excluir/'.$c->getId()) ?>"
								   class="btn btn-sm btn-danger"
								   onclick="return confirm('Tem certeza?');"><i class="fas fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr><td colspan="4" class="text-center">Nenhum registro encontrado.</td></tr>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>
