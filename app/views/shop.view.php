<?php

include_once 'libs/smarty/libs/Smarty.class.php';

class ShopView{
    //Muestra el index
    function showIndex(){
        $smarty = new Smarty();
        $smarty->display('templates/index.tpl');
    }

    //Crea un nav con links para filtrar por cada marca
    function showNav($marcas){
        $smarty = new Smarty();
        $smarty->assign('marcas', $marcas);
        $smarty->display('templates/nav.tpl');
    }
    
    //Muestra todas las zapatillas que trae el model (Esta adaptado tanto para traer todas como para de una marca en expecifica)
    function showZapatillas($zapatillas){
        $smarty = new Smarty();
        $smarty->assign('zapatillas', $zapatillas);
        $smarty->display('templates/shop.tpl');
    }

    //Muestra un item en particular
    function showZapatilla($zapatilla, $sesion){
        $smarty = new Smarty();
        $smarty->assign('zapatilla', $zapatilla);
        $smarty->assign('sesion', $sesion);
        $smarty->display('templates/shoe.tpl');
    }

    //Muestra la pagina de admin
    function showAdmin($marcas, $zapatillas, $usersDB){
        $smarty = new Smarty();
        $smarty->assign('marcas', $marcas);
        $smarty->assign('zapatillas', $zapatillas);
        $smarty->assign('usersDB', $usersDB);
        $smarty->display('templates/admin.tpl');
    }

    //Muestra la pagina para editar zapatillas
    function showAdminShoeEdit($marcas, $zapatillas){
        $smarty = new Smarty();
        $smarty->assign('marcas', $marcas);
        $smarty->assign('zapatillas', $zapatillas);
        $smarty->display('templates/admin_shoe_edit.tpl');
    }

    //Muestra la pagina para editar Marcas
    function showAdminMarcaEdit($marcas){
        $smarty = new Smarty();
        $smarty->assign('marcas', $marcas);
        $smarty->display('templates/admin_marca_edit.tpl');
    }
}