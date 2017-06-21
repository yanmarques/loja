<?php
    require_once ('requires.php');

	checkUser();

	$factory = new ProdutoFactory();

	$categoriaDao = new CategoriaDao($conexao);

	$cat = $categoriaDao->listaCategoriaId($_POST["categoria_id"]);

	$factory = new ProdutoFactory();

	$arrayHardware = array("Processador", "Placa mae", "Placa de video");
	$arrayLivros = array("Ebook", "Livro Fisico");

	$altera_produto = "";

	if (in_array($cat, $arrayHardware)) {

		$altera_produto = $factory->criaPor("Hardware", $_POST);

	}
	else if (in_array($cat, $arrayLivros)){

		$altera_produto = $factory->criaPor("Livros", $_POST);

		$altera_produto->setIsbn($_POST["isbn"]);

		$altera_produto->setEditora($_POST["editora"]);
	}

	$altera_produto->setCategoriaId($_POST["categoria_id"]);

	$altera_produto->setId($_POST["id"]);

	$produtoDao = new ProdutoDao($conexao);

	if($produtoDao->alteraProduct($altera_produto)){
		$_SESSION["success_altera"] = "Produto alterado com sucesso";
		header("Location: ../remove.php");
	}
	else{
		$_SESSION["danger"] = "Algo deu errado. Tente novamente.";
		header("Location: ../alterar.php?id={$id}");
	}

	die();

	