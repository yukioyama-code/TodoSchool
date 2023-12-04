<?php

session_start();

$_SESSION["username"] = false; 

include_once "bancoGeral.php";
include_once "usuarioDAO.php";
include_once "usuario.php";

$bd = new ConexaoBanco();
$usuarioDAO = new UsuarioDAO($bd);

$nomeUsuario = $_POST["nome"];
$cpfUsuario = $_POST["cpf"];
$emailUsuario = $_POST["email"];
$senhaUsuario = password_hash($_POST["senha"], PASSWORD_DEFAULT);
$telefoneUsuario = $_POST["telefone"];
$grauEnsinoUsuario = $_POST["grauEnsino"];
$efetuado = "verdadeiro";

//path é o camimho 
if(isset($_FILES['foto'])){
	$fotoPerfil = $_FILES['foto'];
	if($fotoPerfil['error']){
		//die("Falha");
	}
	$pasta = "arquivos/";
	$nomeDaFoto = $fotoPerfil["name"];
	$novoNomeDaFoto = uniqid();
	$extensaoFoto = strtolower(pathinfo($nomeDaFoto, PATHINFO_EXTENSION));
	$pathFoto = $pasta . $novoNomeDaFoto . "." . $extensaoFoto;
	

	if($extensaoFoto !="jpg" && $extensaoFoto !='png'){
		//die("Tipo de arquivo não aceito");
	}



	

	 
	 //$ListaDisciplinas = $usuarioDAO->exibirFotoPerfil();
	 
 
	
 
	

}


//1024 bytes = 1kb
//1024 kb = 1mb





if($usuarioDAO->verificaUsuarioDuplicado($cpfUsuario, $emailUsuario) != null){
	header("Location: cadastroUsuario.php");
	$_SESSION["toastErro"] = false;
}else{
	$usuario = new Usuario();
$usuario->setCpf($cpfUsuario);
$usuario->setNome($nomeUsuario);
$usuario->setSenha($senhaUsuario);
$usuario->setFotoPerfil($path);
$usuario->setEmail($emailUsuario);
$usuario->setTelefone($telefoneUsuario);
$usuario->setGrauEnsino($grauEnsinoUsuario);
$usuarioDAO->inserirUsuario($usuario);
	header("Location: cadastroUsuario.php");
	$_SESSION["username"] = true;
	$_SESSION["toast"] = false;

}

$fotoVerificada = move_uploaded_file($fotoPerfil["tmp_name"], $pathFoto);
	 if($fotoVerificada){
		$usuarioDAO->inserirFotoPerfil($cpfUsuario, $novoNomeDaFoto, $pathFoto);
		//echo "<p> Arquivo enviado com sucesso! Para acessá-lo, clique aqui: <a href=\"arquivos/$novoNomeDaFoto.$extensaoFoto\">Clique aqui</a></p>";
	 }else{
		echo "Falha ao enviar o arquvo";
	 }
//$data = base64_encode($fotoPerfil); 

//echo $data;

