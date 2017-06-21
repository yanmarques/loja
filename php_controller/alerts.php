<?php

    function showAlert($tipo){
        if (isset($_SESSION[$tipo])): ?>

            <p class="text-center alert-<?= $tipo ?> alert"><?= $_SESSION[$tipo] ?></p>

            <?  unset($_SESSION[$tipo]);

        endif;
    }
