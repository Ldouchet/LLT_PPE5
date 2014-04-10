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
        $the_bugs = getBugsOpenByUser($_SESSION['login']['id']);
        //$bugs_en_cours = $the_bugs[0];
        //$bugs_fermes =  $the_bugs[1];
        $the_bugs = getAllBug();
        $the_techs = getAllTech();
        include("vues/v_dashresp.php");
        break;
    }
    case 'assign':{
        $the_bugs = getAllBug();
        $the_techs = getAllTech();
        $the_resp = getAllResp();
        assignBug();
        include("vues/v_assign.php");
        break;
    }
    case 'delete':{
        $the_bugs = getAllBug();
        deleteBug();
        include("vues/v_delete.php");
        break;
    }
}