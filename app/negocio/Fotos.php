<?php
class Fotos {
	private $codigo;
	private $codigo_galeria;
	private $legenda;
	private $datahora;
	private $imagem;
	private $capa;

	public function getCodigo() {
		return $this->codigo;
	}

	public function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	public function getCodigo_galeria() {
		return $this->codigo_galeria;
	}

	public function setCodigo_galeria($codigo_galeria) {
		$this->codigo_galeria = $codigo_galeria;
	}

	public function getLegenda() {
		return $this->legenda;
	}

	public function setLegenda($legenda) {
		$this->legenda = $legenda;
	}

	public function getDatahora() {
		return $this->datahora;
	}

	public function setDatahora($datahora) {
		$this->datahora = $datahora;
	}

	public function getImagem() {
		return $this->imagem;
	}

	public function setImagem($imagem) {
		$this->imagem = $imagem;
	}

	public function getCapa() {
		return $this->capa;
	}

	public function setCapa($capa) {
		$this->capa = $capa;
	}
}
?>