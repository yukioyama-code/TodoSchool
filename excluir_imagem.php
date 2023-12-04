<?php
require("conecta.php");
$codigo = $_GET["codigo"];
$sqlExclusao = "DELETE FROM tabela_imagens WHERE codigo = '$codigo' ";
$queryExclusao = mysql_query($sqlExclusao)
or die("Algo deu errado ao excluir a imagem. Tente novamente.");
echo 'Imagem excluída com sucesso!';
header('Location: index.php');
?>