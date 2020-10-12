<?php

include_once 'app/models/user.model.php';
include_once 'app/views/user.view.php';

class UserController{

    private $model;
    private $view;

        function __construct(){
            $this->model = new UserModel();
            $this->view = new UserView();
        }

        function showLogin(){
            $msg = false;
            $this->view->showLogin($msg);
        }

        function userLogin(){
            $user = $_POST["input_user"];
            $password = $_POST["input_password"];

            //Verifica si el usuario existe
            if(isset($user)){

                $userDB = $this->model->getUser($user);
                
                if(isset($userDB) && $userDB){
                    //Este foreach es para poder sacar la informacion del obj
                    foreach($userDB as $userData){
                        $idDB = $userData->id;
                        $contraseñaDB = $userData->contraseña;
                        $emailDB =  $userData->email;
                        $adminDB = $userData->admin;
                    }

                    //Si el usuario existe pasa a verificar la contraseña
                    if(password_verify($password, $contraseñaDB)){
                        session_start();
                        $_SESSION["EMAIL"] = $emailDB;
                        $_SESSION["ADMIN"] = $adminDB;
                        $_SESSION["ID"] = $idDB;

                        if($_SESSION["ADMIN"] == 1){
                            header("Location: " . BASE_URL . 'Admin');
                        }

                    }else{
                        //Sacar estos echos
                        $msg = "La contraseña es incorrecta";
                        $this->view->showLogin($msg);
                    }
                }else{
                    //Sacar estos echos
                    $msg = "El usuario no existe";
                    $this->view->showLogin($msg);
                }
            }
        }

        function Logout(){
            session_start();
            if($_SESSION["ADMIN"] == 1){
                session_start();
                session_destroy();
                header("Location: " . BASE_URL . 'Home');
            }
            if(!isset($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] == 0){
                header("Location: " . BASE_URL . 'Home'); 
            }
        }
        //Encripta el parametro y lo devuelve
        // function encryptPassword($passparam){
        //     $password = $passparam;
        //     $hash = password_hash($password, PASSWORD_DEFAULT);
        //     return $hash;
        // }

}