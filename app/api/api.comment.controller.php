<?php
include_once 'app/models/comment.model.php';
include_once 'app/api/api.view.php';


class ApiCommentsController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new CommentModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    function getData(){ 
        return json_decode($this->data); 
    } 

    //Trae solo un comentario
    function getCommentById($params = null){
        $comment_id = $params[':ID'];
        $comentarios = $this->model->getCommentById($comment_id);
        if($comentarios){
            $this->view->response($comentarios, 200);
        }else{
            $this->view->response("El comentario con id=$comment_id no existe", 404);
        }
    }

    //Trae todos los comentarios
    function getAll($params = null){
        $comentarios = $this->model->getComments();
        $this->view->response($comentarios, 200);
    }

    //Trae todos los comentarios de una zapatilla
    function getCommentsByZapatilla($params = null){
        $comment_id = $params[':ID'];
        $comment = $this->model->getCommentsByZapatilla($comment_id);
        if($comment){
            $this->view->response($comment, 200);
        }else{
            $this->view->response("La zapatilla con id=$comment_id no tiene comentarios", 404);
        }
    }

    //Elimina un comentario por id
    function deleteCommentById($params = null){
        $comentario_id = $params[':ID'];
        $r = $this->model->deleteCommentById($comentario_id);
        if($r){ 
            $this->view->response("El comentario con id $comentario_id Se elimino", 200);
        }else{
            $this->view->response("El comentario con id=$comentario_id no existe", 404);
        }
    }

    //Agrega un comentario
    function addComment(){
        
        $body = $this->getData();
        // var_dump($body);
        $comentario = $body->texto;
        $calificacion = $body->calificacion;
        $id_zapatilla = $body->id_zapatilla;
        $id_comentario = NULL;
        if(!empty($comentario)){
            if($calificacion <= 5){
                $id = $this->model->addComment($comentario, $calificacion, $id_zapatilla, $id_comentario);
                if($id > 0 ){
                    $this->view->response("La tarea se inserto correctamente", 200);
                }else{
                    $this->view->response("No se pudo insertar", 500);
                }
            }else{
                $this->view->response("La calificacion tiene que ser menor o igual a 5", 500);
            }
        }else{
            $this->view->response("El comentario debe contener texto");
        }
    }


    function show404($params = null) {
        $this->view->response("El recurso solicitado no existe", 404);
    }
}