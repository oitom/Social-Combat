<?php 

include_once "EntidadeAcessoBD.php";
include_once "negocio/Preferencias.php";
include_once "UsuarioAcessoBD.php";

class PreferenciaAcessoBD extends EntidadeAcessoBD{

	function __construct(){
		parent::__construct();
		$this->tabela = "preferencias";
	}

	public function listarTodos()
	{
		$stmt = parent::listarTodos();
		$preferencias = array();

		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$u = new UsuarioAcessoBD();
			$u = $u->listar($resultado["codigo_usuario"]);

			$p = new Preferencias();
			$p->setCodigo($resultado["codigo"]);
			$p->setUsuario($u);
			$p->setCorLayout($resultado["cor_layout"]);
			$p->setBorda($resultado["borda"]);
			$p->setIdXbox($resultado["id_xbox_live"]);
			$p->setIdPsn($resultado["id_psn"]);
			$p->setIdSteam($resultado["id_steam"]);
			$p->setIdBattlenet($resultado["id_battlenet"]);
			//$p->setGenero($resultado["genero"]);
			$preferencias[] = $p;
		}
		return $preferencias;
	}

	public function listar($codigo)
	{
		$stmt = $this->conexao->prepare("SELECT * FROM ".$this->tabela." WHERE codigo = :codigo");
		$stmt->bindValue(':codigo', $codigo, PDO::PARAM_INT);
		$stmt->execute();
		$preferencia = new Preferencias();
		
		if($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$u = new UsuarioAcessoBD();
			$u = $u->listar($resultado["codigo_usuario"]);
			$preferencia->setCodigo($resultado["codigo"]);
			$preferencia->setUsuario($u);
			$preferencia->setCorLayout($resultado["cor_layout"]);
			$preferencia->setBorda($resultado["borda"]);
			$preferencia->setIdXbox($resultado["id_xbox_live"]);
			$preferencia->setIdPsn($resultado["id_psn"]);
			$preferencia->setIdSteam($resultado["id_steam"]);
			$preferencia->setIdBattlenet($resultado["id_battlenet"]);
			//$preferencia->setGenero($resultado["genero"]);
		}
		return $preferencia;
	}
}
?>