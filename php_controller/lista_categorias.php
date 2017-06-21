<?php 
	
	checkUser();

	$categoriaDao = new CategoriaDao($conexao);

	$categorias = $categoriaDao->listaCategorias($conexao);