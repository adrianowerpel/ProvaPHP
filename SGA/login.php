<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset='utf-8' />
    <link rel='icon' type='image/png' sizes='96x96' href='assets/img/favicon.png'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
    <title>Sistema de Gestão Acadêmica</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name='viewport' content='width=device-width' />
    <!--Meu estilo-->
    <link href='assets/css/estilologin.css' rel='stylesheet'>
</head>
<body><body>

<form method="post" action="logar.php" id="login-form" name="formlogin">
    <fieldset>

        <legend>Log in</legend>

        <label for="login">Usuário</label>
        <input type="text" id="login" name="usuario"/>
        <div class="clear"></div>

        <label for="password">Senha</label>
        <input type="password" id="password" name="senha"/>
        <div class="clear"></div>

        <label for="remember_me" style="padding: 0;">Esqueceu?</label>
        <a href="recuperar.php">Recuperar</a>
        <div class="clear"></div>

        <br />

        <input type="submit" style="margin: -20px 0 0 287px;" class="button" name="commit" value="Log in"/>
    </fieldset>
</form>

</body>

</html>