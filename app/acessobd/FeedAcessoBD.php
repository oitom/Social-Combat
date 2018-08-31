<?php 

include_once ACESSOBD. "EntidadeAcessoBD.php";
include_once ACESSOBD. "UsuarioAcessoBD.php";
include_once NEGOCIO.  "Feed.php";

class FeedAcessoBD extends EntidadeAcessoBD{
	
	public $codigo;

	function __construct(){
		parent::__construct();
		$this->tabela = "feed_usuario";
	}

	public function ListarTodos()
	{
		$stmt = parent::listarTodos();
		$feeds = array();

		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$usuario = new UsuarioAcessoBD();
			$f = new Feed();
			$f->setCodigo($resultado["codigo"]);
			$usuario->codigo = $resultado["codigo_usuario"];
			$f->setUsuario($usuario->listar());
			$f->setTipo($resultado["tipo"]);
			$f->setDataHora($resultado["datahora"]);
			$f->setCoteudo($resultado["conteudo"]);
			$f->setDescricao($resultado["descricao"]);
			$feeds[] = $f;
		}
		return $feeds;
	}

	public function Listar()
	{
		$stmt = $this->conexao->prepare("SELECT * FROM ".$this->tabela." WHERE codigo_usuario = :codigo ORDER BY `codigo` DESC");
		$stmt->bindValue(':codigo', $this->codigo, PDO::PARAM_INT);
		$stmt->execute();
		$feeds = array();

		while($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$usuario = new UsuarioAcessoBD();
			$f = new Feed();
			$f->setCodigo($resultado["codigo"]);
			$usuario->codigo = $resultado["codigo_usuario"];
			$f->setUsuario($usuario->listar());
			$f->setTipo($resultado["tipo"]);
			$f->setDataHora($resultado["datahora"]);
			$f->setCoteudo($resultado["conteudo"]);
			$f->setDescricao($resultado["descricao"]);
			$feeds[] = $f;
		}
		return $feeds;
	}

	public function ListarPorUsuario($codigo_usuario)
	{
		$stmt = $this->conexao->prepare("SELECT * FROM `feed_usuario` AS f INNER JOIN `feed_amigo` AS fa ON f.codigo = fa.codigo_feed WHERE fa.codigo_amigo = :codigo ORDER BY f.codigo DESC");
		$stmt->bindValue(':codigo', $codigo_usuario, PDO::PARAM_INT);
		$stmt->execute();
		$feeds = array();

		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$usuario = new UsuarioAcessoBD();
			$f = new Feed();
			$f->setCodigo($resultado["codigo"]);
			$usuario->codigo = $resultado["codigo_usuario"];
			$f->setUsuario($usuario->listar());
			$f->setTipo($resultado["tipo"]);
			$f->setDataHora($resultado["datahora"]);
			$f->setCoteudo($resultado["conteudo"]);
			$f->setDescricao($resultado["descricao"]);
			$feeds[] = $f;
		}
		return $feeds;
	}
}
?>