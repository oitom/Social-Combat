<?php

class Usuario {
	private $codigo;
	private $nome;
	private $nickname;
	private $email;
	private $senha;
	private $level;
	private $reputacao;
	private $imagens; //link
	private $facebook;
	private $twitter;
	private $google_plus;
	private $website;
	private $status;

	public function getCodigo() {
		return $this->codigo;
	}

	public function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getNickname() {
		return $this->nickname;
	}

	public function setNickname($nickname) {
		$this->nickname = $nickname;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getSenha() {
		return $this->senha;
	}

	public function setSenha($senha) {
		$this->senha = $senha;
	}

	public function getLevel() {
		return $this->level;
	}

	public function setLevel($level) {
		$this->level = $level;
	}

	public function getReputacao() {
		return $this->reputacao;
	}

	public function setReputacao($reputacao) {
		$this->reputacao = $reputacao;
	}

	public function getImagens() {
		return $this->imagens;
	}

	public function setImagens($imagens) {
		$this->imagens = $imagens;
	}

	public function getFacebook() {
		return $this->facebook;
	}

	public function setFacebook($facebook) {
		$this->facebook = $facebook;
	}

	public function getTwitter() {
		return $this->twitter;
	}

	public function setTwitter($twitter) {
		$this->twitter = $twitter;
	}

	public function getGooglePlus() {
		return $this->google_plus;
	}

	public function setGooglePlus($googlePlus) {
		$this->google_plus = $googlePlus;
	}

	public function getWebsite() {
		return $this->website;
	}

	public function setWebsite($website) {
		$this->website = $website;
	}

	public function getStatus() {
		return $this->status;
	}

	public function setStatus($status) {
		$this->status = $status;
	}
}
?>
