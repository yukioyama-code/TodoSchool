<?php

echo "<div class='modal fade' id='ExemploModalCentralizado' tabindex='-1' role='dialog' aria-labelledby=exampleModalCenterTitle aria-hidden='true'>
      <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>";
           if ($fotoPerfil == "") {
        echo "<img src='images/iconeSemFoto.jpg'   class='img-arredondada'> " ;
        } else {

        echo "<img src='$fotoPerfil'   class='img-arredondada'> ";
        }
            echo "<h5 class='modal-title' id='exampleModalLongTitle'>$nomeUsuario</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>
        
          <div class='modal-body'>
          
							<h6 style='text-align: center'> $grauEnsinoUsuario <i class='fa fa-graduation-cap' aria-hidden='true'></i></h6>
					
          
          <br>
          <h6 style='text-align: center'> To-do School </h6> 
          
          ";


        echo "              
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
            <a href='logoutUsuario.php'><button class='btn btn-secondary'>Deslogar</button></a>
           
          </div>
        </div>
      </div>
    </div>";

?>













