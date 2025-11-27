<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ViaCepService
{
	/**
	 * @param string $cep
	 * @return array|null
	 */

	public function consultar($cep){
		$cep = preg_replace("/[^0-9]/", "", $cep);
		if(strlen($cep) !== 8){
			return null;
		}
		$url = "https://viacep.com.br/ws/{$cep}/json/";
		$arrContextOptions = array(
			"ssl" => array(
				"verify_peer" => false,
				"verify_peer_name" => false,
			),
		);

		$json = @file_get_contents($url, false, stream_context_create($arrContextOptions));


		if($json === false){
			return null;
		}
		$dados = json_decode($json, true);

		if (isset($dados['erro'])){
			return null;
		}
		return array(
			'logradouro' => $dados['logradouro'],
			'bairro'     => $dados['bairro'],
			'cidade'     => $dados['localidade'],
			'estado'     => $dados['uf']
		);

	}
}







