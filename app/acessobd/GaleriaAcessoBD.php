<?php 
include_once ACESSOBD. "EntidadeAcessoBD.php";
include_once NEGOCIO.  "Galeria.php";
include_once NEGOCIO.  "Fotos.php";

class GaleriaAcessoBD extends EntidadeAcessoBD{
	function __construct(){
		parent::__construct();
	}

	public function listarGalerias($codigo_usuario)
	{
		$this->tabela = "galerias";
		$stmt = $this->conexao->prepare("SELECT * FROM ".$this->tabela." WHERE codigo_usuario = :codigo_usuario");
		$stmt->bindValue(':codigo_usuario', $codigo_usuario, PDO::PARAM_INT);
		$stmt->execute();		
		$galerias = array();
		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$j = new Galeria();
			$j->setCodigo($resultado["codigo"]);
			$j->setCodigo_usuario($resultado["codigo_usuario"]);
			$j->setTitulo($resultado["titulo"]);
			$j->setDatahora($resultado["datahora"]);
			$galerias[] = $j;
		}
		
		return $galerias;
	}
	
	public function listarFotos($codigo_galeria)
	{
		$this->tabela = "fotos";
		$stmt = $this->conexao->prepare("SELECT imagem, legenda FROM ".$this->tabela." WHERE codigo_galeria = :codigo_galeria");
		$stmt->bindValue(':codigo_galeria', $codigo_galeria, PDO::PARAM_INT);
		$stmt->execute();		
		$fotos = array();
		while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$f = new Fotos();
			$f->setImagem($resultado["imagem"]);
			$f->setLegenda($resultado["legenda"]);
			$fotos[] = $f;
		}
		
		return $fotos;
	}
}
?>