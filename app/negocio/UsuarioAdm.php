<?php 

include_once 'GrupoAdm.php';

Class UsuarioAdm{

	private $codigo;
	private $grupo;
	private $nome;
	private $email;
	private $senha;
	
	/*
	public function __construct(//$grupo, $nome, $email, $senha){
		$this->grupo = $grupo;
		$this->grupo->addUsuario($this);
		$this->nome  = $nome;
		$this->email = $email;
		$this->senha = $senha;
	}*/

	public function listarPermissoes(){
		echo "<br> O usuario $this->nome possui as permissoes:";
		$this->grupo->listarPermissoes();
	}

	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}

	public function getCodigo(){
		return $this->codigo;
	}

	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
	}

	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
	
	public function getGrupo(){
		return $this->grupo;
	}
	public function setGrupo($grupo){
		$this->grupo = $grupo;
	}
}

?>