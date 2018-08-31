<?php

class ConquistasControlador extends ControladorBase{
    private $usuarioAcessoBD;
    private $dados;
    private $conquistaAcessoBD;
    
    public function __construct() 
    {
        $this->usuarioAcessoBD = $this->carregarAcessoBD("usuarioAcessoBD");
        $this->dados = array();
        
        parent::__construct();
        $this->usuarioAcessoBD->codigo = $this->getUsuarioLogado();
        $this->dados["usuario"] =  $this->usuarioAcessoBD->Listar();
        $grupos = $this->carregarAcessoBD("grupoAcessoBD");
        
        $this->dados["grupos"] = $grupos->ListarGruposUsuario($this->dados["usuario"]->getCodigo()); 
        $this->conquistaAcessoBD = $this->carregarAcessoBD("conquistasAcessoBD");
    }

    public function listar()
    {
        $this->dados["minhas_conquistas"] = $this->conquistaAcessoBD->listarConquistaUsuario($this->dados["usuario"]->getCodigo());
        $conquistas = $this->conquistaAcessoBD->listarConquistas();
        
        // remove do vetor de conquistas as minhas conquistas
        $posicoes = array(); 
        $i = 0;
        foreach ($conquistas as $conquista) {
            foreach ($this->dados["minhas_conquistas"] as $minha_conquista) {
                if($conquista->getCodigo() == $minha_conquista->getCodigo()){
                    $posicoes[] = $i;
                }
            }
            $i++;
        }
        
        foreach ($posicoes as $posicao) {
            unset($conquistas[$posicao]);
        }
        $conquistas = array_values($conquistas);    
        
        $this->dados["conquistas"] = $conquistas;
        $this->carregarView('layout/topo', $this->dados);
        $this->carregarView('layout/menu', $this->dados);
        $this->carregarView('conquistas/listar', $this->dados);
        $this->carregarView('layout/rodape');
    }
    
}
