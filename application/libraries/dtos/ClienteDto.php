<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/entities/Cliente.php';

class ClienteDto
{
	public $nome;
	public $email;
	public $telefone;
	public $endereco;
	public $bairro;
	public $cidade;
	public $estado;

	public function __construct($dados)
	{
		$this->nome = isset($dados['nome']) ? $dados['nome'] : null;
		$this->email = isset($dados['email']) ? $dados['email'] : null;
		$this->telefone = isset($dados['telefone']) ? $dados['telefone'] : null;
		$this->endereco = isset($dados['endereco']) ? $dados['endereco'] : null;
		$this->bairro = isset($dados['bairro']) ? $dados['bairro'] : null;
		$this->cidade = isset($dados['cidade']) ? $dados['cidade'] : null;
		$this->estado = isset($dados['estado']) ? $dados['estado'] : null;

	}
	public function toEntity(){
		$cliente = new Cliente();
		$cliente->setNome($this->nome);
		$cliente->setEmail($this->email);
		$cliente->setTelefone($this->telefone);
		$cliente->setEndereco($this->endereco);
		$cliente->setBairro($this->bairro);
		$cliente->setCidade($this->cidade);
		$cliente->setEstado($this->estado);

		return $cliente;
	}
}
