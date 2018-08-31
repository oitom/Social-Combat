<?php

class UsuarioControlador extends ControladorBase{
    private $usuarioAcessoBD;
    private $dados;
    
    public function __construct() 
    {
        $this->usuarioAcessoBD = $this->carregarAcessoBD("usuarioAcessoBD");
        $this->dados = array();
        
        parent::__construct();
        $this->usuarioAcessoBD->codigo = $this->getUsuarioLogado();
        $this->dados["usuario"] =  $this->usuarioAcessoBD->Listar();
    }

    public function perfil()
    {
        $grupos = $this->carregarAcessoBD("grupoAcessoBD");
        if(isset($_GET["amigo"])){

            if($_GET["amigo"] == $this->dados["usuario"]->getCodigo())
                header("Location: index.php?c=usuario&f=perfil");
            else{
                $amigo = $this->carregarAcessoBD("usuarioAcessoBD");
                $amigo->codigo = $_GET["amigo"];
                $this->dados["jogos"] = $amigo->ListarJogos();
                $this->dados["amigos"] = $amigo->ListarAmigos();        
                $this->dados["amigo"] = $amigo->Listar();        
                $this->dados["grupos"] = $grupos->ListarGruposUsuario($this->dados["amigo"]->getCodigo());        
                
                
                if($this->dados["amigo"]->getCodigo() == null)
                    $this->dados["erro"] = "Usuário não encontrado!"; 

                $usuario_logado = $this->carregarAcessoBD("usuarioAcessoBD");
                $usuario_logado->codigo = $this->dados["usuario"]->getCodigo();
                $meus_amigo = $usuario_logado->ListarAmigos(); 

                foreach ($meus_amigo as $amigo) {
                     $codigo_amigos[] = $amigo->getCodigo();
                }

                $galeria = $this->carregarAcessoBD("galeriaAcessoBD");
                $conteudo = $galeria->listarGalerias($this->dados["amigo"]->getCodigo());

                for ($i=0; $i < count($conteudo); $i++) { 
                $this->dados["galerias"][]= array("foto"=>$galeria->listarFotos($conteudo[$i]->getCodigo()));
                }

                if(!in_array($_GET["amigo"], $codigo_amigos))
                    $this->dados["nao_amigo"] = true;
            }
        }
        else{
            $this->dados["jogos"] = $this->usuarioAcessoBD->ListarJogos();
            $this->dados["amigos"] = $this->usuarioAcessoBD->ListarAmigos();        
            $this->dados["grupos"] = $grupos->ListarGruposUsuario($this->dados["usuario"]->getCodigo());        
        }
        $this->carregarView('layout/topo', $this->dados);
        $this->carregarView('layout/menu', $this->dados);
        $this->carregarView('usuario/perfil', $this->dados);
        $this->carregarView('layout/rodape');
    }
    public function configuracoes()
    {
        $grupos = $this->carregarAcessoBD("grupoAcessoBD");
        $this->dados["grupos"] = $grupos->ListarGruposUsuario($this->dados["usuario"]->getCodigo());
        $this->carregarView('layout/topo', $this->dados);
        $this->carregarView('layout/menu', $this->dados);
        $this->carregarView('usuario/configuracoes', $this->dados);
        $this->carregarView('layout/rodape');
    }

    public function galeria()
    {
        $grupos = $this->carregarAcessoBD("grupoAcessoBD");
        $this->dados["grupos"] = $grupos->ListarGruposUsuario($this->dados["usuario"]->getCodigo());
        
        $galeria = $this->carregarAcessoBD("galeriaAcessoBD");
        $conteudo = $galeria->listarGalerias($this->dados["usuario"]->getCodigo());
        
        for ($i=0; $i < count($conteudo); $i++) { 
            $this->dados["galerias"][]= array("titulo" => $conteudo[$i]->getTitulo() , "foto"=>$galeria->listarFotos($conteudo[$i]->getCodigo()));
        }
        
        $this->carregarView('layout/topo', $this->dados);
        $this->carregarView('layout/menu', $this->dados);
        $this->carregarView('usuario/galeria', $this->dados);
        $this->carregarView('layout/rodape');
    }
    public function feed()
    {
        $feed = $this->carregarAcessoBD("FeedAcessoBD");
        $amigosUsuario = $this->carregarAcessoBD("UsuarioAcessoBD");
        $amigosUsuario->codigo = $this->dados["usuario"]->getCodigo(); 
        $amigos = $amigosUsuario->ListarAmigos();

        if(isset($_GET["amigo"])){
           $feed->codigo = $_GET["amigo"];
           $this->dados["feed"] = $feed->Listar();
        }else
            $this->dados["feed"]  = $feed->ListarPorUsuario($this->dados["usuario"]->getCodigo());

        $meusAmigos = array();
        foreach ($amigos as $amigo) {
            $meusAmigos[] = $amigo->getCodigo();
        }

        foreach ($this->dados["feed"] as $feed) {
            if(in_array($feed->getUsuario()->getCodigo(), $meusAmigos)){ 
                switch ($feed->getTipo()) {
                    case 1: $this->carregarView('feed/feed_comentario', array("feed" => $feed)); break;
                    case 2: $this->carregarView('feed/feed_foto', array("feed" => $feed)); break;
                    case 3: $this->carregarView('feed/feed_desafio', array("feed" => $feed)); break;
                }
            }
        }
    }

    public function adicionarAmigo()
    {
        $usuario = $this->carregarAcessoBD("usuarioAcessoBD");
        $usuario->codigo = $this->dados["usuario"]->getCodigo();
        $usuario->AdicionarAmigo($_GET["amigo"]);
    }

    public function sair()
    {
       $sessao = new Sessao();
       $sessao->fechar();
       header("Location: index.php");
    }
    
}
