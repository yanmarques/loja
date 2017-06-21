<?php include('layout/header.php');

    checkUser();

    $array = ["nome" => "", "preco" => "", "descricao" => ""];
    $cat = new Categoria();
    $cat->id = 1;
    $produto = new Livros($array->nome, $array->preco, $array->descricao, $cat);
 
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    $cadastro_falhou = array_key_exists("cadastra_falhou", $_GET);
    $cadastro_passou = array_key_exists("cadastra_passou", $_GET);

    $modal_falhou = $cadastro_falhou ? "style= 'display: block; pointer-events: all'" : "";
    $modal_falhou_background = $cadastro_falhou ? "style= 'pointer-events: none;'" : "";

    $modal_passou = $cadastro_passou ? "style= 'display: block;pointer-events: all'" : "";
    $modal_passou_background = $cadastro_passou ? "style= 'pointer-events: none;'" : "";
                        
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

    <div id="background" class="section" <?=$modal_falhou_background?> <?=$modal_passou_background?>>

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-7 form">

                    <h2>Cadastrar</h2>

                    <form action="php_controller/cadastra-produtos.php" method="post"> 
                        <?php include('produto-formulario-base.php') ?>
                    </form>

                </div>

            </div>

        </div>

    </div>

    <script type="text/javascript">
        function modalFClose() {
            document.getElementById("modal_falhou").style.display = "none";
            document.getElementById("background").style.pointerEvents = "all";
        }

        function modalPClose() {
            document.getElementById("modal_passou").style.display = "none";
            document.getElementById("background").style.pointerEvents = "all";
        }

    </script>

    <div id="modal_falhou" class="modal" <?=$modal_falhou?>
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onClick="modalFClose()">&times;</button>
                    <h4 class="modal-title text-center">Atenção</h4>
            </div>
                                                                
            <div class="modal-body">
                <p class="alert-danger alert text-center">Algo deu errado. Por favor tente novamente.</p>
            </div>
        </div>
    </div>

    <div id="modal_passou" class="modal" <?=$modal_passou?> >
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onClick="modalPClose()">&times;</button>
                    <h4 class="modal-title text-center">Olha só...</h4>
            </div>
                                                                
            <div class="modal-body">
                <p class="text-center alert alert-success">Produto cadastrado com sucesso.</p>
            </div>
        </div>
    </div>

<?php include('layout/footer.php') ?>