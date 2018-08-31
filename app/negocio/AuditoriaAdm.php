<?php 

Class AuditoriaAdm{

	private $codigo;
	private $usuario;
	private $funcao;
	private $dataHora;
	private $conteudo;

	public function __construct($usuario, $funcao, $conteudo){
		$this->usuario = $usuario;
		$this->funcao = $funcao;
		$this->dataHora = date('Y-m-d H:i:s');
		$this->conteudo = $conteudo;
	}

	public function getCodigo(){
		return $this->codigo;
	}
	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}
	public function getUsuario(){
		return $this->usuario;
	}
	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}
	public function getFuncao(){
		return $this->funcao;
	}
	public function setFuncao($funcao){
		$this->funcao = $funcao;
	}
	public function getConteudo(){
		return $this->conteudo;
	}
	public function setConteudo($conteudo){
		$this->conteudo = $conteudo;
	}
}

?>