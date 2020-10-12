<?php

class UserModel{

    private function connect(){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_zapatillas;charset=utf8', 'root', '');
        return $db;
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
}