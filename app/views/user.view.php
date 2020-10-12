<?php

include_once 'libs/smarty/libs/Smarty.class.php';

class UserView{

    //Muestra la pagina de login
    function showLogin($msg){
        $smarty = new Smarty();
        $smarty->assign('msg', $msg);
        $smarty->display('templates/login.tpl');
    }
}