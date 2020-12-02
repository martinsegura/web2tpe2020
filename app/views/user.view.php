<?php

include_once 'libs/smarty/libs/Smarty.class.php';

class UserView{

    //Muestra la pagina de login
    function showLogin($msg){
        $smarty = new Smarty();
        $smarty->assign('msg', $msg);
        $smarty->display('templates/login.tpl');
    }

    function showRegister($msg){
        $smarty = new Smarty();
        $smarty->assign('msg', $msg);
        $smarty->display('templates/register.tpl');
    }

    // function showUserLogged($sesion){
    //     $smarty = new Smarty();
    //     $smarty->assign('sesion', $sesion);
    //     $smarty->display('templates/header.tpl');
    // }
}