<?php

if(isset($_SESSION['user'])){
    echo "session";
}else if(isset($_POST['username']) && isset($_POST['password'])){
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];
    if($user->userExists($userForm, $passForm)){
            //$userSession->sercurrentUser($userForm);
            $user->setUser();
    }else {
        $errorLogin = "nombre de usuario y/o pass incorrecto";
        //include_once "views/login.php";
    }
}else{
    //include_once 'views/login.php';
}
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
