<?php include('layout/header.php');
    require_once('php_controller/lista_produtos.php');
    require_once('php_controller/alerts.php');

    showAlert("success");
                    
    foreach ($produtos as $produto) : ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-6 col-lg-12 table text-center" style="margin: 35px 0">
                    <div class="panel-group">
                        <a href="page_produtos.php?id=<?= $produto->getId()?>">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><?= $produto->getNome()?></div>

                                <div class="panel-body">
                                    <div class="row">

                                        <div class="col-md-4 col-sm-2 col-lg-6">
                                            <img src="<?= $produto->getUrl(); ?>" class="img-responsive">
                                        </div>

                                        <div class="col-md-8 col-sm-10 col-lg-6" style="float: right;">
                                            <h4><?= $produto->getCategoriaNome() ?></h4>

                                            <ul class="nav text-justify">
                                                <li>
                                                    <?= $produto->getDescricao() ?>
                                                </li>

                                                <li>
                                                    <?php if($produto->isLivro()) { echo "Editora : {$produto->getEditora()}"; }  ?>
                                                </li>

                                                <li>
                                                    <?php if($produto->isLivro()) { echo "ISBN: {$produto->getIsbn()}"; }  ?>
                                                </li>
                                            </ul>

                                            <b style="font-size: 25px">R$<?= $produto->getPreco() ?></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endforeach

?>
<?php include('layout/footer.php')  ?>