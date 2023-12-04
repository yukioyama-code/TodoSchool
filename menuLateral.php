<!--Menu lateral-->
<div class="navigation" style="z-index: 1">
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
        <a href="gerenciadorDisciplina.php?email=<?php echo $emailUsuario; ?>">
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