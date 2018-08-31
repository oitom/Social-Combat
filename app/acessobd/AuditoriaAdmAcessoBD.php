<?php 

include_once "EntidadeAcessoBD.php";
class AuditoriaAdmAcessoBD extends EntidadeAcessoBD{

	function __construct(){
		parent::__construct();
		$this->tabela = "auditoria_adm";
	}
}
?>