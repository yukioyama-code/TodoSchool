<?php 
	class Mensagem{
		private $id;
		private $texto;
		private $autor;
		

		function __construct(){
			//$this->id=-1;

		}

		//ID do Anúncio
		function getId(){
			return $this->id;
		}

		function setId($id){
			$this->id=$id;
		}

		
		
	

		function getTexto(){
			return $this->texto;
		}

		function setTexto($texto){
			$this->texto=$texto;
		}
			
		
		function getAutor(){
			return $this->autor;
		}

		function setAutor($autor){
			$this->autor=$autor;
		}
		
	
	}
?>