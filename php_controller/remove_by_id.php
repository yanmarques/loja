<?php

    require_once ('requires.php');

	checkUser();

    $produtoDao = new ProdutoDao($conexao);

	$id = $_POST["id"];

	if ($produtoDao->removeById($id)){

        $_SESSION["success"] = "Produto removido com sucesso";
        header("Location: ../remove.php");

    }
    else{

        header("Location: ../error.php");

    }

	die();
