<?php
    
    require_once('requires.php');

    $userDao = new UserDao($conexao);

    $email = $_POST["email"];
    $senha = $_POST["password"];

    $user_data = new User($email, $senha);
    $user_data->nome = $_POST["nome"];

    $cadastro_user = $userDao->cadastraUsuarios($user_data);

    if (!$cadastro_user){
        $_SESSION["danger"] = "Oops. Algo deu errado, tente novamente.";
        header("Location: ../cadastra_user.php");
    }
    else{
        $_SESSION["success"] = "Voce esta logado";
        authenticateUser($_POST["nome"], $_POST["email"]);
        header("Location: ../index.php");
    }

    die();