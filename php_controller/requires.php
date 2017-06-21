<?php
/**
 * Created by PhpStorm.
 * User: codex
 * Date: 09/06/17
 * Time: 11:05
 */

function carregaClasse($nomeDaClasse){

    $toLowerCase = lcfirst($nomeDaClasse);
    require_once ('../class/' . $toLowerCase . '.php');

}

spl_autoload_register("carregaClasse");

require_once ('logic-user.php');

require_once ('dbconn.php');