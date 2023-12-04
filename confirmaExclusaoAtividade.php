<?php



include_once "bancoGeral.php";
include_once "usuarioDAO.php";
include_once "usuario.php";
include_once "atividade.php";
include_once "atividadeDAO.php";


$bd = new ConexaoBanco();
$usuarioDAO = new UsuarioDAO($bd);
$atividadeDAO = new AtividadeDAO($bd);

$codigo = $_GET["codigo"];

$atividadeDAO->excluirAtividade($codigo);

header("Location: gerenciamentoDeAtividades.php");






?>
