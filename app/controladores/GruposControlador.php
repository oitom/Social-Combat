<?php


class GruposControlador extends ControladorBase{
    private $usuarioAcessoBD;
    private $dados;
    private $topicoAcessoBD;
    private $grupoAcessoBD;
    private $jogoAcessoBD;
    
    public function __construct() 
    {
        $this->usuarioAcessoBD = $this->carregarAcessoBD("usuarioAcessoBD");
        $this->dados = array();
        
        parent::__construct();
        $this->usuarioAcessoBD->codigo = $this->getUsuarioLogado();
        $this->dados["usuario"] =  $this->usuarioAcessoBD->Listar();
        $grupos = $this->carregarAcessoBD("grupoAcessoBD");
        $this->dados["grupos"] = $grupos->ListarGruposUsuario($this->dados["usuario"]->getCodigo()); 

        $this->topicoAcessoBD = $this->carregarAcessoBD("topicoAcessoBD");
        $this->grupoAcessoBD = $this->carregarAcessoBD("grupoAcessoBD");

    }
   
    public function listar()
    {

        //id do usuario
        $this->dados["listagrupo"] = $this->grupoAcessoBD->ListarGruposUsuario($this->dados["usuario"]->getCodigo());

        $this->dados["jogolista"] = $this->grupoAcessoBD->ListarJogosGrupo();
        $this->dados["grupos_sugeridos"] = $this->grupoAcessoBD->GruposSugeridos($this->dados["usuario"]->getCodigo());
        
        $this->carregarView('layout/topo', $this->dados);
        $this->carregarView('layout/menu', $this->dados);
        $this->carregarView('grupos/listar', $this->dados);
        $this->carregarView('layout/rodape');
    }

    public function perfil()
    {
        // id do grupo

        $this->dados["grupo"] = $this->grupoAcessoBD->ListarDadosGrupo($_GET["idgrupo"]);
        $g = $this->dados["grupo"];
        // id do grupo
        $this->dados["topico"] = $this->topicoAcessoBD->listarTopicos($_GET["idgrupo"]);
        $this->dados["jogo"] = $this->grupoAcessoBD->JogoGrupo($g[0]->getCodigoJogo());
        $this->dados["usuarioadm"] = $this->grupoAcessoBD->AdmGrupo($g[0]->getCodigoAdministrador());
        $this->dados["participantes"] = $this->grupoAcessoBD->listarParticipantesGrupo($g[0]->getCodigo());
        $this->carregarView('layout/topo', $this->dados);
        $this->carregarView('layout/menu', $this->dados);
        $this->carregarView('grupos/perfil_grupo', $this->dados);
        $this->carregarView('layout/rodape');
    }
    
}
