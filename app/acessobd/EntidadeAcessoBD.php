<?php 

include_once FRAMEWORK. 'Conexao.php';

class EntidadeAcessoBD {
	
	protected $tabela;
	protected $conexao;

	function __construct()
	{		
		$c = new Conexao();
		$this->conexao = $c->abrirConexao();
	}

	public function listarTodos(){
		$stmt = $this->conexao->prepare("SELECT * FROM ".$this->tabela);
		$stmt->execute();
		return $stmt;
	}
}
?>