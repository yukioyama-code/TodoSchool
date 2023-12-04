<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastro | To-do School</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<!--Links com CSS, bootstrap, ícones, máscaras -->
	<script type="text/javascript" src="js/mascaraCPF.js"></script>
	<script type="text/javascript" src="js/mascaraTelefone.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/styleFotoPerfil.css">
	



</head>
<body>

	  <?php
    session_start();
    include_once "funcoesToast.php";

    if (isset($_SESSION["username"])) {
       if($_SESSION["username"] && !$_SESSION["toast"]){
       	 cadastroSucesso();
			$_SESSION["toast"] = true;
			echo '<script type="text/javascript">',
			"setTimeout(function() {
				window.location.href = 'index.php';
			}, 5000);",
		
			  '</script>';
		
       	
       	 


       }

       if(!$_SESSION["username"] && !$_SESSION["toastErro"]){
       	duplicidadeUsuario();
       	$_SESSION["toastErro"] = true;

       	}

    }
    ?>
	
	

		<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/logoSemFundo.png" alt="IMG">
				</div>
				<!-- Input do arquivo de imagem-->
				<form class="login100-form validate-form" action="autenticaCadastroUsuario.php" method="POST"  enctype="multipart/form-data">
					<span class="login100-form-title ">
						Cadastra-se
					</span>

					<div class="image-upload">
			        <label for="uploadImage">
			            <img src="images/usuarioPerfil.png" id="imgPhoto">
			        </label>  
			        <input id="uploadImage" enctype="multipart/form-data" type="file" name="foto" onchange="PreviewImage()">
					</div>
					<br>
			

					

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nome" placeholder="Nome">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" id="cpf" name="cpf" placeholder="CPF" maxlength="14" onkeyup="mascara_cpf()">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-address-card" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="E-mail">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="senha" placeholder="Senha">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" id="telefone" name="telefone" placeholder="Telefone" maxlength="14" onkeyup="mascara_telefone(this)">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" >
						<select class="input100" id="grauEnsino" name="grauEnsino" placeholder="Grau de Ensino" maxlength="14" > 
							<option value="Ensino Fundamental">Ensino Fundamental</option>
							<option value="Ensino Médio">Ensino Médio</option>
							<option value="Graduação">Graduação</option>
							<option value="Pós-graduação">Pós-graduação</option>
						</select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-graduation-cap" aria-hidden="true"></i>
						</span>
					</div>

					

					
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Cadastrar
						</button>
					</div>



					<div class="text-center p-t-12">
						<span class="txt1">
							Esqueceu
						</span>
						<a class="txt2" href="#">
							E-mail / Senha?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="cadastroUsuario.php">
							Crie sua conta 
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="js/importacaoFoto.js"></script>

</body>
</html>