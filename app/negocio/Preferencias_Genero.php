<?php

class Preferencias_Genero {

	private $codigo_genero;
	private $codigo_preferencia;

	function __construct($codigo_genero, $codigo_preferencia){
		#
		$this->codigo_genero = $codigo_genero;
		$this->codigo_preferencia = $codigo_preferencia;
	}	

	public function getCodigoGenero() {
		return $this->codigo_genero;
	}

	public function setCodigoGenero($codigoGenero) {
		$this->codigo_genero = $codigoGenero;
	}

	public function getCodigoPreferencia() {
		return $this->codigo_preferencia;
	}

	public function setCodigoPreferencia($codigoPreferencia) {
		$this->codigo_preferencia = $codigoPreferencia;
	}
}

?>