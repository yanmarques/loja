<?php 

    include('layout/header.php');
    require_once('php_controller/busca_produtos.php');

    checkUser();

    $altera = isset($_SESSION["danger"]);

    $alterado_falha = $altera ? "style= 'display: block;pointer-events: all'" : "";
    $modal_altera_background = $altera ? "style= 'pointer-events: none;'" : "";

 ?>

    <style>

        .form{
            margin: auto;
            float: none;
        }

        h2{
            text-align: center;
            font-size: 28px;
            text-transform: uppercase;
            font-family: 'Slabo 27px', sans-serif;
            color: #303030;
        }

        .form-control{
            border-style: solid;
            border-width: 1px;
            border-color: #e6e6e6 !important;
            font-family: 'Slabo 27px', sans-serif;
            font-size: 17px;

        }

        .section{
            position: relative;
            margin-bottom: 50px;
            padding-bottom: 50px;
        }

        .modal{
            display: none;
            width: 300px;
            height: 300px;
            position: absolute;
            left: 50%;
            top: 50%; 
            margin-left: -150px;
            margin-top: -150px;
            z-index: 1000;
        }

    </style>

    <div class="section" id="background" <?=$modal_altera_background?>>

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-7 form">
                
                    <h2>Alterar</h2>

                    <form action="php_controller/altera_produto.php" method="post"> 
                        
                        <?php include('produto-formulario-base.php') ?>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <script type="text/javascript">
        function modalAClose() {
            document.getElementById("modal_altera").style.display = "none";
            document.getElementById("background").style.pointerEvents = "all";
        }

    </script>

    <div id="modal_altera" class="modal" <?=$alterado_falha?>
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onClick="modalAClose()">&times;</button>
                    <h4 class="modal-title text-center">Ooops...</h4>
            </div>
                                                                
            <div class="modal-body">
                <p class="alert-danger alert text-center"><?= $_SESSION["danger"] ?></p>
            </div>
        </div>
    </div>

<?php

    unset($_SESSION["danger"]);
    include('layout/footer.php'); ?>