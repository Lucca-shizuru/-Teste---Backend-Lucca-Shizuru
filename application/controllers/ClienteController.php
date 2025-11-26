<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/dtos/ClienteDTO.php';

/**
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Form_validation $form_validation
 * @property Cliente_model $cliente_model
 * @noinspection PhpUnused
 */

class ClienteController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->library('session');

		if (!$this->session->userdata('logado')) {
			redirect('auth');
		}
		$this->load->model('cliente_model');
		$this->load->library('form_validation');
	}
	public function index(){
		$data['clientes'] = $this->cliente_model->get_all();
		$this->load->view('clientes/lista', $data);
	}
	public function novo(){
		$data['titulo'] = "Novo Cliente";
		$data['action'] = base_url('clientes/salvar');
		$data['cliente'] = null;

		$this->load->view('clientes/formulario', $data);
	}
	public function editar($id){
		$cliente = $this->cliente_model->get_by_id($id);
		if (!$cliente) {
			$this->session->set_flashdata('erro', 'Cliente não encontrado.');
			redirect('clientes');
		}
		$data['cliente'] = $cliente;
		$data['titulo'] = "Editar Cliente";
		$data['action'] = base_url('clientes/atualizar/'.$id);
		$this->load->view('clientes/formulario', $data);
	}

	public function salvar(){
		$this->processar_formulario();
	}
	public function atualizar($id){
		$this->processar_formulario($id);
	}
	public function excluir($id) {
		$sucesso = $this->cliente_model->delete($id);

		if ($sucesso) {
			$this->session->set_flashdata('sucesso', 'Cliente removido com sucesso!');
		} else {
			$this->session->set_flashdata('erro', 'Erro ao remover.');
		}
		redirect('clientes');
	}
	private function processar_formulario($id = null){
		$this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('telefone', 'Telefone', 'required');
		$this->form_validation->set_rules('endereco', 'Endereço', 'required');

		if (! $this->form_validation->run()) {
			if ($id) {
				$this->editar($id);
			}else{
				$this->novo();
			}
			return;
		}

		$dto = new ClienteDto($this->input->post());
		$entidadeCliente = $dto->toEntity();

		if ($id) {
			$entidadeCliente->setId($id);
			$this->cliente_model->update($id, $entidadeCliente);
			$msg = 'Cliente atualizado com sucesso!';
		} else {
			$this->cliente_model->insert($entidadeCliente);
			$msg = 'Cliente cadastrado com sucesso!';
		}

		$this->session->set_flashdata('sucesso', $msg);
		redirect('clientes');
	}
}






