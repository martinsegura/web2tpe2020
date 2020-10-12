<?php

class ShopModel{

    private function connect(){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_zapatillas;charset=utf8', 'root', '');
        return $db;
    }
    //Trae todas las marcas de la bbdd
    function getMarcas(){
        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM marca');
        $query->execute(); 

        //3
        $marcas = $query->fetchAll(PDO::FETCH_OBJ); //Arreglo de tareas

        return $marcas;
    }

    //Trae todas las zapatillas disponibles
    function getZapatillas(){
        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM zapatilla');
        $query->execute(); 

        $zapatillas = $query->fetchAll(PDO::FETCH_OBJ); //Arreglo de tareas

        return $zapatillas;
    }

    //Trae todas las zapatillas filtradas por una marca en particular
    function getZapatillaByMarca($id){
        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM `zapatilla` WHERE id_marca = ?');
        $query->execute([$id]); 

        $collection = $query->fetchAll(PDO::FETCH_OBJ); //Arreglo de tareas

        return $collection;
    }

    //Trae una zapatilla en particular
    function getZapatilla($id){
        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM zapatilla WHERE id = ?');
        $query->execute([$id]); 

        $zapatilla = $query->fetchAll(PDO::FETCH_OBJ); //Arreglo de tareas

        return $zapatilla;
    }

    //Elimina una zapatilla por id de la base
    function deleteShoe($id){
        $db = $this->connect();
        $query = $db->prepare('DELETE FROM zapatilla WHERE id = ?');
        $query->execute([$id]);
    }

    //Agrega una zapatilla a la tabla de zapatillas
    function addShoe($nombre, $precio, $talle, $marca){
        $db = $this->connect();
        $query = $db->prepare('INSERT INTO zapatilla (nombre, precio, talle, id_marca) VALUES(?, ?, ?, ?)');
        $query->execute([$nombre, $precio, $talle, $marca]);
    }

    //Edita una zapatilla via id
    function editShoe($id, $nombre, $precio, $talle, $marca){
        $db = $this->connect();
        
        $query = $db->prepare('UPDATE zapatilla SET nombre = ?, precio = ?, talle = ?,  id_marca = ? WHERE id = ?');
        $query->execute([$nombre, $precio, $talle, $marca, $id]);
    }

    //Agrega una marca a la tabla marca
    function addMarca($nombre_marca){
        $db = $this->connect();
        $query = $db->prepare('INSERT INTO `marca` (`id_marca`, `nombre`) VALUES (NULL, ?)');
        $query->execute([$nombre_marca]);
    }

    //Elimina una marca
    function deleteMarca($id){
        $db = $this->connect();
        $query = $db->prepare('DELETE FROM marca WHERE id_marca = ?');
        $query->execute([$id]);
    }

    //Trae una marca por ID
    function getMarcasById($id){
        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM marca WHERE id_marca = ?');
        $query->execute([$id]); 

        $collection = $query->fetchAll(PDO::FETCH_OBJ); //Arreglo de tareas

        return $collection;
    }

    //Edita el nombre de una marca via ID
    function editMarca($id, $nombre_marca){
        $db = $this->connect();
        
        $query = $db->prepare('UPDATE marca SET nombre = ? WHERE id_marca = ?');
        $query->execute([$nombre_marca, $id]);
    }
}