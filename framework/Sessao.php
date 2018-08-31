<?php 


	class sessao{
	

		public function __construct() 
		{
			$this->abrir();			
		}

		private function abrir()
		{
			if(!isset($_SESSION))
				session_start();
			
		}
		
		public function fechar()
		{
			session_unset();
			session_destroy();
			setcookie(session_name(), null, time() - 3600, "/");
		}

		public function set($CHAVE, $VALOR)
		{
			$_SESSION[$CHAVE] = $VALOR;			
		}

		public function get($CHAVE)
		{
			return $_SESSION[$CHAVE];
		}

		public function getID()
		{				
			return session_id();
		}

		public function getNome()
		{
			return session_name();
		}

		public function existe($CHAVE)
		{
			return isset($_SESSION[$CHAVE]);
		}
	}

	
?>