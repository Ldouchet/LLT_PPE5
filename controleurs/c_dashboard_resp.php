<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Dieu, autrement dit Loïc le tout puissant.
 * Date: 20/02/14
 * Time: 19:10
 * To change this template use File | Settings | File Templates.
 */

if(!isset($_REQUEST['action']))
    $action = 'list';
else
    $action = $_REQUEST['action'];

switch($action){
    case 'list':{
        $the_bugs = getAllBug();
        include("vues/v_dashboard_resp.php");
        break;
    }
    case 'nouveau':{
        if (isset($_POST['objet'])){
            $message = ajouterNewBug();
            include("vues/v_message.php");
        }
        $the_products = getAllProducts();
        include("vues/v_new_bug.php");
        break;
    }
}