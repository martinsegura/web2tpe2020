<?php

class UserModel{

    private function connect(){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_zapatillas;charset=utf8', 'root', '');
        return $db;
    }

    function getUsers(){
        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM user');
        $query->execute(); 

        //3
        $userDB = $query->fetchAll(PDO::FETCH_OBJ); //Arreglo de tareas

        return $userDB;
    }


    //Trae el usuario de la base de datos
    function getUser($user){
        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM user WHERE email = ?');
        $query->execute([$user]); 

        //3
        $userDB = $query->fetchAll(PDO::FETCH_OBJ); //Arreglo de tareas

        return $userDB;
    }

    //Trae la contraseña de la base de datos
    function getPassword($password){
        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM user WHERE contraseña = ?');
        $query->execute([$password]); 

        //3
        $passwordDB = $query->fetchAll(PDO::FETCH_OBJ); //Arreglo de tareas

        return $passwordDB;
    }

    function saveUser($email, $contraseña, $admin){
        $db = $this->connect();
        $query = $db->prepare('INSERT INTO user (email, contraseña, `admin`) VALUES(?, ?, ?)');
        $query->execute([$email, $contraseña, $admin]);
    }

    function editUserAdmin($admin, $user_id){
        $db = $this->connect();
        
        $query = $db->prepare('UPDATE user SET `admin` = ? WHERE id = ?');
        $query->execute([$admin, $user_id]);
       
    }

    function deleteUser($user_id){
        $db = $this->connect();
        $query = $db->prepare('DELETE FROM user WHERE id = ?');
        $query->execute([$user_id]);
    }
}