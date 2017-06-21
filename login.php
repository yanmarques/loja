<?php include('layout/header.php');
    checkUserAlreadyLogged();
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-lg-5 text-center" style="margin: auto;float: none">

                <h2>
                    Login
                </h2>

                <?php
                        require_once('php_controller/alerts.php');

                        showAlert("danger");
                        showAlert("success");

                   ?>

                <form action="php_controller/login-user.php" method="post">
                    <div class="form-group">
                        <input class="form-control autofocus" type="email" name="email" placeholder="Email"><br />

                        <input class="form-control" type="password" name="password" placeholder="Senha"><br />

                        <input class="btn btn-primary" type="submit" value="Logar">
                    </div>
                </form>

            </div>
        </div>
    </div>

        
<?php include('layout/footer.php'); ?>