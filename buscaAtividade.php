<?php
session_start();

$dadoPesquisa = $_POST["dadoPesquisa"];
$verificadorPesquisa = $_POST["verificaBusca"];

if(empty($dadosPesquisa)){
    $_SESSION["infoPesq"] = false;
}

$_SESSION["infoPesq"] = $dadoPesquisa;
$_SESSION["pesquisouLupa"] = $verificadorPesquisa;

echo $verificadorPesquisa;


header("Location: gerenciamentoDeAtividades.php");
		 


?>