<?php

class Feed {
	private $codigo;
	private $usuario;
	private $tipo;
	private $datahora;
	private $coteudo;
	private $descricao;

	public function getCodigo() {
		return $this->codigo;
	}

	public function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	public function getUsuario() {
		return $this->usuario;
	}

	public function setUsuario($usuario) {
		$this->usuario = $usuario;
	}

	public function getTipo() {
		return $this->tipo;
	}

	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}

	public function getDataHora() {
		return $this->datahora;
	}

	public function setDataHora($datahora) {
		$this->datahora = $datahora;
	}

	public function getCoteudo() {
		return $this->coteudo;
	}

	public function setCoteudo($coteudo) {
		$this->coteudo = $coteudo;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}
	
}
?>
