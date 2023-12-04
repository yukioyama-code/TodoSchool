<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/estiloMenuTeste.css" />
    <link rel="stylesheet" href="css/estiloMenu.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="imagens/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="imagens/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="imagens/favicon-16x16.png" />
    <link rel="manifest" href="/site.webmanifest" />
    <title>Portfólio</title>
  </head>
  <body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"><!--Só para ver onde está o cabeçalho-->
     

      <!--Logo  no cabeçalho-->
      <div class="container-fluid">
        <a class="navbar-brand" href="menu.php"><img  class="logo" src="images/logoSemFundo.png" width="100px" height="100px"></a> 

      

               
        
    </div>
    </nav>

    <div class="container">

        <div class="hamburguer">
          <div class="line" id="line1"></div>
          <div class="line" id="line2"></div>
          <div class="line" id="line3"></div>
          <span>fechar</span>
        </div>  

        <header id="home">
            <div class="img-wrapper">
                <img src="imagens/bg.jpg" alt="">
            </div>
           
        </header>

        <aside class="sidebar">
          <nav>
            <ul class="menu">
              <li class="menu-item"><a href="#" class="menu-link">Yuki Oyama</a></li>
              <li class="menu-item"><a href="#conhecimentos" class="menu-link">Conhecimento</a></li>
              <li class="menu-item"><a href="#projetos" class="menu-link">Projetos</a></li>
              <li class="menu-item"><a href="#contato" class="menu-link">Contato</a></li>
              <li class="menu-item"><a href="#orcamento" class="menu-link">Orçamento</a></li>
            </ul>
          </nav>
          <div class="social-media">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-github-alt"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
          </div>
        </aside>



       <!--Menu lateral-->
    <div class="navigation">
      <ul>
        <li class="list active">
          <a href="menu.php">
            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
            <span class="title">Página inicial</span>
          </a>
        </li>
        <li class="list">
          <a href="#">
            <span class="icon"><ion-icon name="pencil-outline"></ion-icon></span>
            <span class="title">Gerenciador de Disciplinas</span>
          </a>
        </li>
        <li class="list">
          <a href="#">
            <span class="icon"><ion-icon name="book-outline"></ion-icon></span>
            <span class="title">Gerenciador de Atividades</span>
          </a>
        </li>      
      </ul>
    </div>
       
       

        
   </body>

   <script src="js/mobile-navbar.js"></script>
</html>