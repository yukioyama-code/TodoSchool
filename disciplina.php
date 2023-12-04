<?php

    class Disciplina{
        private $nome;
        private $professor;
        private $eixo;
        private $FotoCapa;
        private $Emoji;
		private $cpf_usuario;
        
        function __construct(){

        }

        function getnome(){
			return $this->nome;
		}

		function setnome($nome){
			$this->nome=$nome;
		}	

        function getprofessor(){
			return $this->professor;
		}

		function setprofessor($professor){
			$this->professor=$professor;
		}	

        function geteixo(){
			return $this->eixo;
		}

		function seteixo($eixo){
			$this->eixo=$eixo;
		}	
	
        function getFotoCapa(){
			return $this->FotoCapa;
		}

		function setFotoCapa($FotoCapa){
			$this->FotoCapa=$FotoCapa;
		}	

        function getEmoji(){
			return $this->Emoji;
		}

		function setEmoji($Emoji){
			$this->Emoji=$Emoji;
		}

		function getCpfUsuario(){
			return $this->cpf_usuario;
		}

		function setCpfUsuario($cpf_usuario){
			$this->cpf_usuario=$cpf_usuario;
		}	
        
        
    }
?>