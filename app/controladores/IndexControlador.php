<?php

include_once FRAMEWORK . "Sessao.php";

class IndexControlador extends ControladorBase{
    
    private $usuarioAcessoBD;    
    
    public function __construct() 
    {
        $this->usuarioAcessoBD = $this->carregarAcessoBD("usuarioAcessoBD");        
    }

    public function login()
    {        
        $dados = array();

        if(isset($_POST["email"]) && isset($_POST["senha"])){
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            $usuario = $this->usuarioAcessoBD->Logar($email, $senha);

            if($usuario->getCodigo()){
                $sessao = new sessao();
                $sessao->set("usuario", $usuario );
                header("Location: index.php?c=usuario&f=perfil");
            }
            else
                $dados["msg"] = "Usuários ou senhas inválidos!";
        }

        $this->carregarView('layout/topo');
        $this->carregarView('home/index', $dados);
        $this->carregarView('layout/rodape');
    } 
    
}
