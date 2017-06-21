<?php

    $produtoDao = new ProdutoDao($conexao);

    $id = $_GET["id"];
    
    $produto = $produtoDao->buscaPorProdutos($id);