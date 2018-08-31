<?php

	class Conexao	
	{
		private $servidor;
		private $usuario;
		private $senha;
		private $baseDeDados;

		private $conexao;
		
		public function __construct(){
			$this->servidor = "localhost";
			$this->usuario = "root";
			$this->senha = "";
			$this->baseDeDados = "socialcombat";
		}

		public function abrirConexao(){
			try{
				$this->conexao = new PDO("mysql:host=$this->servidor;dbname=$this->baseDeDados", $this->usuario, $this->senha);
			}
			catch(PDOException $e){
				echo "Connection failed: ". $e.getMessage();
			}
			return $this->conexao;
		}

		public function fecharConexao(){
			$this->conexao = null;
		}
	}
?>