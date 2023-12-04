<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="icon" type="image/png" href="images/icons/relatorio.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estiloGerenciadorDisciplina2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" type="text/css" href="css/styleFotoPerfil.css">
  <script src="demo.js"></script>
  <script src="js/perfilUsuario.js" defer> </script>


  <!-- Links de importação seletor de emoji -->
  <!--<link rel="shortcut icon" href="favicon.png">  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="./css/emoji.css" rel="stylesheet">


  <title>Inserção de Disciplinas</title>
</head>

<body>


  <?php
  include_once "funcoesToast.php";
  include_once "bancoGeral.php";
  include_once "usuarioDAO.php";
  include_once "usuario.php";
  session_start();
  $emailUsuario = $_GET["email"];

  if ($_GET["duplicata"] == "sim") {
    duplicidadeDisciplina();
  }

  if (isset($_SESSION["discCorreto"])) {
    if ($_SESSION["discCorreto"] == true) {
      disciplinaSucesso();
      unset($_SESSION["discCorreto"]);
    }
  }

  $bd = new ConexaoBanco();
  $usuarioDAO = new UsuarioDAO($bd);
  $cpfUsuario = $usuarioDAO->verificaCPF($emailUsuario);
  $nomeUsuario = $usuarioDAO->verificaNome($emailUsuario);
  $grauEnsinoUsuario = $usuarioDAO->verificaGrauEnsino($emailUsuario);
  $fotoPerfil = $usuarioDAO->exibirFotoPerfil($cpfUsuario);





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

      
  <?php
  include_once "funcoesToast.php";
  include_once "bancoGeral.php";
  include_once "usuarioDAO.php";
  include_once "usuario.php";

  $emailUsuario = $_GET["email"];

  if ($_GET["duplicata"] == "sim") {
    duplicidadeDisciplina();
  }

  if (isset($_SESSION["discCorreto"])) {
    if ($_SESSION["discCorreto"] == true) {
      disciplinaSucesso();
      unset($_SESSION["discCorreto"]);
    }
  }

  $bd = new ConexaoBanco();
  $usuarioDAO = new UsuarioDAO($bd);
  $cpfUsuario = $usuarioDAO->verificaCPF($emailUsuario);
  $nomeUsuario = $usuarioDAO->verificaNome($emailUsuario);
  $grauEnsinoUsuario = $usuarioDAO->verificaGrauEnsino($emailUsuario);
  $fotoPerfil = $usuarioDAO->exibirFotoPerfil($cpfUsuario);





  ?>
    </div>

  </nav>
  <br>

  <!-- Menu lateral -->
  <?php
  include_once "menuLateral.php";

  ?>


  <br><br><br>
  <div class="container">
    <form class="form-control" method="POST" action="incluirDisciplina.php?email=<?php echo $emailUsuario ?>" enctype="multipart/form-data">
      <legend>Cadastrar disciplina</legend>
    
        <div class="row">
        <div class="col">
          <label>Nome da Disciplina *</label>
          <p class="lead emoji-picker-container">
            <input type="text" class="form-control" placeholder="Nome da Disciplina" name="txtNomeDisc" data-emojiable="true" aria-label="Nome da disciplina" required>
          </p>
        </div> 
          
         
          <div class="col">
            <label>Nome do Professor(a) *</label>
            <input type="text" class="form-control" name="txtProfDisc" placeholder="Nome do Professor(a)" aria-label="Last name" required>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-6">
            <label>Eixo da disciplina *</label>
            <input type="text" class="form-control" name="txtEixoDisc" placeholder="Insira o eixo da disciplina" aria-label="Last name" required>
          </div>
        </div>
        <br>
        <div class="image-upload">
          <label for="uploadImage">
            <img src="images/capaDisciplina.png" id="imgPhoto">
          </label>
          <input id="uploadImage" enctype="multipart/form-data" type="file" name="fotoCapa" onchange="PreviewImage()">
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
          <a href="gerenciadorDisciplina.php">
            <button type="button" class="btn btn-danger"><i class="fa fa-remove"></i></button>
          </a>

        </div>






      </div>


      </div>
    </form>

    <br><br><br>



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

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Begin emoji-picker JavaScript -->
<script src="./js/config.min.js"></script>
<script src="./js/util.min.js"></script>
<script src="./js/jquery.emojiarea.min.js"></script>
<script src="./js/emoji-picker.min.js"></script>
<!-- End emoji-picker JavaScript -->

<script>
  $(function() {
    // Initializes and creates emoji set from sprite sheet
    window.emojiPicker = new EmojiPicker({
      emojiable_selector: '[data-emojiable=true]',
      assetsPath: './lib/img/',
      popupButtonClasses: 'fa fa-smile-o'
    });
    // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
    // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
    // It can be called as many times as necessary; previously converted input fields will not be converted again
    window.emojiPicker.discover();
  });
</script>



</body>
<script src="js/importacaoFoto.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>