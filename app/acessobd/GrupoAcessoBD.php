<?php
	
	include_once ACESSOBD. "EntidadeAcessoBD.php";
	include_once ACESSOBD. "TopicoAcessoBD.php";
	include_once NEGOCIO.  "Grupos.php";
	include_once NEGOCIO.  "Usuario.php";
	include_once NEGOCIO.  "Topico.php";

	class GrupoAcessoBD extends EntidadeAcessoBD
	{

		public function __construct(){
			parent:: __construct();
			$this->tabela = "grupos";
		}

			public function listarTodos()
			{
				$stmt = parent::listarTodos();
				$usuarios = array();

				while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$g = new Grupos();
					$g->setCodigo($resultado['codigo']);
					$g->setNome($resultado['nome']);
					$g->setImagem($resultado['imagem']);
					$g->setCodigoJogo($resultado['codigo_jogo']);

					$tp = new TopicoAcessoBD();
					$g->setTopicos($tp->listarTopicos($resultado['codigo']));
					$grupos[] = $g;
				}
				return $grupos;
			}


		public function numeroParticipantesGrupo($codigo)
		{
		
			$stmt = $this->conexao->prepare("SELECT COUNT(*) FROM participantes WHERE codigo_grupo = $codigo");
			$stmt->execute();
			$resultado = $stmt->fetch(PDO::FETCH_NUM);
			return $resultado;
		
		}
		
		//Lista o nickname do administrador do Grupo
		public function AdmGrupo($codigoADM)
		{
			$stmt = $this->conexao->prepare("SELECT nickname from usuarios AS u INNER JOIN grupos as G ON u.codigo = g.codigo_usuario_adm WHERE u.codigo = $codigoADM");
			$stmt->execute();
			$adm = new Usuario();
			if($resultado = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$adm->setNickname($resultado["nickname"]);
			}
			return $adm;
		}
		// lista o nome do jogo do grupo
		public function JogoGrupo($codigoJogo)
		{
			$stmt = $this->conexao->prepare("SELECT titulo from jogos AS j INNER JOIN grupos as G ON j.codigo = g.codigo_jogo WHERE j.codigo = $codigoJogo");
			$stmt->execute();
			$jogo = new Jogo();
			if($resultado = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$jogo->setTitulo($resultado["titulo"]);
			}
			return $jogo;
		}

		//Listar o numero de topicos do grupo
		public function NumerodeTopicosGrupo($codigoGrupo)
		{
			$num = new TopicoAcessoBD();
			$resultado = $num->numeroTopicos($codigoGrupo);
			return $resultado;
		}

		// Listar os participantes do grupo retornando a imagem
		public function listarParticipantesGrupo($codigoGrupo)
		{

			$stmt = $this->conexao->prepare("SELECT imagem FROM usuarios AS u INNER JOIN participantes AS p ON u.codigo = p.codigo_usuario WHERE codigo_grupo = $codigoGrupo");
			$stmt->execute();
			$participantes = array();
			while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$usuario = new Usuario();
				$usuario->setImagens($resultado["imagem"]);
				$participantes[] = $usuario;
			}

			return $participantes;
		}


	// Lista todos os grupos que o usuario participa	
		public function ListarGruposUsuario($codigo)
		{
			$stmt = $this->conexao->prepare("SELECT g.nome, g.codigo,g.imagem,g.codigo_jogo FROM grupos AS g INNER JOIN participantes AS p ON g.codigo = p.codigo_grupo INNER JOIN usuarios AS u ON u.codigo = p.codigo_usuario WHERE u.codigo = $codigo");
			$stmt->execute();
			$grupos = array();
			while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$g = new Grupos();
				$g->setCodigo($resultado['codigo']);
				$g->setNome($resultado['nome']);
				$g->setImagem($resultado['imagem']);
				$g->setCodigoJogo($resultado['codigo_jogo']);

				$tp = new TopicoAcessoBD();
				$g->setTopicos($tp->listarTopicos($resultado['codigo']));
				$grupos[] = $g;
			}
			return $grupos;
		}

		public function GruposSugeridos($codigo)
		{
			$stmt = $this->conexao->prepare("SELECT DISTINCT * FROM  grupos AS g INNER JOIN participantes AS p ON g.codigo = p.codigo_grupo WHERE g.codigo NOT IN (SELECT codigo_grupo FROM participantes WHERE codigo_usuario = :codigo) and p.codigo_usuario <> :codigo GROUP BY g.codigo ");
			$stmt->bindValue(':codigo', $codigo, PDO::PARAM_INT);
			$stmt->execute();
			$grupos = array();
			while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$g = new Grupos();
				$g->setCodigo($resultado['codigo']);
				$g->setNome($resultado['nome']);
				$g->setImagem($resultado['imagem']);
				$g->setCodigoJogo($resultado['codigo_jogo']);

				$tp = new TopicoAcessoBD();
				$g->setTopicos($tp->listarTopicos($resultado['codigo']));
				$grupos[] = $g;
			}
			return $grupos;
		}
	

		public function ListarDadosGrupo($codigoGrupo)
		{
			$stmt = $this->conexao->prepare("SELECT * FROM grupos WHERE codigo = $codigoGrupo");
			$stmt->execute();
			$grupos = array();
			while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {

				$g = new Grupos();
				$g->setCodigo($resultado['codigo']);
				$g->setNome($resultado['nome']);
				$g->setImagem($resultado['imagem']);
				$g->setStatus($resultado['status']);
				$g->setCodigoAdministrador($resultado['codigo_usuario_adm']);
				$g->setCodigoJogo($resultado['codigo_jogo']);
				$g->setDescricao($resultado['descricao']);

				$tp = new TopicoAcessoBD();
				$g->setTopicos($tp->listarTopicos($resultado['codigo']));
				$grupos[] = $g;

			}
			return $grupos;
		}
		
		public function ListarJogosGrupo()
		{
			$stmt = $this->conexao->prepare("SELECT codigo, titulo from jogos");
			$stmt->execute();
			$jogos = array();
			while($resultado = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$jogo = new Jogo();
				$jogo->setCodigo($resultado["codigo"]);
				$jogo->setTitulo($resultado["titulo"]);
				$jogos[] = $jogo;

			}
			return $jogos;
		}

	}

?>