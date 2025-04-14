<?php
$mensagem = isset($_REQUEST['m']) ? $_REQUEST['m'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="POST">
        <?php echo $mensagem ?>
        <br><br>
 Email: <input type="text" name="email">
<br><br>
Senha: <input type="password" name="senha">
<br><br>
<input type="submit" value="Entrar">

    </form>
</body>
</html>