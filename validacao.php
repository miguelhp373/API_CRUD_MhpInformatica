<?php
session_start();
include_once('conexao.php');

$btnlogin = filter_input(INPUT_POST, 'btnlogin', FILTER_SANITIZE_STRING);

    if($btnlogin){
        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        //echo"$usuario - $senha";
        if((!empty($usuario)) AND (!empty($senha))){
            //Gerar senha criptografada
            //echo password_hash($senha,PASSWORD_DEFAULT);

            //pesquisar o usuario no BD
            $result_usuario = "SELECT id, usuario, senha FROM login WHERE usuario = '$usuario' Limit 1";
            $result_usuario = mysqli_query($conecction, $result_usuario);

            if($result_usuario){
                $row_usuario = mysqli_fetch_assoc($result_usuario);
                if(password_verify($senha, $row_usuario['senha'])){
                    $_SESSION['id'] = $row_usuario['id'];
                    $_SESSION['name'] = $row_usuario['nome'];
                    $_SESSION['user'] = $row_usuario['usuario'];
                    header("Location: sessao.php");
            }else{
                $_SESSION['msg'] =  'Login e Senha Incorretos';
                header("Location: login.php");
            }
        }

        }else{
            $_SESSION['msg'] =  'Login e Senha Incorretos';
            header("Location: login.php");
        }
    }else{
        $_SESSION['msg'] =  'Página Não Encontrada';
        header("Location: login.php");
    }




    