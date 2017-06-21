<?php

    require_once('requires.php');

    $userDao = new UserDao($conexao);

    $email = $_POST["email"];
    $senha = $_POST["password"];

    $user = new User($email, $senha);

    $user_login = $userDao->login($user);


    if ($user_login == null){
        $_SESSION["danger"] = "Usuario ou senha incorretos.";
        header("Location: ../login.php");
    }
    else {
        $_SESSION["success"] = "Voce esta logado.";
        authenticateUser($user_login["nome"], $user_login["email"]);
        header("Location: ../index.php");
    }

    die();
