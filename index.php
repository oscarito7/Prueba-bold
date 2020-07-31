
<?php
include_once 'config/user.php';
include_once 'config/user_session.php';
if(isset($_SESSION['user'])){
    echo "session";
}else if(isset($_POST['username']) && isset($_POST['password'])){
    echo "validacion";
}else{
    echo "Login";
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
