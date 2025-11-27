<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/services/ViaCepService.php';

class BuscaCepController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
	}
	public function consultar($cep){
		$service = new ViaCepService();
		$resultado = $service->consultar($cep);

		$this->output
			->set_content_type('application/json');

		if($resultado) {
			$this->output->set_output(json_encode($resultado));
		}else{
			$this->output
				->set_status_header(404)
				->set_output(json_encode(array('erro' => 'CEP não encontrado')));
		}

	}

}
