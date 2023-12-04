<?php
	class Usuario{
		private $cpf;
		private $nome;
		private $senha;
		private $fotoPerfil;
		private $email;
		private $telefone;
		private $grauEnsino;

		function __construct(){
			
		}

		//CPF do Usuário
		function getCpf(){
			return $this->cpf;
		}

		function setCpf($cpf){
			$this->cpf=$cpf;
		}	
	
		//Nome do Usuário
		function getNome(){
			return $this->nome;
		}

		function setNome($nome){
			$this->nome=$nome;
		}
		
		//Senha do Usuário 
		function getSenha(){
			return $this->senha;
		}

		function setSenha($senha){
			$this->senha=$senha;
		}
		
		//Foto Perfil do Usuário
		function getFotoPerfil(){
			return $this->fotoPerfil;
		}

		function setFotoPerfil($fotoPerfil){
			$this->fotoPerfil=$fotoPerfil;
		}
		
		//E-mail do Usuário
		function getEmail(){
			return $this->email;
		}

		function setEmail($email){
			$this->email=$email;
		}

		//Telefone do Usuário
		function getTelefone(){
			return $this->telefone;
		}

		function setTelefone($telefone){
			$this->telefone=$telefone;
		}

		//Grau de Ensino do Usuário
		function getGrauEnsino(){
			return $this->grauEnsino;
		}

		function setGrauEnsino($grauEnsino){
			$this->grauEnsino=$grauEnsino;
		}









}
?>
