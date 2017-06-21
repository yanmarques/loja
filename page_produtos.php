<?php include('layout/header.php');
        require_once('php_controller/alerts.php');
        require_once('php_controller/busca_produtos.php');

?> 

    <style type="text/css">
        
        h2, h1, li{ 
            font-family: 'Slabo 27px', sans-serif;
        }

        li p{
            font-size: 20px;
            letter-spacing: 1px
        }

        .form-control{
            height: auto !important;
            margin-bottom: 40px;
        }

        .compras{
            margin-top: 5%;
        }

    </style>
    <div class="container">
        <div class="row">
            
            <?php 
                showAlert("success");
                showAlert("danger");
            ?>
            
            <div class="jumbotron">
                <h1 class="text-center"><?= $produto->getCategoriaNome() ?></h1>
                <p class="alert alert-info"><?=$produto->getNome()?></p>
            </div>  
        </div>
        
        <div class="row" style="margin: 25px 0; padding: 20px 0">
            <div class="col-md-10 col-sm-12 col-lg-8">
                <img src="<?= $produto->getUrl() ?>" class="img-responsive img-circle"
                        style="margin: auto; background-color: #fff">
            </div>

            <div class="col-md-2 col-sm-12 col-lg-4 compras">   
                <div class="panel panel-pimary">    
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12" style="margin: auto;">
                                <ul class="nav">
                                    <li>
                                        <form action="php_controller/envia_email.php" method="post">
                                            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
                                            <input class="btn btn-sm btn-success form-control" style="font-size: 25px" type="submit" value="Comprar">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <form action="php_controller/" method="post">

                                    <div class="valor text-center" class="img-rounded" style="font-size: 35px;margin: auto !important;">

                                        <span style="font-size: 15px">a vista</span>
                                        <span>R$ <?= $produto->getPreco()?></span>

                                        <?php if(!$produto->isLivro()) :

                                             $precoComTaxa = number_format((float)$produto->getTaxa(), 2, '.', '');
                                            echo "<br/><span style='font-size: 15px'> + taxa de importacao de R$ {$precoComTaxa}</span>";
                                          endif  ?>

                                    </div>

                                    <div class="valor" class="img-rounded" style="margin: auto !important;">

                                        <span>A prazo</span> <br />
                                        <select class="form-control" id="sel1" name="categoria_id">

                                            <?php for ($i = 1; $i < 7; $i++) : ?>
                                                <option value="<?= $i ?>"><?= $i ?> vez</option>
                                            <?php endfor ?>

                                        </select>

                                    </div>

                                </form>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <div class="row" style="background-color: #fff;margin: 25px 0; padding: 20px 0;">
            <div class="col-md-12 col-sm-12 col-lg-12" style="padding: 20px;">
                <h2 class="text-center" style="margin: 15px">Descrição do produto</h2>

                <ul class="nav text-justify">
                    <li>
                        <p class="text-justify"><?= $produto->getDescricao() ?></p>
                    </li>

                    <li>
                        <p class="text-justify"><?php if($produto->isLivro()) { echo "Editora : {$produto->getEditora()}"; }  ?></p>
                    </li>

                    <li>
                        <p class="text-justify"><?php if($produto->isLivro()) { echo "ISBN: {$produto->getIsbn()}"; }  ?></p>
                    </li>
                </ul>

            </div>
        </div>
    </div>

<?php include('layout/footer.php');  ?>