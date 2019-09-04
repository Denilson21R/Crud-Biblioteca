<nav class="navbar navbar-default menu">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"><?php if (isset($_SESSION["nomeLogado"])) echo strtoupper($_SESSION["nomeLogado"]) ?></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <?php 
                if($_SESSION["permissao"] == 1){ 
                  echo "<li class='visualizarAdmin'><a href='exibeAdmins'>Exibir Admins</a></li>";
                }
              ?>
              <li class='cadastrarEmprestimo'><a href='cadastraEmprestimo'>Cadastrar Empréstimo</a></li>
              <li class="visualizarEmprestimos"><a href="exibeEmprestimos">Exibir Empréstimos</a></li>
              <li class='cadastraUsuario'><a href='cadastraUsuario'>Cadastrar Usuario</a></li>
              <li class="visualizarUsuario"><a href="exibeUsuarios">Exibir Usuarios</a></li>
              <li class='cadastraLivro'><a href='cadastraLivro'>Cadastrar Livro</a></li>
              <li class="visualizarLivro"><a href="exibeLivros">Exibir Livros</a></li>
              <li class=""><a href="logout">Sair</a></li>          
            </ul>            
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>