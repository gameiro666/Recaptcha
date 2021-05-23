<?php
    include_once("recaptchalib.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://www.google.com/recaptcha/api.js?hl=pt-BR"></script>
</head>
<body>
    <form method="POST">
    <p>
        <label>Usuário</label><br>
        <input type="text" name="usuario">
    </p>

    <p>
        <label>Senha</label><br>
        <input type="password" name="senha">
    </p>

    <p>
        <button type="submit" name="enviar">Logar</button>
    </p>

    <div class="g-recaptcha" data-sitekey="6LcXBecaAAAAAC735lGvP8IXzgRhD8K9v3-r04CY"></div>
    </form>

    <?php
        $secret = "6LcXBecaAAAAAI30DduDJaNDXoyDMq5blW97f9Vg";

        $response = null;
        $reCaptcha = new reCaptcha($secret);

        if(isset($_POST['g-recaptcha-response'])){
            $response = $reCaptcha->verifyResponse($_SERVER['REMOTE_ADDR'], $_POST['g-recaptcha-response']);
        }

        if($response != null && $response->success){
            echo "Prosseguir";
        }

    ?>
</body>
</html>