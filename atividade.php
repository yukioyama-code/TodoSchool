<?php

    class Atividade{
        private $codigo;
        private $dataEntrega;
        private $importancia;
        private $titulo;
        private $descricao;
        private $nomeDisciplina;
		private $cpf_usuario;
        
        function __construct(){

        }      

        function getCodigo(){
            return $this->codigo;
        }

        function setCodigo($codigo){
            $this->codigo=$codigo;
        }

        function getDataEntrega(){
            return $this->dataEntrega;
        }

        function setDataEntrega($dataEntrega){
            $this->dataEntrega=$dataEntrega;
        }

        function getImportancia(){
            return $this->importancia;
        }

        function setImportancia($importancia){
            $this->importancia=$importancia;
        }

        function getTitulo(){
            return $this->titulo;
        }

        function setTitulo($titulo){
            $this->titulo=$titulo;
        }

        function getDescricao(){
            return $this->descricao;
        }

        function setDescricao($descricao){
            $this->descricao=$descricao;
        }

        function getNomeDisciplina(){
            return $this->nomeDisciplina; 
        }

        function setNomeDisciplina($nomeDisciplina){
            $this->nomeDisciplina=$nomeDisciplina;
        }

		function getCpfUsuario(){
			return $this->cpf_usuario;
		}

		function setCpfUsuario($cpf_usuario){
			$this->cpf_usuario=$cpf_usuario;
		}	
        
        
    }
?>