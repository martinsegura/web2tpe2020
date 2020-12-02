<?php
require_once 'app/controllers/shop.controller.php';
require_once 'app/controllers/user.controller.php';
require_once 'RouterClass.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$r = new Router();

$r->setDefaultRoute("ShopController", "showIndex");

//Login
$r->addRoute("Login", "GET", "UserController", "showLogin");
$r->addRoute("Register", "GET", "UserController", "showRegister");
$r->addRoute("Logout", "GET", "UserController", "logout");
$r->addRoute("userLogin", "POST", "UserController", "userLogin");
$r->addRoute("userRegister", "POST", "UserController", "userRegister");

//Admin 
$r->addRoute("Admin", "GET", "ShopController", "checkAdmin");
$r->addRoute("AdminShoeEdit/:id", "GET", "ShopController", "adminShoeEdit");
$r->addRoute("AdminPermissions/:ID/:ADMIN", "GET", "UserController", "adminPermissions");
$r->addRoute("AdminDeleteUser/:ID", "GET", "UserController", "adminDeleteUser");

//Items
$r->addRoute("AddShoe", "GET", "ShopController", "addShoe");
$r->addRoute("DeleteShoe/:id", "GET", "ShopController", "deleteShoe");
$r->addRoute("AdminShoeEdit/EditShoe/:id", "GET", "ShopController", "editShoe");

//Categorias
$r->addRoute("AddMarca", "GET", "ShopController", "addMarca");
$r->addRoute("DeleteMarca/:id", "GET", "ShopController", "deleteMarca");
$r->addRoute("AdminMarcaEdit/:id", "GET", "ShopController", "adminMarcaEdit");
$r->addRoute("AdminMarcaEdit/EditMarca/:id", "GET", "ShopController", "editMarca");

//Publico
$r->addRoute("Home", "GET", "ShopController", "showIndex");
$r->addRoute("Shop", "GET", "ShopController", "showShop");
$r->addRoute("Shop/:ID", "GET", "ShopController", "showZapatillaByMarca");
$r->addRoute("Comprar/:id", "GET", "ShopController", "showZapatilla");

// $r->addRoute("", "", "", "");

//Run
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
