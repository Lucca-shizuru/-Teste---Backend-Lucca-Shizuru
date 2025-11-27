<?php
/**
 * @var string $titulo
 * @var string $action
 * @var Cliente $cliente
 */
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title><?= $titulo ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card shadow">
				<div class="card-header bg-primary text-white">
					<h4 class="mb-0"><?= $titulo ?></h4>
				</div>
				<div class="card-body">

					<?php if(validation_errors()): ?>
						<div class="alert alert-danger"><?= validation_errors() ?></div>
					<?php endif; ?>

					<form action="<?= $action ?>" method="post">

						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="nome">Nome</label>
								<input type="text" name="nome" id="nome" class="form-control"
									   value="<?= set_value('nome', isset($cliente) ? $cliente->getNome() : '') ?>" required>
							</div>
							<div class="form-group col-md-6">
								<label for="email">Email</label>
								<input type="email" name="email" id="email" class="form-control"
									   value="<?= set_value('email', isset($cliente) ? $cliente->getEmail() : '') ?>" required>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="telefone">Telefone</label>
								<input type="text" name="telefone" id="telefone" class="form-control"
									   value="<?= set_value('telefone', isset($cliente) ? $cliente->getTelefone() : '') ?>" required>
							</div>

							<div class="form-group col-md-4">
								<label for="cep">CEP (Busca Automática)</label>
								<input type="text" id="cep" class="form-control" placeholder="00000-000">
							</div>
						</div>

						<div class="form-group">
							<label for="endereco">Endereço</label>
							<input type="text" name="endereco" id="endereco" class="form-control"
								   value="<?= set_value('endereco', isset($cliente) ? $cliente->getEndereco() : '') ?>" required>
						</div>

						<div class="form-row">
							<div class="form-group col-md-5">
								<label for="bairro">Bairro</label>
								<input type="text" name="bairro" id="bairro" class="form-control"
									   value="<?= set_value('bairro', isset($cliente) ? $cliente->getBairro() : '') ?>">
							</div>
							<div class="form-group col-md-5">
								<label for="cidade">Cidade</label>
								<input type="text" name="cidade" id="cidade" class="form-control"
									   value="<?= set_value('cidade', isset($cliente) ? $cliente->getCidade() : '') ?>">
							</div>
							<div class="form-group col-md-2">
								<label for="estado">UF</label>
								<input type="text" name="estado" id="estado" class="form-control"
									   value="<?= set_value('estado', isset($cliente) ? $cliente->getEstado() : '') ?>">
							</div>
						</div>

						<hr>
						<button type="submit" class="btn btn-success">Salvar</button>

						<a href="<?= site_url('clientes') ?>" class="btn btn-secondary">Voltar</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	document.getElementById('cep').addEventListener('blur', function(e) {

		let cep = e.target.value.replace(/\D/g, '');
		console.log("CEP digitado:", cep);

		if (cep.length === 8) {
			document.getElementById('endereco').value = "Buscando Cep...";

			let url = '<?= site_url("api/cep/") ?>' + cep;
			console.log("Chamando URL:", url);


			fetch(url)
				.then(response =>{
					console.log("Resposta do servidor:", response);
					if (!response.ok) throw new Error('Erro na requisição');
					return response.json();
				})
				.then(data => {
					console.log("Dados recebidos:", data);
						document.getElementById('endereco').value = data.logradouro;
						document.getElementById('bairro').value = data.bairro;
						document.getElementById('cidade').value = data.cidade;
						document.getElementById('estado').value = data.estado;
					})
					.catch(() =>{
				alert("CEP não encontrado ou inválido.");
				document.getElementById('endereco').value = "";
			});
		}
	});
</script>

</body>
</html>
