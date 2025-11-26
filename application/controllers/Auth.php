<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('url');
	}

	public function index() {
		$this->load->view('login');
	}

	public function logar() {
		$email = $this->input->post('email');
		$senha = $this->input->post('senha');

		$this->db->where('email', $email);
		$this->db->where('senha', $senha);
		$usuario = $this->db->get('usuarios')->row();

		if ($usuario) {

			$sessao = array(
				'id' => $usuario->id,
				'email' => $usuario->email,
				'logado' => TRUE
			);
			$this->session->set_userdata($sessao);

			redirect('clientes');
		} else {
			$this->session->set_flashdata('erro', 'Email ou senha incorretos.');
			redirect('auth');
		}
	}

	public function logout() {
		// Destrói a sessão e volta pro login
		$this->session->sess_destroy();
		redirect('auth');
	}
}
