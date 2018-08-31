<?php

	include_once NEGOCIO. "Topico.php";
	include_once ACESSOBD. "EntidadeAcessoBD.php";


class TopicoAcessoBD extends EntidadeAcessoBD
{
	
	function __construct()
	{
		parent:: __construct();
		$this->tabela ="topicos";
	}



	/*public function listarTopicosTodos()
		{
			$stmt = parent::listarTodos();
			$topicos = array();

			while($resultado = $stmt->fetch(PDO::FETCH_ASSOC)){
				$top = new Topicos();
				$top->setTitulo($resultado['titulo']);
				$top->setNumeroComentarios($resultado['numero_comentarios']);
				$top->setDataHoraUltimoComentario($resultado['datahora_ultimo_comentario']);

				$topicos[] = $top;
			}
			return $topicos;

	} */

	// Retorna o número de tópicos do grupo

	public function numeroTopicos($codigo)
	{
		$stmt = $this->conexao->prepare("SELECT  COUNT(*) FROM topicos WHERE codigo_grupo = $codigo");
		$stmt->execute();
		$resultado = $stmt->fetch(PDO::FETCH_NUM);
		return $resultado;
	}


	// Retorna o objeto que contem os tópicos do grupo
	
	public function listarTopicos($codigo)
	{
		$stmt = $this->conexao->prepare("SELECT * FROM topicos WHERE codigo_grupo = $codigo");
		$stmt->execute();
		$topicos=array();
		while($resultado = $stmt->fetch(PDO::FETCH_ASSOC)){
				$top = new Topicos();
				$top->setTitulo($resultado['titulo']);
				$top->setNumeroComentarios($resultado['numero_comentarios']);
				$top->setDataHoraUltimoComentario($resultado['datahora_ultimo_comentario']);

				$topicos[] = $top;
			}
		return $topicos;
		
	}

	
}
	
?>