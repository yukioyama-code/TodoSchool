<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/estiloCard.css">
    <link rel="icon" type="image/png" href="images/icons/relatorio.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estiloGerenciadorDisciplina2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="demo.js"></script>
    <script src="js/perfilUsuario.js" defer> </script>
    <script src="js/eventoBotoes.js"> </script>
    <title>Gerenciamento de Disciplinas</title>
</head>

<body>

    <?php
    $codigoDisc = " ";
    $cont = 0;
    session_start();

    include_once "funcoesToast.php";



    $dadoPesquisaRetorno = "";
    $verificaRetorno = false;

    if (isset($_SESSION["infoPesq"])) {
        if ($_SESSION["infoPesq"] == false) {
            buscaVazio();
            $_SESSION["infoPesq"] = true;
        } else {
            $dadoPesquisaRetorno = $_SESSION["infoPesq"];
        }
    }

    if (isset($_SESSION["email"])) {
        if ($_SESSION["email"] && $_SESSION["email"]) {
            $emailUsuario = $_SESSION["email"];
        }
    }

    if (isset($_SESSION['pesquisouLupa'])) {
        if ($_SESSION["pesquisouLupa"] == "verdadeiro") {
            $verificaRetorno = true;
        }
    }

    //zerar a variável de sessão ou enviar as resquisições por URL


    include_once "bancoGeral.php";
    include_once "usuarioDAO.php";
    include_once "usuario.php";
    include_once "disciplinaDAO.php";
    include_once "disciplina.php";


    $bd = new ConexaoBanco();
    $disciplinaDAO = new DisciplinaDAO($bd);
    $usuarioDAO = new UsuarioDAO($bd);

    //print_r($disciplinaDAO->listarTodasDisciplinas());



    $cpfUsuario = $usuarioDAO->retornaCPF($emailUsuario);
    $fotoPerfil = $usuarioDAO->exibirFotoPerfil($cpfUsuario);
    $nomeUsuario = $usuarioDAO->verificaNome($emailUsuario);
    $grauEnsinoUsuario = $usuarioDAO->verificaGrauEnsino($emailUsuario);

    //echo $cpfUsuario;

    $ListaDisciplinas = array();
    $ListaDisciplinas = $disciplinaDAO->listarTodasDisciplinas($cpfUsuario);

    $ListaDisciplinasBusca = array();
    $ListaDisciplinasBusca = $disciplinaDAO->listarTodasDisciplinasBusca($dadoPesquisaRetorno, $cpfUsuario);















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
        <a href="inclusaoDisciplina.php?duplicata=nao&email=<?php echo $emailUsuario ?>"> <button type="button" class="btn btn-danger btn-circle btn-lg"><i class="fa fa-plus"></i></button> </a>


        </button>


        <br>
        <br>
        <form action="buscaDisciplina.php" method="POST">
            <div class="input-group"  id="barraPesquisa" style="z-index: 0";>

                <input type="hidden" name="verificaBusca" value="verdadeiro" >
                <input type="text" class="form-control" name="dadoPesquisa" placeholder="O que você procura?" >

                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>


            </div>
        </form>

        <br>


        <?php
        
        $buscaBoolean = false;

        if ($verificaRetorno == true && empty($ListaDisciplinasBusca)) {
            listaVazia();
            if (isset($_SESSION["pesquisouLupa"])) {
                unset($_SESSION["pesquisouLupa"]);
            }
        } else {
            foreach ($ListaDisciplinasBusca as $indice => $disciplina) {
                $nomeDisciplina = $disciplina->getNome();
                $pathFoto = $disciplina->getFotoCapa();
                $codigoDisc = $disciplinaDAO->retornaCodigoDisc($nomeDisciplina, $cpfUsuario);


                echo "<div class='card' style='width: 18rem; display: inline-block'>";
                if ($pathFoto == 'semFoto') {
                    echo "<img id = 'fotoFormatada' src='images/disciplinaSemFoto.png' class='card-img-top'>";
                } else {
                    echo "<img id = 'fotoFormatada' src='$pathFoto' class='card-img-top'>";
                }
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>$nomeDisciplina </h5>";
                echo "<div class='blocoVisuDisc'>";
                echo "<a href='alterarDisciplina.php?email=$emailUsuario&nome=$nomeDisciplina&codigo=$codigoDisc'><button type='button'class='btn btn-info'><i class='fa fa-edit'></i></button></a>";
                echo "<a href='excluirDisciplina.php?nome=$nomeDisciplina&email=$emailUsuario'><button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button></a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

                $buscaBoolean = true;
            }
        }

        if ($buscaBoolean == false) {
            foreach ($ListaDisciplinas as $indice => $disciplina) {
                $nomeDisciplina = $disciplina->getNome();
                $pathFoto = $disciplina->getFotoCapa();
                $codigoDisc = $disciplinaDAO->retornaCodigoDisc($nomeDisciplina, $cpfUsuario);





                echo "<div class='card' style='width: 18rem; display: inline-block'>";
                
                if ($pathFoto == 'semFoto') {
                    echo "<img id = 'fotoFormatada' src='images/disciplinaSemFoto.png' class='card-img-top'>";
                } else {
                    echo "<img id = 'fotoFormatada' src='$pathFoto' class='card-img-top'>";
                }
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>$nomeDisciplina </h5>";
                echo "<div class='blocoVisuDisc'>";
                echo "<a href='alterarDisciplina.php?email=$emailUsuario&nome=$nomeDisciplina&codigo=$codigoDisc'><button type='button'class='btn btn-info'><i class='fa fa-edit'></i></button></a>";
                echo "<a href='excluirDisciplina.php?nome=$nomeDisciplina&email=$emailUsuario'><button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button></a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                
            }
        }




        ?>

        <br><br><br><br><br>


        <!-- Rodapé -->
        

    </div>
    </div>
    <br>

    
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