<?php

class CommentModel{

    private function connect(){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_zapatillas;charset=utf8', 'root', '');
        return $db;
    }

    function getCommentById($id){
        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM comentario WHERE id_comentario = ?');
        $query->execute([$id]); 

        $comentarios = $query->fetchAll(PDO::FETCH_OBJ); //Arreglo de tareas

        return $comentarios;
    }

    function getComments(){
        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM comentario');
        $query->execute(); 

        $comentarios = $query->fetchAll(PDO::FETCH_OBJ); //Arreglo de tareas

        return $comentarios;
    }

    function getCommentsByZapatilla($comment_id){
        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM comentario WHERE id_zapatilla = ?');
        $query->execute([$comment_id]); 

        $comentarios = $query->fetchAll(PDO::FETCH_OBJ); //Arreglo de tareas

        return $comentarios;
    }

    function deleteCommentById($id){
        $db = $this->connect();

        $query = $db->prepare('DELETE FROM comentario WHERE id_comentario = ?');
        $query->execute([$id]);

        return $query->rowCount();

    }

    function addComment($comentario, $calificacion, $id_zapatilla, $id_comentario){
        $db = $this->connect();
        $query = $db->prepare('INSERT INTO comentario (texto, calificacion, id_zapatilla, id_comentario) VALUES (?, ?, ?, ?)');
        $query->execute([$comentario, $calificacion, $id_zapatilla, $id_comentario]);
        //Devuelve el id de la ultima inserción 
        return $query->rowCount();
    }

    
}