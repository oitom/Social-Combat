<?php

include_once FRAMEWORK . "Sessao.php";

class ControladorBase {
    private $usuario_logado;

    public function __construct() 
    {
        if(!$this->getUsuarioLogado())
            header("Location: index.php");
    }

    public function carregarView($nome, $dados = array())
    {
        include APRESENTACAO . $nome . '.php';        
    }
    
    public function carregarAcessoBD($nome)
    {
        include_once ACESSOBD. $nome. '.php';
        $objeto = new $nome;

    	return $objeto;
    }

    public function getUsuarioLogado()
    {
        $sessao = new Sessao();
        if($sessao->get("usuario"))
            return $sessao->get("usuario")->getCodigo();
        else
            return false;
    }

}
