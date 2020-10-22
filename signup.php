<?php
session_start();
ob_start();

$btncad = filter_input(INPUT_POST, 'btnsignup', FILTER_SANITIZE_STRING);

    if($btncad){
        include_once 'conexao.php';
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($dados);

        
       $dados['senha'] = password_hash($dados['senha'],PASSWORD_DEFAULT);

       $result_user = "INSERT INTO login (nome, usuario, senha) VALUES ('".$dados['nome']."', '".$dados['usuario']."', '".$dados['senha']."')";

       $result_user = mysqli_query($conecction, $result_user);

       if(mysqli_insert_id($conecction)){
        echo $_SESSION['msgcad'] = "Cadastrado com Sucesso!";
        header("Location: index.php");
       }else{
        echo $_SESSION['msg'] = "Erro ao Cadatrar Usuario!";
       }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
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
        <li class="breadcrumb-item">Cadastro</li>
      </ol>
    </nav>
    <!--Começo do body-->
           <section>
            <div class="login-page">
           
              <div class="form">
                <form class="login-form" action="" method="post">
                  <h3>Cadastrar</h3>
                  <p class="text-center text-success" >
                  
                </p>
                  <input autofocus type="text" id="nomecomp" name="nome" placeholder="Nome Completo"/>
                  <input  type="text" id="nomelog" name="usuario" placeholder="usuário"/>
                  <input type="password" id="senhalog" name="senha" placeholder="senha"/>
                  <input id="btnlog" type="submit" name="btnsignup" value="Enviar">
                  <?php
               echo '<p class="message">Ja Tem Conta? <a href="login.php">Entrar</a></p>'
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