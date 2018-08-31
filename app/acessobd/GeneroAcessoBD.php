<?php 

include_once ACESSOBD. "EntidadeAcessoBD.php";
include_once NEGOCIO.  "Genero.php";

class GeneroAcessoBD extends EntidadeAcessoBD{

	function __construct(){
		parent::__construct();
		$this->tabela = "genero";
	}

	public function listarTodos()
	{
		$stmt = parent::listarTodos();
		$generos = array();

		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$g = new Genero();
			$g->setCodigo($resultado["codigo"]);
			$g->setTitulo($resultado["titulo"]);
			$g->setDescricao($resultado["descricao"]);
			$generos[] = $g;
		}
		return $generos;
	}

	public function listar($codigo)
	{
		$stmt = $this->conexao->prepare("SELECT * FROM ".$this->tabela." WHERE codigo = :codigo");
		$stmt->bindValue(':codigo', $codigo, PDO::PARAM_INT);
		$stmt->execute();
		$genero = new Genero();
		if($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$genero->setCodigo($resultado["codigo"]);
			$genero->setTitulo($resultado["titulo"]);
			$genero->setDescricao($resultado["descricao"]);
		}
		return $genero;
	}
}
?>