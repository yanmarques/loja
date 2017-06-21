<?php
/**
 * Created by PhpStorm.
 * User: codex
 * Date: 09/06/17
 * Time: 09:59
 */

    class UserDao {
        
        private $conexao;

        function __construct($conexao)
        {
            $this->conexao = $conexao;
        }

        function login(User $user){

            //Criptografa senha com MD5
            $senhaMD5 = md5($user->password);
            
            $email_user = mysqli_real_escape_string($this->conexao, $user->email);

            // Busca por email e senha no banco
            $query = "Select * FROM usuarios WHERE email = '{$email_user}' AND senha = '{$senhaMD5}'";

            $resultQuery = mysqli_query($this->conexao, $query);

            $user_result = mysqli_fetch_assoc($resultQuery);
            
            return $user_result;

        }

        function cadastraUsuarios(User $user){
            $senhaMD5 = md5($user->password);

            $email = mysqli_real_escape_string($this->conexao, $user->email);
            $nome = mysqli_real_escape_string($this->conexao, $user->nome);

            $query = "INSERT INTO usuarios (nome, email, senha) VALUES ('{$nome}', '{$email}', '{$senhaMD5}')";

            $resultQuery = mysqli_query($this->conexao, $query);

            return $resultQuery;

        }
        
    }