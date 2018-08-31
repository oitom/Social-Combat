<?php

define("LOCALSITE", "http://localhost/socialcombat/");

//Definição de Constantes
define("APP", $_SERVER['DOCUMENT_ROOT'] .'socialcombat/app/' );
define("FRAMEWORK", $_SERVER['DOCUMENT_ROOT'] .'socialcombat/framework/' );

define("APRESENTACAO", APP . 'apresentacao/');
define("CONTROLADORES", APP . 'controladores/');
define("NEGOCIO", APP . 'negocio/');
define("ACESSOBD", APP . 'acessobd/');

//recursos
define("FONTE", LOCALSITE. 'app/apresentacao/recursos/font-awesome/');
define("IMG", LOCALSITE. 'app/apresentacao/recursos/img/');
define("JS", LOCALSITE. 'app/apresentacao/recursos/js/');
define("CSS", LOCALSITE. 'app/apresentacao/recursos/css/');

// funções utilitarios
include_once FRAMEWORK . "HTMLUtilitario.php";
include_once FRAMEWORK . "Sessao.php";

if(isset($_GET['c']) && isset($_GET['f'])){
    $nomeControlador = $_GET['c'];
    $nomeFuncao = $_GET['f'];
    
    $nomeControlador = $nomeControlador . 'Controlador';
    $arquivoControlador = CONTROLADORES . $nomeControlador . '.php';
    
    if(file_exists($arquivoControlador)){
        include_once FRAMEWORK . 'ControladorBase.php';
        include_once $arquivoControlador ;
        $controlador = new $nomeControlador;
        
        if(method_exists($controlador, $nomeFuncao)){
            $controlador->{$nomeFuncao}();
        }else{
            echo 'funcao nao existe';
        }
        
    }else{
        echo 'controlador nao existe';
    }   
}
else{
     include_once FRAMEWORK . 'ControladorBase.php';
     include_once CONTROLADORES. 'IndexControlador.php' ;
     $controlador = new IndexControlador();
     $controlador->login();
}



