<?php
session_start();

if(!empty($_SESSION["id"])){
    $_SESSION['msg'] = "";
    
}else{
    $_SESSION['msg'] = "Usuario Nao Permitido";
    header("Location: index.php");
}
?>


<?php
ob_start();

$btnnew = filter_input(INPUT_POST, 'add_os', FILTER_SANITIZE_STRING);

    if($btnnew){
        include_once 'conexao.php';
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($dados);


       $result_add = "INSERT INTO services (cliente, servico, valor, datas) VALUES ('".$dados['cliente']."', '".$dados['servico']."', '".$dados['valor']."','".$dados['datas']."')";

       $result_user = mysqli_query($conecction, $result_add);

       if(mysqli_insert_id($conecction)){
        echo $_SESSION['msgadd'] = "Adicionado com Sucesso!";
        header("Location: sessao.php");
       }else{
        echo $_SESSION['msgadd'] = "Erro ao Cadatrar Nova OS!";
       }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Nova OS</title>
    <link rel="shortcut icon" href="src/logonova.jpg">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
   <!--Header Barra Da Página-->
<header>    
  <nav class="navbar navbar-expand-lg navbar navbar-light" style="background-color:#2222FF;">
      
         
      </nav>
  </header>
    <!--Fim Do header-->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="sessao.php">Sessão</a></li>
        <li class="breadcrumb-item">Criar Nova OS</li>
      </ol>
    </nav>
    <!--Começo do body-->
           <section>
            <div class="login-page">
              <div class="form">
              <p class="text-center text-danger" >
                  <?php
                  if(isset($_SESSION['msgadd'])){
                    echo $_SESSION['msgadd'];
                    unset ($_SESSION['msgadd']);
                  }
                  
                  ?>
                </p>
                <p class="text-center text-success">
                  <?php
                  if(isset($_SESSION['msgadd'])){
                    echo $_SESSION['msgadd'];
                    unset ($_SESSION['msgadd']);
                  }
                  ?>
                  <form action="" method="post">
                <input type="text" name="cliente" placeholder="Nome Cliente:">
                <input type="text" name="servico" placeholder="Serviço:">
                <input type="text" name="valor" placeholder="Valor Cobrado:">
                <input type="date" name="datas" placeholder="Data:">
                <input type="submit" name="add_os" value="Adicionar" style="background:#343a40;color:#ffff;">
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