<?php
Class Preferencias {
	private $codigo;
	private $usuario;
	private $cor_do_layout;
	private $borda;
	private $id_xbox;
	private $id_psn;
	private $id_steam;
	private $id_battlenet;
	private $genero;
	private $plataforma;

	public function getCodigo() {
		return $this->codigo;
	}

	public function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	public function getUsuario() {
		return $this->codigo_usuario;
	}

	public function setUsuario($usuario) {
		$this->usuario = $usuario;
	}

	public function getCorLayout() {
		return $this->cor_layout;
	}

	public function setCorLayout($cor_layout) {
		$this->cor_layout = $cor_layout;
	}

	public function getBorda() {
		return $this->borda;
	}

	public function setBorda($borda) {
		$this->borda = $borda;
	}

	public function getIdXbox() {
		return $this->id_xbox;
	}

	public function setIdXbox($id_xbox) {
		$this->id_xbox = $id_xbox;
	}

	public function getIdPsn() {
		return $this->id_psn;
	}

	public function setIdPsn($id_psn) {
		$this->id_psn = $id_psn;
	}

	public function getIdSteam() {
		return $this->id_steam;
	}

	public function setIdSteam($id_steam) {
		$this->id_steam = $id_steam;
	}

	public function getIdBattlenet() {
		return $this->id_battlenet;
	}

	public function setIdBattlenet($id_battlenet) {
		$this->id_battlenet = $id_battlenet;
	}

	public function getGenero() {
		return $this->genero;
	}

	public function setGenero($genero) {
		$this->genero = $genero;
	}
}


?>