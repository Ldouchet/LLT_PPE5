<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Eric
 * Date: 20/02/14
 * Time: 19:17
 * To change this template use File | Settings | File Templates.
 */

if(!isset($_REQUEST['action']))
    $action = 'list';
else
    $action = $_REQUEST['action'];

switch($action){
    case 'list':{
        $the_bugs = getAllBug();
        include("vues/v_dashboard_tech.php");
        break;
    }
    case 'repare':{
        if (isset($_POST['objet'])){
            $message = repareBug();
            include("vues/v_message.php");
        }
        $the_bugs = getAllBug();
        include("vues/v_repare.php");
        break;
    }
}