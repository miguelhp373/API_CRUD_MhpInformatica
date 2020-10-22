<?php
session_start();

include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_del = ("DELETE FROM services WHERE id = $id");
$resultado_del = mysqli_query($conecction, $result_del);

if(mysqli_affected_rows($conecction)){
    $_SESSION['msg'] = "Alterado com Sucesso!" ;
    header("Location: sessao.php");

}else{
    $_SESSION['msg'] = "ERRO Não foi Possivel Apagar, Verifique e Tente Novamente!" ;
    header("Location: sessao.php"); 
}

?>