<?php
    require_once ('requires.php');

    checkUser();

    $factory = new ProdutoFactory();

    $categoriaDao = new CategoriaDao($conexao);

    $cat = $categoriaDao->listaCategoriaId($_POST["categoria_id"]);

    $factory = new ProdutoFactory();

    $arrayHardware = array("Processador", "Placa mae", "Placa de video");
    $arrayLivros = array("Ebook", "Livro Fisico");

    $cadastra_produto = "";

    if (in_array($cat, $arrayHardware)) {

        $cadastra_produto = $factory->criaPor("Hardware", $_POST);
    }
    else if (in_array($cat, $arrayLivros)){
        
        $cadastra_produto = $factory->criaPor("Livros", $_POST);
        
    }
    
    $cadastra_produto->checkCategoriaLivro($_POST);

    $cadastra_produto->setCategoriaId($_POST["categoria_id"]);

    $produtoDao = new ProdutoDao($conexao);

    if($produtoDao->insertProduct($cadastra_produto)){
    	header("Location: ../cadastra_produtos.php?cadastra_passou");
    	
    }
    else{
    	header("Location: ../cadastra_produtos.php?cadastra_falhou");
    	
    }

    die();