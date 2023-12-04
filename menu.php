<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estiloCard.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/estiloMenu.css">
  <link rel="stylesheet" href="css/estiloImportante.css">
 
  
  <script src="js/modalDisciplinas.js"></script>
  <script src="js/perfilUsuario.js" defer> </script>


  <title>To-Do School</title>
</head>

<body>
  <!-- Verificação do Login-->
  <?php

  session_start();
  include_once "bancoGeral.php";
  include_once "usuarioDAO.php";
  include_once "usuario.php";
  include_once "disciplinaDAO.php";
  include_once "disciplina.php";
  include_once "atividade.php";
  include_once "atividadeDAO.php";


  if (isset($_SESSION["email"])) {
    if ($_SESSION["email"] && $_SESSION["email"]) {
      $emailUsuario = $_SESSION["email"];
    }

    $bd = new ConexaoBanco();
    $usuarioDAO = new UsuarioDAO($bd);
    $disciplinaDAO = new DisciplinaDAO($bd);
    $atividadeDAO = new AtividadeDAO($bd);
    $cpfUsuario = $usuarioDAO->verificaCPF($emailUsuario);
    $nomeUsuario = $usuarioDAO->verificaNome($emailUsuario);
    $grauEnsinoUsuario = $usuarioDAO->verificaGrauEnsino($emailUsuario);
    $fotoPerfil = $usuarioDAO->exibirFotoPerfil($cpfUsuario);

    $ListaImportantes = array();
    $ListaImportantes =  $atividadeDAO->atividadesImportantes($cpfUsuario);


    $ListaAtividades = array();
    $ListaAtividades = $atividadeDAO->listarTodasAtividades($cpfUsuario);
  }

  ?>

  <!--Cabeçalho-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!--Só para ver onde está o cabeçalho-->


    <!--Logo  no cabeçalho-->
    <div class="container-fluid">
      <a class="navbar-brand" href="menu.php"><img class="logo" src="images/logoSemFundo.png" width="100px" height="100px"></a>

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
















  </nav>



  <br>

  <?php
    include_once "menuLateral.php";
  ?>   

  <!--Início do corpo-->
  <div class="main">




    <?php


    $numeroAleatorio = rand(1, 65);

    include_once "banco.php";
    include_once "random.php";
    include_once "randomDAO.php";



    $bd = new ConexaoBancoRandom();
    $rdao = new RandomDAO($bd);

    $texto = $rdao->random($numeroAleatorio)->getTexto();
    echo "<h3 id='textoRandom'> $texto </h3>";
    echo "<br>";
    $autor = $rdao->random($numeroAleatorio)->getAutor();
    echo "<h5 id='autorRandom'> - $autor </h5>";


    ?>

  </div>
  <br>

  <div class="container">

    <?php
    $hoje = date('d/m/Y');
    $hojeFormatado = date('Y-m-d');

    echo "<p class='txtParaHoje'> ⚠️ Para hoje!  - $hoje</p>" ;
   ?>
    
  
    <?php 
      foreach ($ListaAtividades as $indice => $atividade) {
        $nomeDisciplina = $atividade->getNomeDisciplina();
        $titulo = $atividade->getTitulo();
        $dataEntrega = $atividade->getDataEntrega();
        $importancia = $atividade->getImportancia();
        $descricao = $atividade->getDescricao();
        $codigo = $atividade->getCodigo();

        if($dataEntrega == $hojeFormatado){
            echo "<a class='caixaAtividade'> ⚠️ $titulo - $nomeDisciplina</a>";
        }
      } 
      
    ?>

              

    <hr />



  </div>
    </div>
  <div class="main-container">
     
  <div class="cardes">
  
  <div class="carde card-1">
     <p class="carde__exit"><i class="fa fa-star"></i></p>
     <h2>⭐️Importante!</h2>      
      <?php
      

      foreach ($ListaImportantes as $indice => $atividade) {
        $titulo = $atividade->getTitulo();
        $nomeDisciplina = $atividade->getNomeDisciplina();
       echo "⭐️ $titulo - $nomeDisciplina";
       echo "<br>";
      }
    ?>
    </div>

    </div>
    
    </div>
  </div>
</div>




  <br>

  <!-- Blocos de disciplinas -->
  <div class="container">

  



    <?php

    $ListaDisciplinas = array();
    $ListaDisciplinas = $disciplinaDAO->listarTodasDisciplinas($cpfUsuario);


    foreach ($ListaDisciplinas as $indice => $disciplina) {
      $nomeDisciplina = $disciplina->getNome();
      $pathFoto = $disciplina->getFotoCapa();
      $professorDisciplina = $disciplina->getProfessor();
      $eixoDisciplina = $disciplina->geteixo();


      echo "<div class='card' style='width: 18rem; display: inline-block'>";
      if ($pathFoto == 'semFoto') {
        echo "<img src='images/disciplinaSemFoto.png' id='fotoFormatada' class='card-img-top'>";
      } else {
        echo "<img src='$pathFoto' id='fotoFormatada' class='card-img-top'>";
      }
      echo "<div class='card-body'>";
      echo "<button type='button' class='btn btn-outline-dark' data-toggle='modal' data-target='#example$nomeDisciplina' >";



      
      echo "<h6 class='card-title'>$nomeDisciplina </h6>";
      echo "</div>";
      echo "</div>";

      echo "<div class='modal fade' id='example$nomeDisciplina' tabindex='-1' role='dialog' aria-labelledby=exampleModalCenterTitle aria-hidden='true'>
      <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLongTitle'>$nomeDisciplina</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>
          <div class='modal-body'>
            Docente: $professorDisciplina
            <br>
            Eixo: $eixoDisciplina
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
           
          </div>
        </div>
      </div>
    </div>";
    

     

      $buscaBoolean = true;
    }


   

    ?>

<script src="js/abrirModal.js"></script>





  </div>

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  


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


<!--referencia do JS do bootstrap--->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</html>