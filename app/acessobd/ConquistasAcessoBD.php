<?php 

include_once ACESSOBD. "EntidadeAcessoBD.php";
include_once NEGOCIO. "Conquistas.php";

class ConquistasAcessoBD extends EntidadeAcessoBD{

	function __construct(){
		parent::__construct();
		$this->tabela = "conquistas";
	}


	public function listarConquistaUsuario($codigoUser)
	{
		$stmt = $this->conexao->prepare("SELECT * from conquistas_usuario AS cu INNER JOIN conquistas AS c ON c.codigo = cu.codigo_conquista WHERE cu.codigo_usuario = $codigoUser");
		$stmt->execute();
		$conquistas = array();
		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$c = new Conquista();
			$c->setCodigo($resultado["codigo"]);
			$c->setTitulo($resultado["titulo"]);
			$c->setImagem($resultado["imagem"]);
			$c->setTipo($resultado["tipo"]);
			$conquistas[] = $c;
		}
		
		return $conquistas;
	}

	public function listarConquistas()
	{
		$stmt = $this->conexao->prepare("SELECT * From conquistas");
		$stmt->execute();
		$conquistas = array();
		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$c = new Conquista();
			$c->setCodigo($resultado["codigo"]);
			$c->setTitulo($resultado["titulo"]);
			$c->setImagem($resultado["imagem"]);
			$c->setTipo($resultado["tipo"]);
			$conquistas[] = $c;
		}
		
		return $conquistas;
	}
}
?>
