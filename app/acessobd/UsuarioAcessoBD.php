<?php 

include_once ACESSOBD. "EntidadeAcessoBD.php";
include_once ACESSOBD. "JogoAcessoBD.php";
include_once ACESSOBD. "GeneroAcessoBD.php";
include_once NEGOCIO.  "Usuario.php";
include_once NEGOCIO.  "Jogo.php";

class UsuarioAcessoBD extends EntidadeAcessoBD{
	
	public $codigo;

	function __construct(){
		parent::__construct();
		$this->tabela = "usuarios";
	}

	public function ListarTodos()
	{
		$stmt = parent::listarTodos();
		$usuarios = array();

		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$u = new Usuario();
			$u->setCodigo($resultado["codigo"]);
			$u->setNome($resultado["nome"]);
			$u->setNickname($resultado["nickname"]);
			$u->setEmail($resultado["email"]);
			$u->setSenha($resultado["senha"]);
			$u->setLevel($resultado["level"]);
			$u->setReputacao($resultado["reputacao"]);
			$u->setImagens($resultado["imagem"]);
			$u->setFacebook($resultado["facebook"]);
			$u->setTwitter($resultado["twitter"]);
			$u->setGooglePlus($resultado["google_plus"]);
			$u->setWebsite($resultado["website"]);
			$u->setStatus($resultado["status"]);
			$usuarios[] = $u;
		}
		return $usuarios;
	}

	public function Listar()
	{
		$stmt = $this->conexao->prepare("SELECT * FROM ".$this->tabela." WHERE codigo = :codigo");
		$stmt->bindValue(':codigo', $this->codigo, PDO::PARAM_INT);
		$stmt->execute();
		$usuario = new Usuario();
		
		if($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$usuario->setCodigo($resultado["codigo"]);
			$usuario->setNome($resultado["nome"]);
			$usuario->setNickname($resultado["nickname"]);
			$usuario->setEmail($resultado["email"]);
			$usuario->setSenha($resultado["senha"]);
			$usuario->setLevel($resultado["level"]);
			$usuario->setReputacao($resultado["reputacao"]);
			$usuario->setImagens($resultado["imagem"]);
			$usuario->setFacebook($resultado["facebook"]);
			$usuario->setTwitter($resultado["twitter"]);
			$usuario->setGooglePlus($resultado["google_plus"]);
			$usuario->setWebsite($resultado["website"]);
			$usuario->setStatus($resultado["status"]);
		}
		return $usuario;
	}

	public function ListarJogos()
	{
		$stmt = $this->conexao->prepare("SELECT * FROM jogos AS j INNER JOIN jogos_usuario AS ju ON j.codigo = ju.codigo_jogo INNER JOIN imagens_jogos AS ij ON ij.codigo_jogo = j.codigo WHERE ju.codigo_usuario = :codigo AND ij.capa = 1");
		$stmt->bindValue(':codigo', $this->codigo, PDO::PARAM_INT);
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
			$j->setImagem($resultado["imagem"]);
			$j->setCapa($resultado["capa"]);
			$jogos[] = $j;
		}
		return $jogos;
	}

	public function ListarAmigos()
	{
		$stmt = $this->conexao->prepare("SELECT * FROM usuarios AS u INNER JOIN amigos AS a ON u.codigo = a.codigo_amigo WHERE a.codigo_usuario = :codigo");
		$stmt->bindValue(':codigo', $this->codigo, PDO::PARAM_INT);
		$stmt->execute();		
		$usuarios = array();

		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$u = new Usuario();
			$u->setCodigo($resultado["codigo"]);
			$u->setNome($resultado["nome"]);
			$u->setNickname($resultado["nickname"]);
			$u->setEmail($resultado["email"]);
			$u->setSenha($resultado["senha"]);
			$u->setLevel($resultado["level"]);
			$u->setReputacao($resultado["reputacao"]);
			$u->setImagens($resultado["imagem"]);
			$u->setFacebook($resultado["facebook"]);
			$u->setTwitter($resultado["twitter"]);
			$u->setGooglePlus($resultado["google_plus"]);
			$u->setWebsite($resultado["website"]);
			$u->setStatus($resultado["status"]);
			$usuarios[] = $u;
		}
		return $usuarios;
	}

	//Criar metodo ListarSugerido 
	public function ListarSugeridos()
	{
		$stmt = $this->conexao->prepare("SELECT DISTINCT codigo_amigo, imagem, nome, nickname FROM  `amigos` INNER JOIN usuarios ON usuarios.codigo = amigos.codigo_amigo WHERE codigo_amigo NOT IN (SELECT codigo_amigo FROM  `amigos`WHERE codigo_usuario = :codigo) and `codigo_amigo` <> :codigo");
		$stmt->bindValue(':codigo', $this->codigo, PDO::PARAM_INT);
		$stmt->execute();		
		$usuarios = array();

		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$u = new Usuario();
			$u->setCodigo($resultado["codigo_amigo"]);
			$u->setNome($resultado["nome"]);
			$u->setNickname($resultado["nickname"]);
			$u->setImagens($resultado["imagem"]);
			$usuarios[] = $u;
		}
		return $usuarios;
	}

	public function Logar($email, $senha)
	{
		$stmt = $this->conexao->prepare("SELECT * FROM ".$this->tabela." WHERE email = :email and senha = :senha");
		$stmt->bindValue(':email', $email, PDO::PARAM_INT);
		$stmt->bindValue(':senha', md5($senha), PDO::PARAM_INT);
		$stmt->execute();
		$usuario = new Usuario();

		if($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$usuario->setCodigo($resultado["codigo"]);
			$usuario->setNome($resultado["nome"]);
			$usuario->setNickname($resultado["nickname"]);
			$usuario->setEmail($resultado["email"]);
			$usuario->setSenha($resultado["senha"]);
			$usuario->setLevel($resultado["level"]);
			$usuario->setReputacao($resultado["reputacao"]);
			$usuario->setImagens($resultado["imagem"]);
			$usuario->setFacebook($resultado["facebook"]);
			$usuario->setTwitter($resultado["twitter"]);
			$usuario->setGooglePlus($resultado["google_plus"]);
			$usuario->setWebsite($resultado["website"]);
			$usuario->setStatus($resultado["status"]);
		}
		return $usuario;		
	}

	public function AdicionarAmigo($codigo_amigo)
	{
		$stmt = $this->conexao->prepare("INSERT INTO amigos (codigo_usuario, codigo_amigo, datahora) VALUES (:codigo_usuario, :codigo_amigo, :datahora);");
		$stmt->bindValue(':codigo_usuario', $this->codigo, PDO::PARAM_INT);
		$stmt->bindValue(':codigo_amigo', $codigo_amigo, PDO::PARAM_INT);
		$stmt->bindValue(':datahora', date("d-m-y H:i:s"), PDO::PARAM_INT);
		$stmt->execute();
	}

	public function ListarAvaliarDesafios($codigo)
	{
		$stmt = $this->conexao->prepare("SELECT codigo, datahora, codigo_usuario_desafiante, (select nome from usuarios where codigo_usuario_desafiante = codigo) as nome_desafiante, (select imagem from usuarios where codigo_usuario_desafiante = codigo) as imagem_desafiante,codigo_usuario_desafiado, (select nome from usuarios where codigo_usuario_desafiado = codigo) as nome_desafiado, (select imagem from usuarios where codigo_usuario_desafiado = codigo) as imagem_desafiado, (select titulo from jogos where codigo=codigo_jogo) as jogo FROM `desafios` where `confirmacao`= 0 and `codigo_usuario_desafiante`= :codigo");
		$stmt->bindValue(':codigo', $codigo, PDO::PARAM_INT);
		$stmt->execute();		
		$desafios = array();

		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$desafios[] = array("nome"=>$resultado["nome_desafiante"],
								"codigo_desafiante"=>$resultado["codigo_usuario_desafiante"],
					            "imagem"=>$resultado["imagem_desafiante"],
					            "codigo_desafiado"=>$resultado["codigo_usuario_desafiado"],
					            "nome_desafiado"=>$resultado["nome_desafiado"],
					            "imagem_desafiado"=>$resultado["imagem_desafiado"],
					            "jogo"=>$resultado["jogo"],
					            "codigo"=>$resultado["codigo"],
					            "datahora"=>$resultado["datahora"]);
		}
		return $desafios;
	}
}
?>