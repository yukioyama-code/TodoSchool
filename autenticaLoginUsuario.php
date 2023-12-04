<?php
	session_start();



	include_once "bancoGeral.php";
	include_once "usuarioDAO.php";
	include_once "usuario.php";

	$username = $_POST["email"];
	$senha = $_POST["senha"];

	$bd = new ConexaoBanco();
	$usuarioDAO = new UsuarioDAO($bd);

	$senhaHash = $usuarioDAO->verificaSenha($username);

	
	
	
	if($usuarioDAO->verificaUsername($username) == true){
		
		
	if (password_verify($senha, $senhaHash)) {
			  header("Location: menu.php");
			  $_SESSION["email"] = $username;
	}else{
		  header("Location: index.php");
		  $_SESSION["login"] = false;
		  $_SESSION["toast"] = false;

	}

	}

	if($usuarioDAO->verificaUsername($username) ==  null){
		
		  header("Location: index.php");
		  $_SESSION["login"] = false;
		  $_SESSION["toast"] = false;
	}

	
			
		
	



	









?>



