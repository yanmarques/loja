<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once('php_controller/logic-user.php');
    require_once('php_controller/dbconn.php');

    function carregaClasse($nomeDaClasse){
        
        $toLowerCase = lcfirst($nomeDaClasse);
        require_once ('class/' . $toLowerCase . '.php');
        
    }     
    
    spl_autoload_register("carregaClasse");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Loja</title>

    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link rel="icon" type="image/png" href="http://i.imgur.com/ADhFDbp.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

    <style>

        body{
            width: 100%;
            height: 100% !important;
            background-color: #cccccc;
        }

        .navbar-inverse{
            border-radius: 0;
        }

        .navbar-collapse a{
            color: #D8D8D8 !important;
            transition: color 0.5s linear;
            font-family: 'Slabo 27px', sans-serif;
            font-size: 16px;
        }

        .navbar-collapse a:hover{
            color: #686868 !important;
            transition: 0.5s;
        }
        
        .user:hover{
            cursor: pointer;
        }



    </style>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">LOJA YAN</a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">HOME</a></li>

                    <?php if (!userIsLogged()) : ?>

                        <li>
                            <a href="login.php">LOGIN</a>
                        </li>

                        <li>
                            <a href="cadastra_user.php">CADASTRAR</a>
                        </li>

                    <?php endif ?>

                    <?php if(userIsLogged()): ?>
                        <li>
                            <a class="" id="btn-drop" href="remove.php">REMOVER PRODUTO</a>
                        </li>

                        <li>
                            <a href="cadastra_produtos.php"><span class="glyphicon glyphicon-user"></span> CADASTRAR PRODUTO</a>
                        </li>

                        <li>
                            <a class="user dropdown-toggle" type="button" data-toggle="dropdown">
                                <?= getLoggedUser() ?>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" style="text-align: center !important">
                                <li>
                                    <form class="text-center" action="php_controller/logout.php" id="logout">
                                    </form>

                                    <button class="btn btn-danger" type="submit" form="logout">Logout</button>
                                </li>

                            </ul>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>

</body>
</html>
