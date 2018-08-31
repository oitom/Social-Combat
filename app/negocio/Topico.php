<?php

Class Topicos {

	private $titulo;
	private $numero_comentarios;
	private $data_hora_ultimo_comentario;
	
	public function getTitulo() {
		return $this->titulo;
	}

	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}

	public function getNumeroComentarios() {
		return $this->numero_comentarios;
	}

	public function setNumeroComentarios($numero_comentarios) {
		$this->numero_comentarios = $numero_comentarios;
	}

	public function getDataHoraUltimoComentario() {
		return $this->data_hora_ultimo_comentario;
	}

	public function setDataHoraUltimoComentario($data_hora_ultimo_comentario) {
		$this->data_hora_ultimo_comentario = $data_hora_ultimo_comentario;
	}
}


?>