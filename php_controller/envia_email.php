<?php
    require_once('../mailer/PHPMailerAutoload.php');
    require_once ('requires.php');

    if (!isset($_SESSION["user"])){

        $_SESSION["danger"] = "Voce precisa realizar o login para finalizar a compra.";
        header("Location: ../login.php");
        die();

    }

    $produtoDao = new ProdutoDao($conexao);

    $produto = $produtoDao->buscaPorProdutos($_POST["id"]);

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "yanmarques91@gmail.com";
$mail->Password = 'Kalihack1234';

$mail->setFrom("yanmarques91@gmail.com");
$mail->Subject = "Loja Virtu";
$mail->addAddress($_SESSION["email"]);
$mail->msgHTML("
    <html>
        <head>
            <title>
                Compra na loja virtu
            </title>
        </head>
        
        <body>
            <h1>Seja bem vindo</h1>
            
            <p>Ola {$_SESSION["user"]}, parece que voce esta afim de comprar um {$produto->nome}, no valor de R$" . $produto->preco. ".</p>
</body>
    
    </head>
</html>
");

if($mail->send()){
    $_SESSION["success"] = "Um email com a confirmacao foi enviado para voce.";
    header("Location: ../page_produtos.php?id={$produto->id}");
}else{
    $_SESSION["danger"] = "Erro ao enviar email : ".$mail->ErrorInfo;
    header("Location: ../page_produtos.php?id={$produto->id}");
}
die();
