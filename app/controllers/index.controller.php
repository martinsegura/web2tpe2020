<?php
include_once 'app/views/index.view.php';
// include_once 'app/models/index.model.php';

class IndexController{

    // private $model;
    private $view;

        function __construct(){
            // $this->model = new IndexModel();
            $this->view = new IndexView();
        }

        function showIndex(){
            $this->view->showIndex();
        }
}