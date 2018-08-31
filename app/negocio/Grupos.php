<?php

class Grupos {

	private $codigo;
	private $nome;
	private $imagem; //(link)
	private $status;
	private $codigo_administrador;
	private $codigo_jogo;
	private $descricao;
	private $topicos;

	public function __construct()
	{
		$this->topicos = array();
	}
	public function getCodigo() {
		return $this->codigo;
	}

	public function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getImagem() {
		return $this->imagem;
	}

	public function setImagem($imagem) {
		$this->imagem = $imagem;
	}

	public function getStatus() {
		return $this->status;
	}

	public function setStatus($status) {
		$this->status = $status;
	}

	public function getCodigoAdministrador() {
		return $this->codigo_administrador;
	}

	public function setCodigoAdministrador($codigoAdministrador) {
		$this->codigo_administrador = $codigoAdministrador;
	}

	public function getCodigoJogo() {
		return $this->codigo_jogo;
	}

	public function setCodigoJogo($codigoJogo) {
		$this->codigo_jogo = $codigoJogo;
	}

	public function getDescricao() {
		return $this->descricao;
	}
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	public function getTopicos() {
		return $this->topicos;
	}
	public function setTopicos($topicos) {
		$this->topicos = $topicos;
	}

}


?>