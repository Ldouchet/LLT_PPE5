<?php

function getBugById($id){
    require "../bootstrap.php";
    $the_bug = $entityManager->find('Bug', $id);
    echo var_dump($the_bug);
    return json_encode($the_bug->jsonSerialize());
}

getBugById(27);
?>