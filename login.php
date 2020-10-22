<?php
session_start()
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="shortcut icon" href="src/logonova.jpg">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
   <!--Header Barra Da Página-->
<header>    
  <nav class="navbar navbar-expand-lg navbar navbar-light" style="background-color:#2222FF;">
      <a class="navbar-brand">
          <a href="index.html" title="Página Inicial"><img class="logobarra" src="src/logonova.jpg" width="130px" height="80px" class="d-inline-block align-top"></a>
        </a>
          <button class="navbar-toggler" type="button"  data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html" title="Página Inicial" style="color: white;">Página Inicial<span class="sr-only">(current)</span></a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" style="color: white;" href="downloads.html">Ferramentas</a>
                  <li class="nav-item">
                    <a class="nav-link" href="sobre.html" style="color: white;" title="Informações do Site">Sobre</a>
                  </li>
                </li>
            </ul>
          </div>
      </nav>
  </header>
    <!--Fim Do header-->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Página Inicial</a></li>
        <li class="breadcrumb-item">Login</li>
      </ol>
    </nav>
    <!--Começo do body-->
           <section>
            <div class="login-page">
           
              <div class="form">
                <form class="login-form" action="validacao.php" method="post">
                  <h3>Login</h3>
                  <p class="text-center text-danger" >
                  <?php
                  if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset ($_SESSION['msg']);
                  }
                  
                  ?>
                </p>
                <p class="text-center text-success">
                  <?php
                  if(isset($_SESSION['msgcad'])){
                    echo $_SESSION['msgcad'];
                    unset ($_SESSION['msgcad']);
                  }
                  ?>
                </p>
                  <input autofocus type="text" id="nomelog" name="usuario" placeholder="usuário"/>
                  <input type="password" id="senhalog" name="senha" placeholder="senha"/>
                  <input id="btnlog" type="submit" name="btnlogin" value="Entrar">
                  <?php
               echo '<p class="message">Novo Por Aqui? <a href="signup.php">Criar Uma Conta</a></p>'
                ?>
                </form>
              </div>
            </div>
            </section>
             <!--Barra Inferior-->
   <footer style="background-color:#002bff;height:76px;width:auto;text-align: center;color:white;">Desenvolvido Por &copy;<a href="https://www.facebook.com/miguelhp373" style="color: white;" title="Facebook">Miguel Henrique</a></footer>
   <!--fim barra inferior-->
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>            

            
  </body>
</html>