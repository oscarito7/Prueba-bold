<?php

?>
<html>
<head>
    <meta charset="UTF-8">
    <title> Login</title>
    <link rel="stylesheet" href="../misc/style.css">
</head>
<body>
<form action="" method="post">
    <?php if(isset($errorLogin)){
        echo $errorLogin;
    } ?>
    <h2>    iniciar session</h2>
    <p> Nombre de usuario<br>
    <input type="text" name="username"></p>
    <p> Password: <br>
        <input type="password" name="password"> </p>
    <p class="center"><input type="submit" value="Iniciar Sesion"></p>
</form>
</body>
</html>
