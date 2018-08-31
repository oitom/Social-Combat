<?php 

include_once ACESSOBD. "EntidadeAcessoBD.php";
include_once NEGOCIO.  "Jogo.php";
include_once ACESSOBD. "GeneroAcessoBD.php";

class JogoAcessoBD extends EntidadeAcessoBD{

	function __construct(){
		parent::__construct();
		$this->tabela = "jogos";
	}

	public function listarTodosGenero($codigoGenero = null)
	{
		$stmt = $this->conexao->prepare("SELECT * FROM ".$this->tabela." WHERE codigo_genero = :codigo_genero");
		$stmt->bindValue(':codigo_genero', $codigoGenero, PDO::PARAM_INT);
		$stmt->execute();		
		$jogos = array();
		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$g = new GeneroAcessoBD();
			$genero = $g->listar($resultado["codigo_genero"]);
			$j = new Jogo();
			$j->setCodigo($resultado["codigo"]);
			$j->setGenero($genero);
			$j->setTitulo($resultado["titulo"]);
			$j->setDescricao($resultado["descricao"]);
			$j->setDataLancamento($resultado["data_lancamento"]);
			$j->setPaginaOficial($resultado["pagina_oficial"]);
			$jogos[] = $j;
		}
		return $jogos;
	}

	public function listarTodos()
	{
		$stmt = parent::listarTodos();
		$jogos = array();

		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$g = new GeneroAcessoBD();
			$genero = $g->listar($resultado["codigo_genero"]);

			$j = new Jogo();
			$j->setCodigo($resultado["codigo"]);
			$j->setGenero($genero);
			$j->setTitulo($resultado["titulo"]);
			$j->setDescricao($resultado["descricao"]);
			$j->setDataLancamento($resultado["data_lancamento"]);
			$j->setPaginaOficial($resultado["pagina_oficial"]);
			$jogos[] = $j;
		}
		return $jogos;
	}

	public function listar($codigo)
	{
		$stmt = $this->conexao->prepare("SELECT * FROM jogos AS j INNER JOIN imagens_jogos AS ij ON ij.codigo_jogo = j.codigo WHERE j.codigo = :codigo");
		$stmt->bindValue(':codigo', $codigo, PDO::PARAM_INT);
		$stmt->execute();
		$jogo = new Jogo();
		
		if($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$g = new GeneroAcessoBD();
			$genero = $g->listar($resultado["codigo_genero"]);
			$jogo->setCodigo($resultado["codigo"]);
			$jogo->setGenero($genero);
			$jogo->setTitulo($resultado["titulo"]);
			$jogo->setDescricao($resultado["descricao"]);
			$jogo->setDataLancamento($resultado["data_lancamento"]);
			$jogo->setPaginaOficial($resultado["pagina_oficial"]);
			$jogo->setCapa($resultado["capa"]);	
			$jogo->setImagem($resultado["imagem"]);
		}
		return $jogo;
	}

		public function listarJogosUser()
		{
			$stmt = $this->conexao->prepare("SELECT * FROM jogos_usuario = 2");
			$stmt->execute();
			$jogoUser = new Jogo();
			
			if($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {

				$jogoUser->setTitulo($resultado["codigo_jogo"]);
			}
			return $jogoUser;
		}

		public function listarGaleriaJogo($codigo) // funcao para criar a galeria do jogo e verificar a capa
		{
			$stmt = $this->conexao->prepare("SELECT * FROM imagens_jogos WHERE codigo_jogo = :codigo");
			$stmt->bindValue(':codigo', $codigo, PDO::PARAM_INT);
			$stmt->execute();
			$jogoFoto = array();
			
			while($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {

				$jogoFoto[]=array (
					$resultado["imagem"],
					$resultado["capa"]);
				}
			return $jogoFoto;
		}

		public function listarFeed($codigo)
		{
			$stmt = $this->conexao->prepare("SELECT texto FROM feed_jogos WHERE codigo_jogo = :codigo");
			$stmt->bindValue(':codigo', $codigo, PDO::PARAM_INT);
			$stmt->execute();
			$feed = new Jogo();
			
			if($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$feed->setFeed($resultado["texto"]);
			}
			return $feed;
		}

		public function sugestao($codigo)
		{
			$stmt = $this->conexao->prepare("SELECT DISTINCT * FROM  jogos AS j INNER JOIN imagens_jogos AS ij ON ij.codigo_jogo = j.codigo INNER JOIN jogos_usuario AS ju ON j.codigo = ju.codigo_jogo  WHERE j.codigo NOT IN (SELECT codigo_jogo FROM jogos_usuario WHERE codigo_usuario = :codigo) and ju.codigo_usuario <> :codigo AND ij.capa = 1 GROUP BY j.codigo ");
			$stmt->bindValue(':codigo', $codigo, PDO::PARAM_INT);
			$stmt->execute();
			$jogos = array();		
			while($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$j = new Jogo();
				$j->setCodigo($resultado["codigo"]);
				$j->setTitulo($resultado["titulo"]);
				$j->setPaginaOficial($resultado["pagina_oficial"]);
				$j->setImagem($resultado["imagem"]);
				$j->setCapa($resultado["capa"]);
				$jogos[] = $j;
			}
			return $jogos;
		}

		public function listarJogos($usuario)
		{
			$stmt = $this->conexao->prepare("SELECT jogos.codigo, jogos.titulo, jogos.pagina_oficial, jogos_usuario.codigo_jogo, imagens_jogos.imagem, imagens_jogos.capa FROM jogos INNER JOIN (jogos_usuario INNER JOIN imagens_jogos on imagens_jogos.codigo_jogo=jogos_usuario.codigo_jogo) on jogos.codigo=jogos_usuario.codigo_jogo WHERE jogos_usuario.codigo_usuario = :usuario AND imagens_jogos.capa = 1");
			$stmt->bindValue(':usuario', $usuario, PDO::PARAM_INT);
			$stmt->execute();
			$jogo = array();		
			while($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$j = new Jogo();
				$j->setCodigo($resultado["codigo"]);
				$j->setTitulo($resultado["titulo"]);
				$j->setPaginaOficial($resultado["pagina_oficial"]);
				$j->setImagem($resultado["imagem"]);
				$j->setCapa($resultado["capa"]);
				$jogo[] = $j;
			}
			return $jogo;
		}
}
	
?>