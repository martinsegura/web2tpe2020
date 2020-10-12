<?php

include_once 'app/models/shop.model.php';
include_once 'app/views/shop.view.php';

class ShopController{

    private $model;
    private $view;

        function __construct(){
            $this->model = new ShopModel();
            $this->view = new ShopView();
        }

        //Muestra todo el shop y trae todas las zapatillas o de una marca en expecifico
        function showShop(){
            $marcas = $this->model->getMarcas();
            $this->view->showNav($marcas);
            $zapatillas = $this->model->getZapatillas();
            $this->view->showZapatillas($zapatillas);
        }

        function showNike(){
            $id = 1;
            $this->showZapatillaByMarca($id);
        }
        function showAdidas(){
            $id = 2;
            $this->showZapatillaByMarca($id);
        }
        function showPuma(){
            $id = 3;
            $this->showZapatillaByMarca($id);
        }
        function showFila(){
            $id = 4;
            $this->showZapatillaByMarca($id);
        }
        function showNewBalance(){
            $id = 5;
            $this->showZapatillaByMarca($id);
        }
        
        //Crea el shop y filtra por una marca en expecifico
        function showZapatillaByMarca($id){ 
            $marcas = $this->model->getMarcas();
            $this->view->showNav($marcas);
            $collection = $this->model->getZapatillaByMarca($id);
            $this->view->showZapatillas($collection);
        }

        //Crea la pagina de un item en particular y lo trae
        function showZapatilla($id = null){
            $zapatilla_id = $id[':id'];
            $zapatilla = $this->model->getZapatilla($zapatilla_id);
            $this->view->showZapatilla($zapatilla);
        }

        //Verifica si la cuenta que inicio sesion es un admin
        function checkAdmin(){
            session_start();
            if($_SESSION["ADMIN"] == 1){
                $marcas = $this->model->getMarcas();
                $zapatillas = $this->model->getZapatillas();
                $this->view->showAdmin($marcas, $zapatillas);
            }
            if(!isset($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] == 0){
                header("Location: " . BASE_URL . 'Home'); 
            }
        }

        //Crea la pagina para editar las zapatillas
        function adminShoeEdit($id){
            session_start();
            if($_SESSION["ADMIN"] == 1){
                $zapatilla_id = $id[':id'];
                $marcas = $this->model->getMarcas();
                $zapatillas = $this->model->getZapatilla($zapatilla_id);
                $this->view->showAdminShoeEdit($marcas, $zapatillas);    
            }
            if(!isset($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] == 0){
                header("Location: " . BASE_URL . 'Home'); 
            }

        }

        //Borra una zapatilla por id
        function deleteShoe($id){
            session_start();
            if($_SESSION["ADMIN"] == 1){
                $zapatilla_id = $id[':id'];
                $this->model->deleteShoe($zapatilla_id);
                header("Location: " . BASE_URL . "Admin");
            }
            if(!isset($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] == 0){
                header("Location: " . BASE_URL . 'Home'); 
            }
        }

        //Agrega una zapatilla a la base de datos
        function addShoe(){
            session_start();
            if($_SESSION["ADMIN"] == 1){
                $nombre = $_GET['nombre'];
                $precio =  $_GET['precio'];
                $talle = $_GET['talle'];
                $marca = $_GET['marca'];
                
                $this->model->addShoe($nombre, $precio, $talle, $marca);
                header("Location: " . BASE_URL . 'Admin'); 
            }
            if(!isset($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] == 0){
                header("Location: " . BASE_URL . 'Home'); 
            }
        }

        //Comportamiento para editar la zapatilla
        function editShoe($id){
            session_start();
            if($_SESSION["ADMIN"] == 1){
                $ID = $id[':id'];
                $nombre = $_GET['nombre'];
                $precio =  $_GET['precio'];
                $talle = $_GET['talle'];
                $marca = $_GET['marca'];

                $this->model->editShoe($ID, $nombre, $precio, $talle, $marca);
                header("Location: " . BASE_URL . 'Admin');      
            }
            if(!isset($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] == 0){
                header("Location: " . BASE_URL . 'Home'); 
            }

        }

        //Agrega una marca a la base de datos
        function addMarca(){
            session_start();
            if($_SESSION["ADMIN"] == 1){
                $nombre_marca = $_GET['nombre_marca'];
                $this->model->addMarca($nombre_marca);
                header("Location: " . BASE_URL . 'Admin'); 
            }
            if(!isset($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] == 0){
                header("Location: " . BASE_URL . 'Home'); 
            }
        }

        //Elimina una marca por id
        function deleteMarca($id){
            session_start();
            if($_SESSION["ADMIN"] == 1){
                $marca_id = $id[':id'];
                $this->model->deleteMarca($marca_id);
                header("Location: " . BASE_URL . "Admin");
            }
            if(!isset($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] == 0){
                header("Location: " . BASE_URL . 'Home'); 
            }
        }

        //Crea la pagina para editar las marcas
        function adminMarcaEdit($id){
            session_start();
            if($_SESSION["ADMIN"] == 1){
                $marca_id = $id[':id'];
                $marcas = $this->model->getMarcasById($marca_id);
                $this->view->showAdminMarcaEdit($marcas);   
            }
            if(!isset($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] == 0){
                header("Location: " . BASE_URL . 'Home'); 
            }
        }

        //Comportamiento para editar la marca en la base de datos
        function editMarca($id){
            session_start();
            if($_SESSION["ADMIN"] == 1){
                $ID = $id[':id'];
                $nueva_marca = $_GET["nombre"];
                $this->model->editMarca($ID, $nueva_marca);
                header("Location: " . BASE_URL . 'Admin');    
            }
            if(!isset($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] == 0){
                header("Location: " . BASE_URL . 'Home'); 
            }
        }


        // session_start();
        // if($_SESSION["ADMIN"] == 1){
           
        // }
        // if(!isset($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] == 0){
        //     header("Location: " . BASE_URL . 'Home'); 
        // }

}