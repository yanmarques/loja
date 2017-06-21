<?php include('layout/header.php');
    require_once('php_controller/alerts.php');

    checkUserAlreadyLogged();
?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-sm-12 col-lg-9 text-center" style="margin: auto;float: none">

                <h2>
                    Cadastrar
                </h2>

                <?php showAlert("danger") ?>

                <form action="php_controller/cadastrar-user.php" method="post">
                    
                    <div class="form-group">
                        
                        <input class="form-control autofocus" type="text" name="nome" placeholder="Nome"><br />

                        <input class="form-control" type="email" name="email" placeholder="Email"><br />

                        <input class="form-control" type="password" name="password" placeholder="Senha"><br />

                        <input class="btn btn-primary" type="submit" value="Cadastrar">

                    </div>
                    
                </form>
            </div> 
        </div>
    </div>
    

<?php include('layout/footer.php') ?>
