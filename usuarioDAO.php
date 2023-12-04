<?php

	include_once "bancoGeral.php";
	include_once "usuario.php";


	class UsuarioDAO{


		function __construct($banco){
				
				$this->banco=$banco;
		}

		//Inserir usuário

		function inserirUsuario($usuario){
			$qry= "INSERT INTO usuario (cpf, nome, senha, fotoPerfil, email, telefone, grauEnsino) VALUES ('".$usuario->getCpf()."','".$usuario->getNome()."','".$usuario->getSenha()."','".$usuario->getFotoPerfil()."','".$usuario->getEmail()."','".$usuario->getTelefone()."', '".$usuario->getGrauEnsino()."')";

			$this->banco->query($qry);
		}

		
		//Verifica E-mail e CPF 


		function verificaUsuarioDuplicado ($cpf, $email){
			$qry = "SELECT * FROM usuario WHERE cpf = '".$cpf."' OR email = '".$email."'";
			
			$res = $this->banco->query($qry);
			$qtde = $res->num_rows;
			
			
			if($res->num_rows > 0){
				$usuario = new Usuario();
				$row = $res->fetch_array(MYSQLI_ASSOC);
				$usuario->setCpf($row["CPF"]);
				$usuario->setNome($row["nome"]);
				$usuario->setSenha($row["senha"]);
				$usuario->setfotoPerfil($row["fotoPerfil"]);
				$usuario->setEmail($row["email"]);
				$usuario->setTelefone($row["telefone"]);
				$usuario->setGrauEnsino($row["grauEnsino"]);
				return $usuario;
					
			}

			return null;



		}


		function buscarImagem($cpf, $fotoPerfil){
			$qry= "SELECT cpf, fotoPerfil from usuario WHERE cpf = '$cpf'";

			$res = $this->banco->query($qry);

			if($res->num_rows > 0){
				$row=$res->fetch_array(MYSQLI_ASSOC);
				$fotoPerfil = $row['fotoPerfil'];

			}

			return null;

			$this->banco->query($qry);
		}


		function verificaUsername($email){
			$qry = "SELECT email from usuario WHERE email = '$email'";

			$res = $this->banco->query($qry);

			if($res->num_rows > 0){
				$row=$res->fetch_array(MYSQLI_ASSOC);
				$email = $row['email'];
				return true;

			}

			return null;

			$this->banco->query($qry);
		}

		function verificaSenha($email){
			$qry = "SELECT senha from usuario WHERE email = '$email'";

			$res = $this->banco->query($qry);

			if($res->num_rows > 0){
				$row=$res->fetch_array(MYSQLI_ASSOC);
				$senha = $row['senha'];
				return $senha;

			}

			return null;

			$this->banco->query($qry);
		}


		function retornaCPF($email){
			$qry = "SELECT cpf from usuario WHERE email = '$email'";

			$res = $this->banco->query($qry);

			if($res->num_rows > 0){
				$row=$res->fetch_array(MYSQLI_ASSOC);
				$cpf = $row['cpf'];
				return $cpf;

			}

			return null;

			$this->banco->query($qry);
		}



		function verificaNome($email){
			$qry = "SELECT nome from usuario WHERE email = '$email'";

			$res = $this->banco->query($qry);

			if($res->num_rows > 0){
				$row=$res->fetch_array(MYSQLI_ASSOC);
				$nome = $row['nome'];
				return $nome;

			}

			return null;

			$this->banco->query($qry);
		}


		
		function verificaGrauEnsino($email){
			$qry = "SELECT grauEnsino from usuario WHERE email = '$email'";

			$res = $this->banco->query($qry);

			if($res->num_rows > 0){
				$row=$res->fetch_array(MYSQLI_ASSOC);
				$grauEnsino = $row['grauEnsino'];
				return $grauEnsino;

			}

			return null;

			$this->banco->query($qry);
		}


		function inserirFotoPerfil($cpf, $nome, $path){
			$qry= "INSERT INTO arquivos (cpf_usuario, nome, path) VALUES ('".$cpf."', '".$nome."','".$path."')";

			$this->banco->query($qry);
		}


		function exibirFotoPerfil($cpf){
			$qry = "SELECT path FROM arquivos WHERE cpf_usuario = '$cpf'";
			
			$res = $this->banco->query($qry);
			$qtde = $res->num_rows;
			
			
			if($res->num_rows > 0){
				$row = $res->fetch_array(MYSQLI_ASSOC);
				$path=$row["path"];
				
				return $path;


					
			}

			return null;

			
		}

		function verificaCPF($email){
			$qry = "SELECT cpf FROM usuario WHERE email = '$email'";
			
			$res = $this->banco->query($qry);
			$qtde = $res->num_rows;
			
			
			if($res->num_rows > 0){
				$row = $res->fetch_array(MYSQLI_ASSOC);
				$cpfUsuario=$row["cpf"];
				
				return $cpfUsuario;


					
			}

			return null;

			
		}




		
	}

?>

