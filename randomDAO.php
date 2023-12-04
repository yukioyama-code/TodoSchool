<?php
	include_once "banco.php";
	include_once "random.php";

	class RandomDAO{

		private $banco;
		
		
		function __construct($banco)
		{
			$this->banco=$banco;

			
		}
		
		function random($id){
			$qry = "SELECT * FROM mensagem WHERE id = ".$id;

			$res = $this->banco->query($qry);

			if($res->num_rows > 0){
				$mensagem = new Mensagem();
				$row=$res->fetch_array(MYSQLI_ASSOC);
				$mensagem->setId($row['id']);
				$mensagem->setTexto($row['texto']);				
				$mensagem->setAutor($row['autor']);				
				return $mensagem;

			}

			return null;
		}

	}
?>