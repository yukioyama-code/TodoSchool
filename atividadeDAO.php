<?php

	include_once "bancoGeral.php";
	include_once "atividade.php";


	class atividadeDAO{


		function __construct($banco){
				
				$this->banco=$banco;
		}

		//Inserir atividade

		function inserirAtividade($atividade){
			$qry= "INSERT INTO atividades (dataEntrega, importancia, descricao, titulo,  cpf_usuario, nome_disciplina) VALUES ('".$atividade->getDataEntrega()."','".$atividade->getImportancia()."','".$atividade->getDescricao()."', '".$atividade->getTitulo()."', '".$atividade->getCpfUsuario()."','".$atividade->getNomeDisciplina()."')";

			$this->banco->query($qry);
		}

		function listarTodasAtividades($cpf){
			$qry="SELECT * from atividades where cpf_usuario = '".$cpf."'";
			$ListaAtividades = Array();

			$res = $this->banco->query($qry);

			

			while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
				$atividade = new Atividade();
				$atividade->setDataEntrega($row['dataEntrega']);
				$atividade->setImportancia($row['importancia']);
				$atividade->setTitulo($row['titulo']);
				$atividade->setDescricao($row['descricao']);
				$atividade->setNomeDisciplina($row['nome_Disciplina']);
				$atividade->setCodigo($row['codigo']);


				array_push($ListaAtividades, $atividade);
				
			}
			return $ListaAtividades;
		}


		function alterarAtividade($atividade){
			$qry = "UPDATE atividades SET titulo = '".$atividade->getTitulo()."', nome_Disciplina = '".$atividade->getNomeDisciplina()."', descricao = '".$atividade->getDescricao()."',dataEntrega = '".$atividade->getDataEntrega()."', importancia = '".$atividade->getImportancia()."' WHERE codigo= '".$atividade->getCodigo()."'";

			$this->banco->query($qry);
		}

		

		function retornaAtividades($codigo){
			$qry="SELECT * from atividades where codigo = '".$codigo."'";
			$ListaAtividades = Array();

			$res = $this->banco->query($qry);

			

			while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
				$atividade = new Atividade();
				$atividade->setDataEntrega($row['dataEntrega']);
				$atividade->setImportancia($row['importancia']);
				$atividade->setTitulo($row['titulo']);
				$atividade->setDescricao($row['descricao']);
				$atividade->setNomeDisciplina($row['nome_Disciplina']);
				$atividade->setCodigo($row['codigo']);


				array_push($ListaAtividades, $atividade);
				
			}
			return $ListaAtividades;
		}

		function excluirAtividade($codigo){
			$qry = "DELETE FROM atividades WHERE codigo = '".$codigo."'";
			$this->banco->query($qry);
		}

		function listarTodasAtividadesBusca($titulo, $cpfUsuario){
			$qry="SELECT * FROM atividades WHERE CPF_usuario = '".$cpfUsuario."' AND titulo LIKE '%".$titulo."%'";
			$ListaAtividades = Array();

			$res = $this->banco->query($qry);

			

			while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
				$atividade = new Atividade();
				$atividade->setDataEntrega($row['dataEntrega']);
				$atividade->setImportancia($row['importancia']);
				$atividade->setTitulo($row['titulo']);
				$atividade->setDescricao($row['descricao']);
				$atividade->setNomeDisciplina($row['nome_Disciplina']);
				$atividade->setCodigo($row['codigo']);
				


				array_push($ListaAtividades, $atividade);
				
			}
			return $ListaAtividades;
		}

		function atividadesImportantes($cpfUsuario){
			$qry="SELECT * FROM atividades WHERE CPF_usuario = '".$cpfUsuario."' AND importancia = 'sel'";
			$ListaAtividades = Array();
	
			$res = $this->banco->query($qry);
	
			
	
			while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
				$atividade = new Atividade();
				$atividade->setDataEntrega($row['dataEntrega']);
				$atividade->setImportancia($row['importancia']);
				$atividade->setTitulo($row['titulo']);
				$atividade->setDescricao($row['descricao']);
				$atividade->setNomeDisciplina($row['nome_Disciplina']);
				$atividade->setCodigo($row['codigo']);
				
	
	
				array_push($ListaAtividades, $atividade);
				
			}
			return $ListaAtividades;
		}
	

		
	}

	


?>

