<?php
session_start();
unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['usuario']);


    $_SESSION['msg'] = "sessao encerrada";
    header("Location: index.php");




    