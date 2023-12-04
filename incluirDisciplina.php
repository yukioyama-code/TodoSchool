<?php
session_start();

include_once "bancoGeral.php";
include_once "usuarioDAO.php";
include_once "usuario.php";
include_once "disciplina.php";
include_once "disciplinaDAO.php";


$bd = new ConexaoBanco();
$usuarioDAO = new UsuarioDAO($bd);
$disciplinaDAO = new DisciplinaDAO($bd);
$duplicataDisciplina = false;
$emailUsuario = $_GET["email"];
$nomeDisciplina = $_POST["txtNomeDisc"];
$professorDisciplina = $_POST["txtProfDisc"];
$eixoDisciplina = $_POST["txtEixoDisc"];

$cpfUsuario = $usuarioDAO->retornaCPF($emailUsuario);

if($disciplinaDAO->verificaDisciplina($cpfUsuario, $nomeDisciplina) != null){
	$duplicataDisciplina = true;
	header("Location: inclusaoDisciplina.php?duplicata=sim&email=$emailUsuario");
	
}

if(isset($_FILES['fotoCapa'])){
	$fotoCapa = $_FILES['fotoCapa'];	
	$pasta = "arquivos/";
	$nomeDaFoto = $fotoCapa["name"];

	
	echo $novoNomeDaFoto;
	$novoNomeDaFoto = uniqid();
	$extensaoFoto = strtolower(pathinfo($nomeDaFoto, PATHINFO_EXTENSION));
	$pathFoto = $pasta . $novoNomeDaFoto . "." . $extensaoFoto;

	

	if($extensaoFoto !="jpg" && $extensaoFoto !='png'){
		$pathFoto = 'semFoto';
	}

}

$fotoVerificada = move_uploaded_file($fotoCapa["tmp_name"], $pathFoto);
	 if($fotoVerificada){
		echo "<p> Arquivo enviado com sucesso! Para acessá-lo, clique aqui: <a href=\"arquivos/$novoNomeDaFoto.$extensaoFoto\">Clique aqui</a></p>";
	 }else{
		echo "Falha ao enviar o arquvo";
	 }

if($duplicataDisciplina == false){
	$disciplina = new Disciplina();
	$disciplina->setnome($nomeDisciplina);
	$disciplina->setprofessor($professorDisciplina);
	$disciplina->seteixo($eixoDisciplina);
	$disciplina->setFotoCapa($pathFoto);
	$disciplina->setCpfUsuario($cpfUsuario);
	$disciplinaDAO->inserirDisciplina($disciplina);
	$_SESSION["discCorreto"] = true;
	header("Location: inclusaoDisciplina.php?email=$emailUsuario&duplicata=nao");

}
















?>