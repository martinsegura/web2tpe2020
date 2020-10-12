<?php

class IndexView{

    //Muestra el index
    function showIndex(){
        $smarty = new Smarty();
        $smarty->display('templates/index.tpl');
    }
}