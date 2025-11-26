<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cliente
{
	private $id;
	private $nome;
	private $email;
	private $telefone;
	private $endereco;
	private $bairro;
	private $cidade;
	private $estado;

public function getId(){
	return $this->id;
}
public function setId($id){
	$this->id = $id;
}
public function getNome(){
	return $this->nome;
}
public function setNome($nome){
	$this->nome = $nome;
}
public function getEmail(){
	return $this->email;
}
public function setEmail($email){
	$this->email = $email;
}
public function getTelefone(){
	return $this->telefone;
}
public function setTelefone($telefone){
	$this->telefone = $telefone;
}
public function getEndereco(){
	return $this->endereco;
}
public function setEndereco($endereco){
	$this->endereco = $endereco;
}
public function getBairro(){
	return $this->bairro;
}
public function setBairro($bairro){
	return $this->bairro = $bairro;
}
public function getCidade(){
	return $this->cidade;
}
public function setCidade($cidade){
	$this->cidade = $cidade;
}
public function getEstado(){
	return $this->estado;
}
public function setEstado($estado){
	$this->estado = $estado;
}


	public function toDatabaseArray() {
		return array(
			'nome'      => $this->nome,
			'email'     => $this->email,
			'telefone'  => $this->telefone,
			'endereco'  => $this->endereco,
			'bairro'    => $this->bairro,
			'cidade'    => $this->cidade,
			'estado'    => $this->estado
		);
}

}

