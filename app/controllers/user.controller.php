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

        //Muestra la pagina de login
        function showLogin(){
            session_start();
            if(isset($_SESSION["EMAIL"])){
                header("Location: " . BASE_URL . 'Home');
            }
            if(!isset($_SESSION["EMAIL"])){
                $msg = false;
                $this->view->showLogin($msg);
            }
        }

        //Muestra la pagina para registrarse
        function showRegister(){
            session_start();
            if(isset($_SESSION["EMAIL"])){
                header("Location: " . BASE_URL . 'Home');
            }
            if(!isset($_SESSION["EMAIL"])){
                $msg =false;
                $this->view->showRegister($msg);
            }

        }

        //Verica el login
        function userLogin(){
            session_start();
            if(isset($_SESSION["EMAIL"])){
                header("Location: " . BASE_URL . 'Home');
            }
            if(!isset($_SESSION["EMAIL"])){
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
                        }else{
                            header("Location: " . BASE_URL . 'Home');
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
        }

        //Funcion para registrar usuarios
        function userRegister(){
            session_start();
            if(isset($_SESSION["EMAIL"])){
                header("Location: " . BASE_URL . 'Home');
            }
            if(!isset($_SESSION["EMAIL"])){
            $user = $_POST["input_user"];
            $password = $_POST["input_password"];
            $admin = 0;
            $usersDB = $this->model->getUser($user);
            
            if(!$usersDB){

                if(!empty($password)){
                    $contraseña = password_hash($password, PASSWORD_DEFAULT);
                    $this->model->saveUser($user, $contraseña, $admin);
                    session_start();
                    $userDB = $this->model->getUser($user);
                    foreach($userDB as $userData){
                        $idDB = $userData->id;
                        $contraseñaDB = $userData->contraseña;
                        $emailDB =  $userData->email;
                        $adminDB = $userData->admin;
                    }
                    session_start();
                        $_SESSION["EMAIL"] = $emailDB;
                        $_SESSION["ADMIN"] = $adminDB;
                        $_SESSION["ID"] = $idDB;
                        
                    header("Location: " . BASE_URL . 'Home');

                }else{
                    $msg = "Ingrese una contraseña";
                     $this->view->showRegister($msg);
                }
            }else{
                $msg = "Ya existe un usuario con este nombre";
                $this->view->showRegister($msg);
                }
            }
        }

        //Hace admin a un usuario
        function adminPermissions($id){
            session_start();
            if($_SESSION["ADMIN"] == 1){
                $admin_boolean =  $id[':ADMIN'];
                $user_id = $id[':ID'];
                $this->model->editUserAdmin($admin_boolean, $user_id);
                header("Location: " . BASE_URL . 'Admin');
            }
            if(!isset($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] == 0){
                header("Location: " . BASE_URL . 'Home'); 
            }
        }

        //Elimina a un usuario
        function adminDeleteUser($id){
            session_start();
            if($_SESSION["ADMIN"] == 1){
                $user_id = $id[':ID'];
                $this->model->deleteUser($user_id);
                header("Location: " . BASE_URL . 'Admin');
            }
            if(!isset($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] == 0){
                header("Location: " . BASE_URL . 'Home'); 
            }
        }

        //Desloguea la sesion
        function logout(){
            session_start();
            if($_SESSION["ADMIN"] == 1 || $_SESSION["ADMIN"] == 0){
                session_start();
                session_destroy();
                header("Location: " . BASE_URL . 'Home');
            }
            if(!isset($_SESSION["ADMIN"])){
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