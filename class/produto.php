<?php

    abstract class Produto {

        private $id;
        private $nome;
        private $preco;
        private $descricao;
        private $categoria;
        private $url;
        
        /**
         * @return mixed
         */
        public function getUrl()
        {
            return $this->url;
        }

        /**
         * @param mixed $url
         */
        public function setUrl($url)
        {
            $this->url = $url;
        }


        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getNome()
        {
            return $this->nome;
        }

        /**
         * @param mixed $nome
         */
        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        /**
         * @return mixed
         */
        public function getPreco()
        {
            return $this->preco;
        }

        /**
         * @param mixed $preco
         */
        public function setPreco($preco)
        {
            $this->preco = $preco;
        }

        /**
         * @return mixed
         */
        public function getDescricao()
        {
            return $this->descricao;
        }

        /**
         * @param mixed $descricao
         */
        public function setDescricao($descricao)
        {
            $this->descricao = $descricao;
        }

        /**
         * @return Categoria
         */
        public function getCategoriaNome()
        {
            return $this->categoria->categoria;
        }

        public function getCategoriaId()
        {
            return $this->categoria->id;
        }

        /**
         * @param Categoria $categoria
         */
        public function setCategoriaNome($categoria)
        {
            $this->categoria->categoria = $categoria;
        }
        
        public function setCategoriaId($categoria)
        {
            $this->categoria->id = $categoria;
        }


        function __construct($nome, $preco, $descricao, Categoria $categoria){
            
            $this->nome      = $nome;
            $this->preco     = $preco;
            $this->descricao = $descricao;
            $this->categoria = $categoria;
            
        }

        function tipoDoProduto($url){
            
            switch ($url) {
                case 1 :
                    $this->url = "http://i.imgur.com/JDRwwZA.png";
                    break;

                case 2 :
                    $this->url = "https://images8.kabum.com.br/produtos/fotos/78978/78978_index_g.jpg";
                    break;

                case 3 :
                    $this->url = "https://images7.kabum.com.br/produtos/fotos/89727/89727_index_g.jpg";
                    break;

                case $url > 3 :
                    $this->url = "http://comps.gograph.com/open-book_gg57044633.jpg";
                    break;
                
            }
            
        }

        abstract function checkCategoriaLivro($params);

        function impostoDoProduto(){

            return $this->preco = $this->preco * 0.1;
        }
        
    }
