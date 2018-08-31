<?php

class Desafio {
	private $codigo;
	private $jogo;
	private $datahora;
	private $desafiante;
	private $desafiado;
	private $vitoria;
	private $confirmacao;

	public function getCodigo() {
		return $this->codigo;
	}
	public function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	public function getJogo() {
		return $this->jogo;
	}
	public function setJogo($jogo) {
		$this->jogo = $jogo;
	}

	public function getDataHora() {
		return $this->datahora;
	}
	public function setDataHora($datahora) {
		$this->datahora = $datahora;
	}

	public function getDesafiante() {
		return $this->desafiante;
	}
	public function setDesafiante($desafiante) {
		$this->desafiante = $desafiante;
	}

	public function getDesafiado() {
		return $this->desafiado;
	}
	public function setDesafiado($desafiado) {
		$this->desafiado = $desafiado;
	}

	public function getVitoria() {
		return $this->vitoria;
	}
	public function setVitoria($vitoria) {
		$this->vitoria = $vitoria;
	}

	public function getConfirmacao() {
		return $this->confirmacao;
	}
	public function setConfirmacao($confirmacao) {
		$this->confirmacao = $confirmacao;
	}
	
	
}
?>
