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
        $the_bugs = getBugsbyTech();
        include("vues/v_dashtech.php");
        break;
    }
    case 'repare':{

        if (isset($_POST['valider'])){

            $message = repareBug();
            $bug= findBugById($_POST['id']);
            header("Location:index.php?uc=dash");

        }else{

            $bug= findBugById($_GET['id']);
        }
        include("vues/v_repare.php");
        break;
    }
}