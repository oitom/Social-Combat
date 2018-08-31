<?php 

Class Jogo{

	private $codigo;
	private $genero;
	private $titulo;
	private $descricao;
	private $dataHora;
	private $dataLancamento;
	private $paginaOficial;
	private $imagem;
	private $capa;
	private $feed;

	public function __construct(){
		$this->dataHora = date('Y-m-d H:i:s');
	}

	public function getCodigo(){
		return $this->codigo;
	}
	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}

	public function getTitulo(){
		return $this->titulo;
	}
	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}
	
	public function getGenero(){
		return $this->genero;
	}
	public function setGenero($genero){
		$this->genero = $genero;
	}

	public function getDescricao(){
		return $this->descricao;
	}
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getDataLancamento(){
		return $this->dataLancamento;
	}
	public function setDataLancamento($dataLancamento){
		$this->dataLancamento = $dataLancamento;
	}

	public function getPaginaOficial(){
		return $this->paginaOficial;
	}
	public function setPaginaOficial($paginaOficial){
		$this->paginaOficial = $paginaOficial;
	}

	public function getImagem(){
		return $this->imagem;
	}
	public function setImagem($imagem){
		$this->imagem = $imagem;
	}
	public function getCapa(){
		return $this->capa;
	}
	public function setCapa($capa){
		$this->capa = $capa;
	}

	public function getFeed(){
		return $this->feed;
	}
	public function setFeed($feed){
		$this->feed = $feed;
	}
}

?>