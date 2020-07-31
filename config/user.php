<?php
    class User extends Conexion {
        private $nombre;
        private $username;

        public function userExist ($user, $pass){
            $md5pass = md5($pass);

            $query = $this->conectarse()->prepare('SELECT * FROM persona WHERE username = :email AND password = :pass');
            $query->execute(['user' => $user, 'pass' => $md5pass]);

            if($query->rowCount()){
                return true;
            }else{
                return  false;
            }
        }
        public function setUser($user){
            $query = $this->conectarse()->prepare('SELECT * FROM persona WHERE username = :email');
            $query ->execute(['user' => $user]);

            foreach($query as $currentUSer){
                $this->nombre = $currentUSer['nombre'];
                $this->username = $currentUSer['username'];
            }
        }
        public function getNombre(){
            return $this->nombre;
        }
    }
?>