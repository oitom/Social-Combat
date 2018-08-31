<?php 

include_once "EntidadeAcessoBD.php";
include_once "UsuarioAdmAcessoBD.php";
include_once "negocio/GrupoAdm.php";

class GrupoAdmAcessoBD extends EntidadeAcessoBD{

	private $usuarioAdmAcessoDB;

	function __construct(){
		parent::__construct();
		$this->tabela = "grupos_adm";
		$this->usuarioAdmAcessoDB = new UsuarioAdmAcessoBD();
	}

	public function listarTodos($comUsuarios = false, $compermissoes =false){

		$stmt = parent::listarTodos();
		$grupos = array();

		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$g = new GrupoAdm();
			$g->setCodigo($resultado["codigo"]);
			$g->setNome($resultado["nome"]);
			
			if($comUsuarios){
				
			   $g->setUsuarios($this->usuarioAdmAcessoDB->listarTodosPorGrupo($g->getCodigo()));
			}

			if($compermissoes)
			{
				//$g->setPermissoes($usuarioAdmAcessoDB->listarTodos());
			}
			
			$grupos[] = $g;
		}
		return $grupos;
	}
}
?>