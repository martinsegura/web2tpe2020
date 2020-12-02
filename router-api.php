<?php

require_once 'RouterClass.php';
require_once 'app/api/api.comment.controller.php';


$r = new Router();

//$r->addRoute("", "", "", "");
$r->addRoute("comentarios", "GET", "ApiCommentsController", "getAll");
$r->addRoute("comentarios/:ID", "GET", "ApiCommentsController", "getCommentsByZapatilla");
$r->addRoute("comentarios/:ID", 'DELETE', "ApiCommentsController", "deleteCommentById");
$r->addRoute("comentarios", "POST", "ApiCommentsController", "addComment");
//Default
$r->setDefaultRoute('ApiCommentsController','show404');
//Run
$r->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']); 