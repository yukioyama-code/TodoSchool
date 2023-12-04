<?php

    include_once "bancoGeral.php";
    include_once "usuarioDAO.php";
    include_once "usuario.php";
    include_once "disciplina.php";
    include_once "disciplinaDAO.php";

    
    $bd = new ConexaoBanco();
    $usuarioDAO = new UsuarioDAO($bd);
    $disciplinaDAO = new DisciplinaDAO($bd);

    $nomeDisciplina = $_GET["nome"];
    $emailUsuario = $_GET["email"];

    $cpfUsuario = $usuarioDAO->retornaCPF($emailUsuario);

    $disciplinaDAO->excluirDisciplina($nomeDisciplina, $cpfUsuario);

    header("Location: gerenciadorDisciplina.php");

    
    



?>