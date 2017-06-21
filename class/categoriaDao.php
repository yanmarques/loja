<?php
/**
 * Created by PhpStorm.
 * User: codex
 * Date: 09/06/17
 * Time: 09:52
 */

    class CategoriaDao{
        
        private $conexao;
        
        function __construct($conexao)
        {
            $this->conexao = $conexao;
        }

        function listaCategorias(){

            $array = array();

            $query = "select * from categorias";

            $result = mysqli_query($this->conexao, $query);

            if ($result === FALSE){
                header("Location: ../cadastra_produtos.php?fatal_error");
                die();
            }

            while ($row = mysqli_fetch_assoc($result)) {

                $categorias = new Categoria();

                $categorias->id = $row["id"];
                $categorias->categoria = $row["nome"];

                array_push($array, $categorias);
            }

            return $array;

        }
        
        function listaCategoriaId($id){
            
            $query = "select nome from categorias where id = {$id}";
            
            $result = mysqli_query($this->conexao, $query);
            
            $row = mysqli_fetch_assoc($result);

            $categoria = new Categoria();
            $categoria->categoria  = $row["nome"];
            
            return $categoria->categoria;
        }
        
    }