<?php
/**
 * Created by PhpStorm.
 * User: codex
 * Date: 12/06/17
 * Time: 09:41
 */

class Livros extends Produto{
    
    private $isbn;
    private $editora;

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }



    /**
     * @return mixed
     */
    public function getEditora()
    {
        return $this->editora;
    }

    /**
     * @param mixed $editora
     */
    public function setEditora($editora)
    {
        $this->editora = $editora;
    }
    
    function isLivro(){
        return $this instanceof Livros;
    }
    
    public function checkCategoriaLivro($params){
        
        if ($this->isLivro()) {
            $this->setIsbn($params["isbn"]);
            $this->setEditora($params["editora"]);
            return true;
        }
        
    }
}