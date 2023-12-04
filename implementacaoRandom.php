<?php

$numeroAleatorio = rand(1, 65);

$bd = new ConexaoBanco();
$rdao = new RandomDAO($bd);

$texto = $rdao->random($numeroAleatorio)->getTexto();
$autor = $rdao->random($numeroAleatorio)->getAutor();


      	echo $texto;
      	echo $autor;


?>