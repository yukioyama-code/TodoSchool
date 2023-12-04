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
    <link rel="stylesheet" type="text/css" href=" css/emojionarea.css">
    <script src="js/emojionarea.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet">
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="css/index.css" rel="stylesheet">
    <script src="js/perfilUsuario.js" defer> </script>

    <script src="demo.js"></script>
    <script> 
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
</script>
    <title>Inserção de Atividades</title>
</head>
<body>

  <?php 
       include_once "funcoesToast.php";
       include_once "bancoGeral.php";
       include_once "usuarioDAO.php";
       include_once "usuario.php";
       include_once "disciplina.php";
       include_once "disciplinaDAO.php";
       
      
       session_start();
       $emailUsuario = $_GET["email"];

       if (isset($_SESSION["discSelect"])) {
        if ($_SESSION["discSelect"] == true) {
            erroSelectDisc();
          unset($_SESSION["discSelect"]);
        }
      }

      if (isset($_SESSION["atividadeCorreta"])) {
        if ($_SESSION["atividadeCorreta"] == true) {
            atividadeSucesso();
          unset($_SESSION["atividadeCorreta"]);
        }
      }
    

       $bd = new ConexaoBanco();
        $usuarioDAO = new UsuarioDAO($bd);
        $disciplinaDAO = new DisciplinaDAO($bd);
        $cpfUsuario = $usuarioDAO->verificaCPF($emailUsuario);
        $nomeUsuario = $usuarioDAO->verificaNome($emailUsuario);
        $grauEnsinoUsuario = $usuarioDAO->verificaGrauEnsino($emailUsuario);
        $fotoPerfil = $usuarioDAO->exibirFotoPerfil($cpfUsuario);

    

   ?>
    <!--Cabeçalho-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <!--Logo  no cabeçalho-->
    <div class="container-fluid">
        <a class="navbar-brand" href="menu.php"><img  class="logo" src="images/logoSemFundo.png" width="100px" height="100px"></a>           
    </div>

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
      
    </nav>
    <br>
 
    <!--Menu lateral-->
    <?php
    include_once "menuLateral.php";

      ?>   
    <br><br><br>
    <div class="container">
    	<form class="form-control" method="POST" action="incluirAtividade.php?email=<?php echo $emailUsuario ?>" enctype="multipart/form-data">
   				<legend>Cadastrar atividade</legend>
   				<div class="row">
				  <div class="col">
				  	<label>Titulo da Atividade *</label>
				    <input type="text" name="txtTituloAtiv" class="form-control" placeholder="Insira o título da atividade" aria-label="Nome da disciplina" required="*">
				  </div>
				  <div class="col">
				  	<label>Data de Entrega *</label>
            <input type="date" name="dataEntrega" class="form-control" required = "*">
				  </div>
				</div>
				<br>

        <?php
              $ListaDisciplinas = array();
              $ListaDisciplinas = $disciplinaDAO->listarTodasDisciplinas($cpfUsuario);
              
            ?>

        <div class="col">
          <label  for="exampleFormControlSelect1">Selecione a disciplina</label>
          <select  class="form-control" name="txtNomeDisc" required>
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
						<textarea name="descAtiv" class="form-control"></textarea>
					</div>

          <div class="col-6">
            <label>Deseja marcar esta atividade como importante?</label>
            <br>  
            <input TYPE="hidden" NAME="estrelado"  id="estrelado">
            <button id="btn" type="button" aria-label="like-icon" role="switch" aria-checked="false">
    <span id="star-icons" class="material-icons-outlined">
     star_border
        </span>
        <script src="js/index.js"></script>
    </button>
            
     
				</div>
				<br>
				<div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
        <a href="gerenciamentoDeAtividades.php">
          <button type="button" class="btn btn-danger"><i class="fa fa-remove"></i></button>
          <a href="gerenciamentoDeAtividades.php">
        </a>
				</div>
   			</form>
    </div>
            </div>
    
    <br><br><br>



     <!--Rodapé-->
     <?php

              include_once "rodape.php";

     ?>

     <!--Script do menu-->
     <script>
      const list = document.querySelectorAll('.list');
      function activeLink(){
        list.forEach((item)=>
        item.classList.remove('active'));
        this.classList.add('active');
      }
        list.forEach((item)=>
        item.addEventListener('click', activeLink));
    </script>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>