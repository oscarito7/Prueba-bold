<?php
session_start();
if($_GET['cerrar_sesion']){
    session_unset();
    session_destroy();
}
if(isset($_SESSION['rol'])){
    switch ($_SESSION['rol']){
        case 1:
            header('Location: admin.php');
            break;

        case 2:
            break;
            header('location: colab.php');
    }
}
if(isset($_POST['username'])&& isset($_POST['password'])){
    $username=$_POST['username'];
    $passwoerd = $_POST['password'];
    $db = new Database();
    $query = $db->connect()->prepare('SELECT * FROM persona WHERE username = :username AND password =:password');
    $query->execute(['username' =>$username,'password' =>$passwoerd]);
     $row =$query->fetch(PDO::FETCH_NUM);
     if(row ==true){
         //validaar el rol
         $rol = $row['rol_id'];
         $_SESSION['rol']=$rol;
         switch ($_SESSION['rol']){
             case 1:
                 header('Location: admin.php');
                 break;

             case 2:
                 break;
                 header('location: colab.php');
         }



     }else{
         echo "el usuario o contrasena no existe";
     }

}
?>
<html>
<title>

</title>
<head></head>
<body>
<form action="#" method="post">
    Username: <br/><input type="text" name="username"><br/>
    Password: <br/><input type="password" name="password"><br/>
    <input type="submit" value="Iniciar sesion">
</form>
</body>
</html>
<?php

define('HOMEDIR', __DIR__);

include 'views/header.php';
$page = isset($_GET['page']) ? $_GET['page'] : 'users';
$folder = isset($_GET['folder']) ? $_GET['folder'] : 'users';
if (isset($_POST['btnSearch'])) {
    $search = true;
    $dataSearch = $_POST['dataSearch'];
}
include 'views/' . $folder . '/' . $page . '.php';
include 'views/footer.php';
