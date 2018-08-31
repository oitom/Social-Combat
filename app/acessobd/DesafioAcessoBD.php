<?php 

include_once ACESSOBD. "EntidadeAcessoBD.php";
include_once ACESSOBD. "UsuarioAcessoBD.php";
include_once ACESSOBD. "JogoAcessoBD.php";
include_once NEGOCIO.  "Desafio.php";

class DesafioAcessoBD extends EntidadeAcessoBD{
	
	function __construct()
	{
		parent::__construct();
		$this->tabela = "desafios";
	}

	public function ListarTodos()
	{
		$stmt = parent::listarTodos();
		$desafios = array();

		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$desafiante = new UsuarioAcessoBD();
			$desafiado = new UsuarioAcessoBD();
			$jogo = new JogoAcessoBD();

			$d = new Desafio();
			$d->setCodigo($resultado["codigo"]);
			$jogo->codigo = $resultado["codigo_jogo"];
			$d->setJogo($jogo->listar());

			$desafiante->codigo = $resultado["codigo_usuario_desafiante"];
			$d->setDesafiante($desafiante->listar());

			$desafiado->codigo = $resultado["codigo_usuario_desafiado"];
			$d->setDesafiado($desafiado->listar());
			
			$d->setDataHora($resultado["datahora"]);
			$d->setVitoria($resultado["vitoria"]);
			$d->setConfirmacao($resultado["confirmacao"]);
			$desafios[] = $d;
		}
		return $desafios;
	}

	public function Listar($codigo)
	{
		$stmt = $this->conexao->prepare("SELECT * FROM ".$this->tabela." WHERE codigo_usuario_desafiante = :codigo  OR codigo_usuario_desafiado = :codigo");
		$stmt->bindValue(':codigo', $codigo, PDO::PARAM_INT);
		$stmt->execute();
		$feeds = array();

		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$desafiante = new UsuarioAcessoBD();
			$desafiado = new UsuarioAcessoBD();
			$jogo = new JogoAcessoBD();

			$d = new Desafio();
			$d->setCodigo($resultado["codigo"]);
			$d->setJogo($jogo->listar($resultado["codigo_jogo"]));

			$desafiante->codigo = $resultado["codigo_usuario_desafiante"];
			$d->setDesafiante($desafiante->listar());

			$desafiado->codigo = $resultado["codigo_usuario_desafiado"];
			$d->setDesafiado($desafiado->listar());
			
			$d->setDataHora($resultado["datahora"]);
			$d->setVitoria($resultado["vitoria"]);
			$d->setConfirmacao($resultado["confirmacao"]);
			$desafios[] = $d;
		}
		return $desafios;
	}

}
?>