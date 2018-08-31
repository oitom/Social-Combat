<?php

Class Preferencias_Plataforma {
	
	private $codigo_plataforma;
	private $codigo_preferencia;

	function __construct($codigo_plataforma, $codigo_preferencia){
		#
		$this->codigo_plataforma = $codigo_plataforma;
		$this->codigo_preferencia = $codigo_preferencia;
	}

	public function getCodigoPlataforma() {
		return $this->codigo_plataforma;
	}


	public function setCodigoPlataforma($codigoPlataforma) {
		$this->codigo_plataforma = $codigoPlataforma;
	}


	public function getCodigoPreferencia() {
		return $this->codigo_preferencia;
	}


	public function setCodigoPreferencia($codigoPreferencia) {
		$this->codigo_preferencia = $codigoPreferencia;
	}
}

?>