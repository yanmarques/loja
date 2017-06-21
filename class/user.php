<?php
/**
 * Created by PhpStorm.
 * User: codex
 * Date: 09/06/17
 * Time: 10:34
 */

    class User {

        public $id;
        public $email;
        public $password;
        public $nome;

        function __construct($email, $password)
        {
            $this->email = $email;
            $this->password = $password;
        }


    }