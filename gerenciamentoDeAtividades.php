<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/png" href="images/icons/livros.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estiloGerenciadorDisciplina2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="demo.js"></script>
    <script src="js/perfilUsuario.js" defer> </script>
    <script src="js/eventoBotoes.js"> </script>
    <title>Gerenciamento de Atividades</title>
</head>

<body>

    <?php
    $cont = 0;
    session_start();

    include_once "funcoesToast.php";

   

    if (isset($_SESSION["email"])) {
        if ($_SESSION["email"] && $_SESSION["email"]) {
            $emailUsuario = $_SESSION["email"];
        }
    }

    $dadoPesquisaRetorno = "";
    $verificaRetorno = false;

    if (isset($_SESSION["infoPesq"])) {
        if ($_SESSION["infoPesq"] == false) {
            buscaVazio();
            $_SESSION["infoPesq"] = true;
            unset($_SESSION['infoPesq']);
        } else {
            $dadoPesquisaRetorno = $_SESSION["infoPesq"];
        }
    }

    if (isset($_SESSION['pesquisouLupa'])) {
        if ($_SESSION["pesquisouLupa"] == "verdadeiro") {
            $verificaRetorno = true;
            unset($_SESSION['pesquisouLupa']);
        }
    }



   

    //zerar a variável de sessão ou enviar as resquisições por URL


    include_once "bancoGeral.php";
    include_once "usuarioDAO.php";
    include_once "usuario.php";
    include_once "atividadeDAO.php";
    include_once "atividade.php";


    $bd = new ConexaoBanco();
    $atividadeDAO = new AtividadeDAO($bd);
    $usuarioDAO = new UsuarioDAO($bd);

    //print_r($atividadeDAO->listarTodasatividades());



    $cpfUsuario = $usuarioDAO->retornaCPF($emailUsuario);
    $fotoPerfil = $usuarioDAO->exibirFotoPerfil($cpfUsuario);
    $nomeUsuario = $usuarioDAO->verificaNome($emailUsuario);
    $grauEnsinoUsuario = $usuarioDAO->verificaGrauEnsino($emailUsuario);

    //echo $cpfUsuario;

    $ListaAtividades = array();
    $ListaAtividades = $atividadeDAO->listarTodasAtividades($cpfUsuario);


    $ListaAtividadesBusca = array();
    $ListaAtividadesBusca = $atividadeDAO->listarTodasAtividadesBusca($dadoPesquisaRetorno, $cpfUsuario);

    //print_r($ListaAtividades);












    ?>
    <!--Cabeçalho-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!--Só para ver onde está o cabeçalho-->
        <!--Logo  no cabeçalho-->
        <div class="container-fluid">
            <a class="navbar-brand" href="menu.php"><img class="logo" src="images/logoSemFundo.png" width="100px" height="100px"></a>

            <!--Botão de logout-->

            <?php
             if ($fotoPerfil == "") {
        
                echo "<button style = 'background-color: Transparent;  border-radius: 50px; border: Transparent' 'type='button' data-toggle='modal' data-target='#ExemploModalCentralizado'>
                <img src='images/iconeSemFoto.jpg' class='img-arredondada'>
        </button>";
        
                
              } else {
        
                echo "<button type='button' style = 'background-color: Transparent; border-radius: 50px' data-toggle='modal' data-target='#ExemploModalCentralizado'><img src='$fotoPerfil'class='img-arredondada'>  
        </button>";
              }

            include_once "abaUsuario.php";

            ?>            





                </div>
    </nav>
    <br>
   
   <?php
    include_once "menuLateral.php";
    ?>

   
    <!-- Barra de pesquisa -->
    <br>



    <div class="container">

   
        <a href="InclusaoAtividade.php?email=<?php echo $emailUsuario ?>"> <button type="button" class="btn btn-danger btn-circle btn-lg"><i class="fa fa-plus"></i></button> </a>

        
        </button>

        <br><br>
        <form action="buscaAtividade.php" method="POST">
        <div class="input-group"  id="barraPesquisa" style="z-index: 0";>

                <input type="hidden" name="verificaBusca" value="verdadeiro" >
                <input type="text" class="form-control" name="dadoPesquisa" placeholder="O que você procura?">

                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>


            </div>
        </form>
            
       

        <table class="table table-striped">
           

        <br>
          

            
       
  <thead>
    <tr>
      <th scope="col">Titulo</th>
      <th scope="col">Disciplina</th>
      <th scope="col">Descrição</th>
      <th scope="col">Data de Entrega</th>
      <th scope="col">Ações</th>

    </tr>
  </thead>
  <tbody>

            <?php

            $buscaBoolean = false;

            if($verificaRetorno  == true && empty($ListaAtividadesBusca)){
                //print_r ($ListaAtividadesBusca);
                listaVazia();
                if(isset($_SESSION["pesquisouLupa"])){
                    unset($_SESSION["pesquisouLupa"]);
                }
            } else{
                foreach ($ListaAtividadesBusca as $indice => $atividade){
                    $nomeDisciplina = $atividade->getNomeDisciplina();
                    $titulo = $atividade->getTitulo();
                    $dataEntrega = $atividade->getDataEntrega();
                    $descricao = $atividade->getDescricao();
                    $codigo = $atividade->getCodigo();


                    echo "<tr>";
                    echo "<td>$titulo</td>";
                    echo "<td>$nomeDisciplina</td>";
                    echo "<td>$descricao</td>";
                    echo "<td>$dataEntrega</td>";
                    echo "<td><a href='alterarAtividade.php?email=$emailUsuario&codigo=$codigo'><button type='button'class='btn btn-info'><i class='fa fa-edit'></i></button></a>";
                    echo "<a href='excluirAtividade.php?codigo=$codigo&email=$emailUsuario'><button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button></a></td>";
                    echo "</tr>";
                    

                    $buscaBoolean = true;
                }
            }

            if($buscaBoolean == false){
                foreach ($ListaAtividades as $indice => $atividade) {
                    $nomeDisciplina = $atividade->getNomeDisciplina();
                    $titulo = $atividade->getTitulo();
                    $dataEntrega = $atividade->getDataEntrega();
                    $importancia = $atividade->getImportancia();
                    $descricao = $atividade->getDescricao();
                    $codigo = $atividade->getCodigo();

                    echo "<tr>";
                    echo "<td>$titulo</td>";
                    echo "<td>$nomeDisciplina</td>";
                    echo "<td>$descricao</td>";
                    echo "<td>$dataEntrega</td>";
                    echo "<td><a href='alterarAtividade.php?email=$emailUsuario&codigo=$codigo'><button type='button'class='btn btn-info'><i class='fa fa-edit'></i></button></a>";
                    echo "<a href='excluirAtividade.php?codigo=$codigo&email=$emailUsuario'><button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button></a></td>";
                    echo "</tr>";
                    echo "<br>";
                    }
            }
             
            
            ?>

    
  </tbody>
       
</table> 

<a href="gerenciamentoDeAtividades.php"><button type='button' class='btn btn-danger'><i class='fa fa-backward'></i></button</><a>


<br>


       


    </div>
    <br>

        <!-- Rodapé -->
        <?php
        include_once "rodape.php";

        ?>




   

    <!--Script do menu-->
    <script>
        const list = document.querySelectorAll('.list');

        function activeLink() {
            list.forEach((item) =>
                item.classList.remove('active'));
            this.classList.add('active');
        }
        list.forEach((item) =>
            item.addEventListener('click', activeLink));
    </script>

</body>

<script>

</script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</html>