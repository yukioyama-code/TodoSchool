<?php
session_start();

include_once "bancoGeral.php";
include_once "usuarioDAO.php";
include_once "usuario.php";
include_once "atividade.php";
include_once "atividadeDAO.php";
include_once "disciplina.php";
include_once "disciplinaDAO.php";


   
$bd = new ConexaoBanco();
$usuarioDAO = new UsuarioDAO($bd);
$atividadeDAO = new AtividadeDAO($bd);
$disciplinaDAO = new DisciplinaDAO($bd);
$emailUsuario = $_GET["email"];
$tituloAtividade = $_POST["txtTituloAtiv"];
$dataEntregaAtividade = $_POST["dataEntrega"];
$descricaoAtividade = $_POST["descAtiv"];
$importante = $_POST["estrelado"];
$nomeDisciplina = $_POST["txtNomeDisc"];

$cpfUsuario = $usuarioDAO->retornaCPF($emailUsuario);

if($nomeDisciplina == "semSelect"){
   $_SESSION["discSelect"] = true;
   header("Location: inclusaoAtividade.php?email=$emailUsuario");

} else{
    $atividade = new Atividade();
    $atividade->setDataEntrega($dataEntregaAtividade);
    $atividade->setImportancia($importante);
    $atividade->setTitulo($tituloAtividade);
    $atividade->setDescricao($descricaoAtividade);
    $atividade->setCpfUsuario($cpfUsuario);
    $atividade->setNomeDisciplina($nomeDisciplina);
    //echo $atividade->getImportancia();

    $atividadeDAO->inserirAtividade($atividade);
    $_SESSION["atividadeCorreta"] = true;
    header("Location: inclusaoAtividade.php?email=$emailUsuario");

}







?>