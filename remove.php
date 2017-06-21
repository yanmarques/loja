<?php 

	require_once('layout/header.php');

    checkUser();

	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    $removeu = isset($_SESSION["success"]);
    $altera = isset($_SESSION["success_altera"]);

    $alterado = $altera ? "style= 'display: block;pointer-events: all'" : "";
    $modal_altera_background = $altera ? "style= 'pointer-events: none;'" : "";

    $removido = $removeu ? "style= 'display: block;pointer-events: all'" : "";
    $modal_remove_background = $removeu ? "style= 'pointer-events: none;'" : "";

	
?>
	
	<style type="text/css">
		.form{
            margin: auto;
            float: none;
        }

		.form-control{
		    background-color: #303030;
		    border-style: solid;
		    border-width: 1px;
		    border-radius: 4px; 
		    border-color: #e6e6e6 !important;
		    color: #FFF !important;
		    font-family: 'Slabo 27px', sans-serif;
		    font-size: 17px;

        }

        .row{
        	margin: 25px;
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

	<div id="background" class="section" <?=$modal_remove_background?> <?=$modal_altera_background?>>

        <div class="container-fluid">

            	<div class="col-md-12 col-sm-12 col-lg-12">
            		<?php   require_once('php_controller/lista_produtos.php');
                            #require_once ('php_controller/busca_id_texto.php');

            			if (empty($produtos)) {

                            echo "<p class='text-center alert alert-danger'>Nada encontrado.</p>";

                        } else{
            		?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <th>Nome</th>
                            <th>Descricao</th>
                            <th>Categoria</th>
                            <th>Preço</th>
                            <th>ISBN</th>
                            <th>Editora</th>
                            <th>Opção</th>

                            <tbody>
                                <?php

                                    foreach ($produtos as $produto) :

                                ?>

                                <td>
                                    <?=substr($produto->getNome(), 0, 40)?>
                                </td>

                                <td>
                                    <?=substr($produto->getDescricao(), 0, 70)?>
                                </td>

                                <td>
                                    <?=$produto->getCategoriaNome()?>
                                </td>

                                <td>
                                    <?=$produto->getPreco()?>
                                </td>

                                <td>
                                    <?php if($produto->isLivro()) { echo $produto->getIsbn(); }?>
                                </td>

                                <td>
                                    <?php if($produto->isLivro()) { echo $produto->getEditora(); }?>
                                </td>

                                <td>
                                    <form style="display: inline;" action="php_controller/remove_by_id.php" method="post">

                                        <input type="hidden" value="<?=$produto->getId() ?>" name="id">
                                        <input type="submit" class="btn btn-danger" value="Remover">

                                    </form>

                                    <a href="alterar.php?id=<?=$produto->getId() ?>"
                                                            class="btn btn-info">Alterar</a>
                                </td>
                            </tbody>

                                    <?php
                                        endforeach
                                    ?>

                        </table>
                    </div>
				</div>
			</div>
					      
                    <?php } ?>
        </div>

    </div>	

    <script type="text/javascript">
        function modalRClose() {
            document.getElementById("modal_removeu").style.display = "none";
            document.getElementById("background").style.pointerEvents = "all";
        }

        function modalAClose() {
            document.getElementById("modal_altera").style.display = "none";
            document.getElementById("background").style.pointerEvents = "all";
        }

    </script>

    <div id="modal_removeu" class="modal" <?=$removido?>
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onClick="modalRClose()">&times;</button>
                    <h4 class="modal-title text-center">Atenção</h4>
            </div>
                                                                
            <div class="modal-body">
                <p class="alert-success alert text-center"><?= $_SESSION["success"] ?></p>
            </div>
        </div>
    </div>

    <div id="modal_altera" class="modal" <?=$alterado?>
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onClick="modalAClose()">&times;</button>
                    <h4 class="modal-title text-center">Atenção</h4>
            </div>
                                                                
            <div class="modal-body">
                <p class="alert-success alert text-center"><?= $_SESSION["success_altera"] ?></p>
            </div>
        </div>
    </div>

<?php
    unset($_SESSION["success_busca"]);
    unset($_SESSION["success_altera"]);
    unset($_SESSION["null"]);
    include ('layout/footer.php'); ?>