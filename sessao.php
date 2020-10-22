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
try{
    //data source name
    $dsn = "mysql:host=localhost;dbname=sistemaos";

    //php data object
    
    $conexao = new PDO($dsn, "root", ""); //conecta com com o banco de dados

$user = $conexao->prepare("SELECT * FROM login");
$user->execute();

$stmt = $conexao->prepare("SELECT * FROM services"); //seleciona a tabela no banco de dados
$stmt->execute(); //executa a query

}catch(Exception $e){
    echo $e->getMessage();
}

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Ordens de Serviço</title>
    <link rel="shortcut icon" href="src/img/logo/logonova.jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" href="styles/tabela.css">
</head>
<body>
     <!--Header Barra Da Página-->
<header>    
    <nav id="barra" class="navbar navbar-expand-lg navbar navbar-light" style="background-color:#2222FF;">
        
          
          <p style="font:18px arial,sans-serif;color:white">
                  <?php while($info_user = $user->fetchObject()):?>
                        <p style="color:white;font:17px arial, sans-serif;">Olá <span style="font:18px arial, sans-serif; color:yellow"><?=$info_user->nome?></span>, Seja Bem Vindo! </p>
                   <?php endwhile ?>
                </p>
                <p>
                   <a href="services.php"> <button type="button" id="botaonovo" class="btn btn-secondary" style="border-radius: 20px;margin-top:10px;margin-left:20px;"><svg style="width:30px;height:30px;border-radius:20px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
  <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
  <path fill-rule="evenodd" d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
</svg> Novo</button></a>
                </p>

               

                <?php
                echo'<a href="sair.php"><button type="button" id="botaosair" class="btn btn-success">
                <svg style="width:30px;height:30px;border-radius:20px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-door-open-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2v13h1V2.5a.5.5 0 0 0-.5-.5H11zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
</svg>
                Sair
              </button></a>';
                ?>
        </nav>
    </header>
      <!--Fim Do header--> 
      <h1 style="margin-left: 10px;">Lista De Ordem de Serviços(OS)</h1>
      <p style="width:220px;margin:0px auto;color:green;text-align:center;" >
          <?php
          if(isset($_SESSION['msgs'])){
            echo $_SESSION['msgs'];
            unset ($_SESSION['msgs']);
          }
          ?>
      </p>
      <br>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Cliente</th>
              <th scope="col">Serviço</th>
              <th scope="col">Valor R$</th>
              <th scope="col">Data</th>
              <th scope="col"></th>
            </tr>
          </thead>
         <tbody>
             <?php while($info_os = $stmt->fetchObject()):?>
         <tr>
      <th scope="row"><?=$info_os->id?></th>
      <td><?=$info_os->cliente ?></td>
      <td><?=$info_os->servico ?></td>
      <td><?=$info_os->valor ?></td>
      <td><?=$info_os->datas ?></td>

      <?php
      $informacao  = $info_os->id;
      ?>
      <td><a href="apagaros.php?id=<?=$info_os->id?>"><button type="button" class="btn btn-danger">Apagar</button></a></td>
    </tr>
             <?php endwhile ?>
         </tbody>
       
        </table>

        <!--Barra Inferior-->
   <footer id="barra2" style="background-color:#002bff;height:76px;text-align: center;color:white;">Desenvolvido Por &copy;<a href="https://www.facebook.com/miguelhp373" style="color: white;" title="Facebook">Miguel Henrique</a></footer>
   <!--fim barra inferior-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
</body>
</html>