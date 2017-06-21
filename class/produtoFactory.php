<?php
/**
 * Created by PhpStorm.
 * User: codex
 * Date: 12/06/17
 * Time: 11:18
 */

    class ProdutoFactory {

        private $classes = array("Livros", "Hardware");

        public function criaPor($tipoProduto, $params)
        {

            $nome = $params['nome'];
            $descricao = $params['descricao'];
            $preco = $params['preco'];
            $categoria = new Categoria();

            if (in_array($tipoProduto, $this->classes)) {

                return new $tipoProduto($nome, $preco, $descricao, $categoria);
            }

            return new Hardware($nome, $preco, $descricao, $categoria);

        }
        
    }