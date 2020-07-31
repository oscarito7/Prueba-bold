<?php
class userSession{
    public function __construct()
    {
        session_start();

    }
    public  function serCurrentUser($user){
        $_SESSION['user']=$user;
    }
    public function getCurrentUSer(){
        return $_SESSION['user'];
    }
    public function closeSession(){
        session_unset();
        session_destroy();
    }
}
?>