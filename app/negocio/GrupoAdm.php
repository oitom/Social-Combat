<?php

echo "conteudo";
print($parametro);
print_r($parametro);
var_dump($parametro);


include_once 'UsuarioAdm.php';
include_once 'FuncaoAdm.php';

Class GrupoAdm{

	private $codigo;
	private $nome;
	private $usuarios;
	private $permissoes;

	public function __construct(){
		$this->usuarios   = array();
		$this->permissoes = array();
	}

	public function addPermissao($funcao){
		$this->permissoes[] = $funcao;
	}

	public function addUsuario($usuario){
		$this->usuarios[] = $usuario;
	}

	public function listarPermissoes(){
		echo "<br>--  $this->nome  --<br>";
		foreach ($this->permissoes as $funcao) {
			echo $funcao->getNome()."<br>";
		}
	}

	public function getCodigo(){
		return $this->codigo;
	}
	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getUsuarios(){
		return $this->usuarios;
	}
	public function setUsuarios($usuarios){
		$this->usuarios = $usuarios;
	}
	public function getPermissoes(){
		return $this->permissoes;
	}
	public function setPermissoes($permissoes){
		$this->permissoes = $permissoes;
	}

}

?>