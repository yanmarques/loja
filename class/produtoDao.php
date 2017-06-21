<?php
/**
 * Created by PhpStorm.
 * User: codex
 * Date: 09/06/17
 * Time: 09:26
 */
    class ProdutoDao {

        private $conexao;

        function __construct($conexao) {
            $this->conexao = $conexao;
        }

        function buscaPorProdutos($id){

            $produto = "";

            $arrayHardware = array("Processador", "Placa mae", "Placa de video");
            $arrayLivros = array("Ebook", "Livro Fisico");

            $query = "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id
					   where p.id = {$id}";

            $result = mysqli_query($this->conexao, $query);

            $row = mysqli_fetch_assoc($result);

            $categoria = new Categoria();
            $categoria->categoria 	   = 	$row["categoria_nome"];
            $categoria->id 	   	       = 	$row["categoria_id"];

            $produtoFactory = new ProdutoFactory();

            if (in_array($categoria->categoria, $arrayHardware)) {

                $produto = $produtoFactory->criaPor("Hardware", $row);
            }
            else if (in_array($categoria->categoria, $arrayLivros)){

                $produto = $produtoFactory->criaPor("Livros", $row);
            }

            $produto->checkCategoriaLivro($row);

            $produto->setId($row["id"]);

            $produto->setCategoriaNome($categoria->categoria);

            $produto->setCategoriaId($categoria->id);

            $produto->tipoDoProduto($categoria->id);

            return $produto;
        }

        function listProdutos(){

            $array = [];

            $arrayHardware = array("Processador", "Placa mae", "Placa de video");
            $arrayLivros = array("Ebook", "Livro Fisico");

            $query = "select p.*, c.nome as categoria_nome from produtos as p, categorias as c where p.categoria_id = c.id order BY p.id desc";

            $result = mysqli_query($this->conexao, $query);

            while($row = mysqli_fetch_assoc($result)) {

                $categoria = new Categoria();
                $categoria->categoria 	   =    $row["categoria_nome"];
                $categoria->id             =    $row["categoria_id"];

                $produtoFactory = new ProdutoFactory();

                $produto = "";

                if (in_array($categoria->categoria, $arrayHardware)) {

                    $produto = $produtoFactory->criaPor("Hardware", $row);

                    $produto->tipoDoProduto($categoria->id);
                }
                else if (in_array($categoria->categoria, $arrayLivros)){

                    $produto = $produtoFactory->criaPor("Livros", $row);
                    
                }
                
                $produto->checkCategoriaLivro($row);
                
                $produto->setId($row["id"]);

                $produto->setCategoriaNome($categoria->categoria);

                $produto->tipoDoProduto($row["categoria_id"]);

                array_push($array, $produto);

            }

            return $array;
        }

        function removeById($id){

            $query = "delete from produtos where id = {$id}";

            if(mysqli_query($this->conexao, $query) === false){

                return false;

            }

            return true;

        }

        function insertProduct(Produto $produto){

            $isbn = "";
            $editora = "";
            if ($produto->checkCategoriaLivro($_POST)){
                $isbn = $produto->getIsbn();
                $editora = $produto->getEditora();
            }

            $query =    "insert into produtos (nome, preco, descricao, categoria_id, isbn, editora) VALUES ('{$produto->getNome()}', 
    			{$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoriaId()}, '{$isbn}', '{$editora}')";
            
            return mysqli_query($this->conexao, $query);
        }

        function alteraProduct(Produto $produto){

            $isbn = "";
            $editora = "";
            if ($produto->checkCategoriaLivro($_POST)) {
                $isbn = $produto->getIsbn();
                $editora = $produto->getEditora();
            }

            $query =  "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', 
    				categoria_id = {$produto->getCategoriaId()}, isbn = '{$isbn}', editora = '{$editora}' where id = {$produto->getId()}";

            return mysqli_query($this->conexao, $query);
        }

    }