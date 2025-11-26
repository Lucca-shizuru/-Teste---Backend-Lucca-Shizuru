<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/entities/Cliente.php';

/**
 * @property CI_DB_query_builder $db
 */
class Cliente_model extends CI_Model
{
	private $table = 'clientes';

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	/**
	 * @return Cliente[]
	 */
	public function get_all() {
		$query = $this->db->get($this->table)->result();

		$listaClientes = array();
		foreach ($query as $row) {

			$listaClientes[] = $this->hydrate($row);
		}
		return $listaClientes;
	}

	/**
	 * @return Cliente|null
	 */
	public function get_by_id($id) {
		$this->db->where('id', $id);
		$row = $this->db->get($this->table)->row();

		if (!$row) return null;

		return $this->hydrate($row);
	}

	public function insert(Cliente $cliente) {
		return $this->db->insert($this->table, $cliente->toDatabaseArray());
	}

	public function update($id, Cliente $cliente) {
		$this->db->where('id', $id);
		return $this->db->update($this->table, $cliente->toDatabaseArray());
	}

	/**
	 *
	 * @return boolean
	 */
	public function delete($id) {

		$this->db->where('id', $id);
		$this->db->delete($this->table);


		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 *
	 * @param object $row
	 * @return Cliente
	 */
	private function hydrate($row) {
		$cliente = new Cliente();
		$cliente->setId($row->id);
		$cliente->setNome($row->nome);
		$cliente->setEmail($row->email);
		$cliente->setTelefone($row->telefone);
		$cliente->setEndereco($row->endereco);
		$cliente->setBairro($row->bairro);
		$cliente->setCidade($row->cidade);
		$cliente->setEstado($row->estado);

		return $cliente;
	}
}
