<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" type="image/png" href="images/icons/livros.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estiloGerenciadorDisciplina2.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/emojionarea.css">
    <script src="js/emojionarea.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet">
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="css/index.css" rel="stylesheet">
    <script src="demo.js"></script>
    <script src="js/perfilUsuario.js" defer> </script>
    <script> 
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
</script>

  <title>Alteração de Atividades</title>
</head>

<body>


  <?php
  include_once "funcoesToast.php";
  include_once "bancoGeral.php";
  include_once "usuarioDAO.php";
  include_once "usuario.php";
  include_once "disciplina.php";
  include_once "disciplinaDAO.php";
  include_once "atividadeDAO.php";
  include_once "atividade.php";



  session_start();
  $emailUsuario = $_GET["email"];
  $codigo = $_GET["codigo"];

  $bd = new ConexaoBanco();
  $usuarioDAO = new UsuarioDAO($bd);
  $disciplinaDAO = new DisciplinaDAO($bd);
  $atividadeDAO = new AtividadeDAO($bd);
  $cpfUsuario = $usuarioDAO->verificaCPF($emailUsuario);
  $nomeUsuario = $usuarioDAO->verificaNome($emailUsuario);
  $grauEnsinoUsuario = $usuarioDAO->verificaGrauEnsino($emailUsuario);
  $fotoPerfil = $usuarioDAO->exibirFotoPerfil($cpfUsuario);

  if (isset($_SESSION["discSelect"])) {
    if ($_SESSION["discSelect"] == true) {
        erroSelectDisc();
      unset($_SESSION["discSelect"]);
    }
  }

  if (isset($_SESSION["alteracaoAtividadeCorreta"])) {
    if ($_SESSION["alteracaoAtividadeCorreta"] == true) {
      alteracaoAtividadeCorreta();
      unset($_SESSION["alteracaoAtividadeCorreta"]);
    }
  }

  $ListaAtividades = array();
  $ListaAtividades = $atividadeDAO->retornaAtividades($codigo);

  //print_r ($ListaAtividades);
  
  foreach ($ListaAtividades as $indice => $atividade) {
    $nomeDisciplina = $atividade->getNomeDisciplina();
    $titulo = $atividade->getTitulo();
    $dataEntrega = $atividade->getDataEntrega();
    $importancia = $atividade->getImportancia();
    $descricao = $atividade->getDescricao();
    $codigo = $atividade->getCodigo();

  }


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

      <div id="abre">
        <div id="teste" class="container mt-4 mb-4 p-3 d-flex justify-content-center">
          <div class="card p-4">
            <div class="image d-flex flex-column justify-content-center align-items-center">
              <img src=<?php echo $fotoPerfil ?> class='img-arredondada'>
              <span class="name mt-3"><?php echo $nomeUsuario ?></span>
              <span class="idd"></span>
              <div class="d-flex flex-row justify-content-center align-items-center gap-2">
              </div>
              <div class="d-flex flex-row justify-content-center align-items-center mt-3"> <span class="follow">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i><?php echo $grauEnsinoUsuario ?></span></span> </div>
              <div class=" d-flex mt-2"> <button id="logout" class="btn1 btn-dark"><a href="logoutUsuario.php" id="textLogout">Deslogar</a></button> </div>
              <div class=" px-2 rounded mt-4 date "> <span class="join">To-do School System</span> </div>
            </div>
          </div>


        </div>
  </nav>
  <br>

  <!--Menu lateral-->
  <div class="navigation">
    <ul>
      <li class="list active">
        <a href="menu.php">
          <span class="icon">
            <ion-icon name="home-outline"></ion-icon>
          </span>
          <span class="title">Página inicial</span>
        </a>
      </li>
      <li class="list">
        <a href="gerenciadorDisciplina.php?=<?php echo $emailUsuario ?>">
          <span class="icon">
            <ion-icon name="pencil-outline"></ion-icon>
          </span>
          <span class="title">Gerenciador de Disciplinas</span>
        </a>
      </li>
      <li class="list">
        <a href="gerenciamentoDeAtividades.php">
          <span class="icon">
            <ion-icon name="book-outline"></ion-icon>
          </span>
          <span class="title">Gerenciador de Atividades</span>
        </a>
      </li>
    </ul>
  </div>

  <br><br><br>
  <div class="container">
  <form class="form-control" method="POST" action="alteracaoAtividade.php?email=<?php echo $emailUsuario ?>&codigo=<?php echo $codigo?>" enctype="multipart/form-data">
   				<legend>Alterar atividade</legend>
   				<div class="row">
				  <div class="col">
				  	<label>Titulo da Atividade *</label>
				    <input type="text" name="txtTituloAtiv" value="<?php echo $titulo?>" class="form-control" placeholder="Insira o título da atividade" aria-label="Nome da disciplina" required="*">
				  </div>
				  <div class="col">
				  	<label>Data de Entrega *</label>
            <input type="date" value="<?php echo $dataEntrega?>" name="dataEntrega" class="form-control" required = "*">
				  </div>
				</div>
				<br>

        <?php
              $ListaDisciplinas = array();
              $ListaDisciplinas = $disciplinaDAO->listarTodasDisciplinas($cpfUsuario);
              
            ?>

        <div class="col">
          <label  for="exampleFormControlSelect1">Selecione a disciplina</label>
          <select  class="form-control" name="txtNomeDisc" required >
            <option selected value = "semSelect">Selecione uma disciplina</option>
            <?php


              if(empty($ListaDisciplinas)){
                echo  "<option disabled value =''>Nenhuma disciplina cadastrada</option>";
              
              }
              foreach ($ListaDisciplinas as $indice => $disciplina) {
                $nomeDisciplina = $disciplina->getNome();
                echo  "<option value = '$nomeDisciplina'>$nomeDisciplina</option>";
              }

            ?>
           
          
          </select>
        </div>
				<div class="row">
					<div class="col-6">
            <label>Descrição da Atividade</label>
						<textarea name="descAtiv" class="form-control">
              <?php 
                echo $descricao
              ?>

            </textarea>
					</div>

          <div class="col-6">
            <label>Deseja marcar esta atividade como importante?</label>
            <br>  
            <input TYPE="hidden" value="<?php echo $importancia?>" NAME="estrelado" id="estrelado">
            <button id="btn" type="button" aria-label="like-icon" role="switch" aria-checked="false">
              <?php

                if($importancia === 'sel'){
                echo "<span id='star-icons' style = 'color: #F1C40F' class='material-icons-outlined'>star
                </span>";}
                else{
                  echo "<span id='star-icons' class='material-icons-outlined'>star_border
                  </span>";
                }
              ?>
        <script src="js/index.js"></script>
    </button>
            
     
				</div>
				<br>
				<div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
          <a href="gerenciamentoDeAtividades.php"><button type="button" class="btn btn-danger"><i class="fa fa-remove"></i></button></a>
            </div>
            </div>
				</div>
   			</form>

  <br><br><br>



  <!--Rodapé-->
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
  <script src="js/config.min.js"></script>
  <script src="js/util.min.js"></script>
  <script src="js/jquery.emojiarea.min.js"></script>
  <script src="js/emoji-picker.js"></script>
  <!-- End emoji-picker JavaScript -->




</body>
<script src="js/importacaoFoto.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>