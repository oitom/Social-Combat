<?php

class JogosControlador extends ControladorBase{
    private $usuarioAcessoBD;
    private $jogoAcessoBD;
    private $dados;
    
    public function __construct() 
    {
        $this->usuarioAcessoBD = $this->carregarAcessoBD("usuarioAcessoBD");
        $this->dados = array();
        
        parent::__construct();
        $this->usuarioAcessoBD->codigo = $this->getUsuarioLogado();
        $this->dados["usuario"] =  $this->usuarioAcessoBD->Listar();
        $grupos = $this->carregarAcessoBD("grupoAcessoBD");
        
        $this->dados["grupos"] = $grupos->ListarGruposUsuario($this->dados["usuario"]->getCodigo()); 
        $this->jogoAcessoBD = $this->carregarAcessoBD("JogoAcessoBD");
    }

    public function listar()
    {
        $this->dados["jogos"] = $this->jogoAcessoBD->listarJogos($this->usuarioAcessoBD->codigo);
        $this->dados["sugestao_jogos"] = $this->jogoAcessoBD->sugestao($this->usuarioAcessoBD->codigo);

        $this->carregarView('layout/topo', $this->dados);
        $this->carregarView('layout/menu', $this->dados);
        $this->carregarView('jogos/listar', $this->dados);
        $this->carregarView('layout/rodape');
    }

    public function perfil()
    {
        $codigoJogo = $_GET["codigo_jogo"]; // pega o codigo do jogo para saber qual pagina carregar
        $this->dados["jogo"] = $this->jogoAcessoBD->listar($codigoJogo); //  cria o objeto  com base no codigo recebido  
        $this->dados["foto"] = $this->jogoAcessoBD->listarGaleriaJogo($codigoJogo);
        $this->dados["feed"] = $this->jogoAcessoBD->listarFeed($codigoJogo);                                                               

        $this->carregarView('layout/topo', $this->dados);
        $this->carregarView('layout/menu', $this->dados);
        $this->carregarView('jogos/perfil_jogo', $this->dados);
        $this->carregarView('layout/rodape');
    }
    
}