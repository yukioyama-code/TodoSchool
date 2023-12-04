<?php

	include_once "bancoGeral.php";
	include_once "disciplina.php";


	class disciplinaDAO{


		function __construct($banco){
				
				$this->banco=$banco;
		}

		//Inserir disciplina

		function inserirDisciplina($disciplina){
			$qry= "INSERT INTO disciplinas (nome, professor, eixo, fotoCapa, cpf_usuario) VALUES ('".$disciplina->getnome()."','".$disciplina->getprofessor()."','".$disciplina->geteixo()."', '".$disciplina->getFotoCapa()."', '".$disciplina->getCpfUsuario()."')";

			$this->banco->query($qry);
		}

		function alterarDisciplina($disciplina, $codigoDisc){
			$qry = "UPDATE disciplinas SET nome = '".$disciplina->getnome()."', professor = '".$disciplina->getprofessor()."',eixo = '".$disciplina->geteixo()."', fotoCapa ='".$disciplina->getFotoCapa()."' WHERE codigoDisc =".$codigoDisc;

			$this->banco->query($qry);
		}


		function retornaCodigoDisc($nomeDisc, $cpfUsuario){
			$qry = "SELECT codigoDisc from disciplinas WHERE nome = '".$nomeDisc."' AND cpf_usuario = '".$cpfUsuario."'";

			$res = $this->banco->query($qry);

			if($res->num_rows > 0){
				$row=$res->fetch_array(MYSQLI_ASSOC);
				$codigoDisc = $row['codigoDisc'];
				return $codigoDisc;

			}

			return null;

			$this->banco->query($qry);
		}






		function listarTodasDisciplinas($cpf){
			$qry="SELECT * FROM disciplinas WHERE cpf_usuario = '".$cpf."'";
			$ListaDisciplinas = Array();

			$res = $this->banco->query($qry);

			

			while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
				$disciplina = new Disciplina();
				$disciplina->setnome($row['nome']);
				$disciplina->setprofessor($row['professor']);
				$disciplina->seteixo($row['eixo']);
				$disciplina->setEmoji($row['emoji']);
				$disciplina->setFotoCapa($row['fotoCapa']);
				


				array_push($ListaDisciplinas, $disciplina);
				
			}
			return $ListaDisciplinas;
		}


		function listarTodasDisciplinasBusca($nomeDisciplina, $cpfUsuario){
			$qry="SELECT * FROM disciplinas WHERE cpf_usuario = '".$cpfUsuario."' AND nome LIKE '%".$nomeDisciplina."%'";
			$ListaDisciplinas = Array();

			$res = $this->banco->query($qry);

			

			while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
				$disciplina = new Disciplina();
				$disciplina->setnome($row['nome']);
				$disciplina->setprofessor($row['professor']);
				$disciplina->seteixo($row['eixo']);
				$disciplina->setEmoji($row['emoji']);
				$disciplina->setFotoCapa($row['fotoCapa']);
				


				array_push($ListaDisciplinas, $disciplina);
				
			}
			return $ListaDisciplinas;
		}

		function excluirDisciplina($nomeDisciplina, $cpfUsuario){
			$qry = "DELETE FROM disciplinas WHERE nome = '".$nomeDisciplina."' AND CPF_usuario = '".$cpfUsuario."'";
			$this->banco->query($qry);
		}

		function verificaDisciplina($cpf, $nomeDisciplina){
			$qry = "SELECT nome from disciplinas WHERE nome = '".$nomeDisciplina."' AND cpf_usuario = '".$cpf."'";

			$res = $this->banco->query($qry);

			if($res->num_rows > 0){
				$row=$res->fetch_array(MYSQLI_ASSOC);
				$nome = $row['nome'];
				
				return $nome;

			}

			return null;

			$this->banco->query($qry);
		}

		function retornaDisciplina($nomeDisciplina, $cpf){
			$qry = "SELECT nome, professor, eixo, emoji, fotoCapa from disciplinas WHERE nome = '".$nomeDisciplina."' AND cpf_usuario = '".$cpf."'";
			$ListaDisciplinas = Array();

			$res = $this->banco->query($qry);

			

			while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
				$disciplina = new Disciplina();
				$disciplina->setnome($row['nome']);
				$disciplina->setprofessor($row['professor']);
				$disciplina->seteixo($row['eixo']);
				$disciplina->setEmoji($row['emoji']);
				$disciplina->setFotoCapa($row['fotoCapa']);
				


				array_push($ListaDisciplinas, $disciplina);
				
			}
			return $ListaDisciplinas;
		}


		
	


		



		
	}

?>

