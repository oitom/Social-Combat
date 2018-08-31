<?php
class Galeria {
	private $codigo;
	private $codigo_usuario;
	private $titulo;
	private $datahora;

	public function getCodigo() {
		return $this->codigo;
	}

	public function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	public function getCodigo_usuario() {
		return $this->codigo_usuario;
	}

	public function setCodigo_usuario($codigo_usuario) {
		$this->codigo_usuario = $codigo_usuario;
	}

	public function getTitulo() {
		return $this->titulo;
	}

	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}

	public function getDatahora() {
		return $this->datahora;
	}
	public function setDatahora($datahora) {
		$this->datahora = $datahora;
	}
}
?>