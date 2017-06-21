<?php

session_start();
    
function checkUser(){
    
    if (!userIsLogged()){
        $_SESSION["danger"] = "Voce nao tem acesso a esta pagina.";
        header("Location: login.php");
        die();
    }
    
}

function checkUserAlreadyLogged(){
    if (userIsLogged()){
        header("Location: index.php");
        die();
    }
}

function getLoggedUser(){
    return $_SESSION["user"];
}

function userIsLogged(){
    return isset($_SESSION['user']);
}

function authenticateUser($nome, $email){
    
    $_SESSION["email"] = $email;
    $_SESSION["user"] = $nome;

}

function logout(){
    session_destroy();

    session_start();
}