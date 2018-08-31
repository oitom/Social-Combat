<?php 

include_once "EntidadeAcessoBD.php";
class FuncaoAdmAcessoBD extends EntidadeAcessoBD{

	function __construct(){
		parent::__construct();
		$this->tabela = "funcao_adm";
	}
}
?>