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
        include("vues/v_dashtech.php");
        break;
    }
    case 'repare':{
       /*var_dump($_GET['id']);
       exit;*/
        if (isset($_POST['valider'])){
            $message = repareBug();
        }
        $bug= findBugById($_GET['id']);
        /*var_dump($bug);
        exit;*/
        include("vues/v_repare.php");
        break;
    }
}