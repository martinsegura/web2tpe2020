<?php
require_once 'app/controllers/index.controller.php';
require_once 'app/controllers/shop.controller.php';
require_once 'app/controllers/user.controller.php';
require_once 'RouterClass.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$r = new Router();

$r->setDefaultRoute("IndexController", "showIndex");

$r->addRoute("Login", "GET", "UserController", "showLogin");
$r->addRoute("Logout", "GET", "UserController", "Logout");
$r->addRoute("userLogin", "POST", "UserController", "userLogin");

//Admin 
$r->addRoute("Admin", "GET", "ShopController", "checkAdmin");
//Items
$r->addRoute("AddShoe", "GET", "ShopController", "addShoe");
$r->addRoute("DeleteShoe/:id", "GET", "ShopController", "deleteShoe");
$r->addRoute("AdminShoeEdit/:id", "GET", "ShopController", "adminShoeEdit");
$r->addRoute("AdminShoeEdit/EditShoe/:id", "GET", "ShopController", "editShoe");
//Categorias
$r->addRoute("AddMarca", "GET", "ShopController", "addMarca");
$r->addRoute("DeleteMarca/:id", "GET", "ShopController", "deleteMarca");
$r->addRoute("AdminMarcaEdit/:id", "GET", "ShopController", "adminMarcaEdit");
$r->addRoute("AdminMarcaEdit/EditMarca/:id", "GET", "ShopController", "editMarca");

//Publico
$r->addRoute("Home", "GET", "IndexController", "showIndex");
$r->addRoute("Shop", "GET", "ShopController", "showShop");
$r->addRoute("Nike", "GET", "ShopController", "showNike");
$r->addRoute("Adidas", "GET", "ShopController", "showAdidas");
$r->addRoute("Puma", "GET", "ShopController", "showPuma");
$r->addRoute("Fila", "GET", "ShopController", "showFila");
$r->addRoute("New Balance", "GET", "ShopController", "showNewBalance");
$r->addRoute("Comprar/:id", "GET", "ShopController", "showZapatilla");

// $r->addRoute("", "", "", "");

//Run
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
