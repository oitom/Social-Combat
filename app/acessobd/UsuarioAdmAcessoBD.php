<?php 

include_once "EntidadeAcessoBD.php";
include_once "negocio/UsuarioAdm.php";

class UsuarioAdmAcessoBD extends EntidadeAcessoBD{

	function __construct(){
		parent::__construct();
		$this->tabela = "usuarios_adm";
	}

	public function listarTodosPorGrupo($codigoGrupo = null)
	{
		$stmt = $this->conexao->prepare("SELECT * FROM ".$this->tabela." WHERE codigo_grupos_adm = :codigo");
		$stmt->bindValue(':codigo', $codigoGrupo, PDO::PARAM_INT);
		$stmt->execute();		
		$usuarios = array();
		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$u = new UsuarioAdm();
			$u->setCodigo($resultado["codigo"]);
			$u->setNome($resultado["nome"]);
			$u->setEmail($resultado["email"]);
			$u->setSenha($resultado["senha"]);
			$usuarios[] = $u;
		}
		return $usuarios;
	}

	public function listarTodos($comGrupo = false)
	{

		$stmt = parent::listarTodos();
		$usuarios = array();

		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$u = new UsuarioAdm();
			$u->setCodigo($resultado["codigo"]);
			$u->setNome($resultado["nome"]);
			$u->setEmail($resultado["email"]);
			$u->setSenha($resultado["senha"]);
			
			if($comGrupo){
				// popular grupo
			   //$g->setUsuario($usuarioAdmAcessoDB->listarTodos());
			}

			$usuarios[] = $u;
		}
		return $usuarios;
	}

	
}
?>