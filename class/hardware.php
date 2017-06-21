<?php
/**
 * Created by PhpStorm.
 * User: codex
 * Date: 12/06/17
 * Time: 09:22
 */

class Hardware extends Produto{
    
    const taxa_importacao = 0.1;

    public function getPrecoComTaxa()
    {
        return $this->getPreco() * $this::taxa_importacao + $this->getPreco();
    }

    public function getTaxa()
    {
        return $this->getPreco() * $this::taxa_importacao;
    }

    function isLivro(){
        return $this instanceof Livros;
    }

    public function checkCategoriaLivro($params){
        if(!$this->isLivro()) {
            $this->getPrecoComTaxa();
            return false;
        }
    }
    
    
}