﻿<?php
/**
 * teste si une chaîne a un format de code postal
 *
 * Teste le nombre de caractères de la chaîne et le type entier (composé de chiffres)
 * @param $codePostal : la chaîne testée
 * @return : vrai ou faux
*/
function estUnCp($codePostal)
{
   
   return strlen($codePostal)== 5 && estEntier($codePostal);
}
/**
 * teste si une chaîne est un entier
 *
 * Teste si la chaîne ne contient que des chiffres
 * @param $valeur : la chaîne testée
 * @return : vrai ou faux
*/

function estEntier($valeur) 
{
	return preg_match("/[^0-9]/", $valeur) == 0;
}
/**
 * Teste si une chaîne a le format d'un mail
 *
 * Utilise les expressions régulières
 * @param $mail : la chaîne testée
 * @return : vrai ou faux
*/
function estUnMail($mail)
{
return  preg_match ('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#', $mail);
}
/*
 * Fonction qui verifie si utilisateur est connecté
 * renvoie 1 si connecté
 * renvoie 0 si non connecté
 *
 */

// connection à modifier pour prendre en compte le statut de la personne qui c'est connecté
function estConnecter(){
    $resu = 0;
    if(isset($_SESSION['login'])){
        $resu = 1;
    }
    return $resu;
}

/*
 * Déconnecte l'utilisateur
 */
function seDeconnecter(){
   unset($_SESSION['login']);
   unset($_SESSION['fonction']);
    echo'Vous avez été déconnecté';
}

/*
 * Fonction qui verifie si utilisateur est valide
 * reçoit le login et le mot de passe à vérifier.
 * La fonction s'occcupe de créer la variable session 'status' pour identifier le type d'utilisateur connecté
 * renvoie 1 si ok
 * renvoie 0 si non ok
 *
 */
function authentifierUser($l,$m){
    require "bootstrap.php";

    $dql = "SELECT u FROM User u WHERE u.login = '$l' AND u.mdp = '$m'";

    $query = $entityManager->createQuery($dql);
    $query->setMaxResults(1);
    $users = $query->getResult();
    if (count($users) > 0){
        $leClub = null;
        if ($users[0]->getLeClub() != null){
            $leClub = $users[0]->getLeClub()->getNumClub();
        }
        $log = array('id'=>$users[0]->getId(),'identite'=>$users[0]->getPrenom() . " " .$users[0]->getName(), 'fonction'=>$users[0]->getFonction(), 'club'=>$leClub );
        $_SESSION['login'] = $log;
        return 1;
    }else{
        return 0;
    }
}

function getBugsOpenByUser($id){
    require "bootstrap.php";
    $users = $entityManager->find('User', $id);
    $bugs = $users->getReportedBugs();
    $tab1 = array();
    $tab2 = array();
    foreach ($bugs as $bug) {
        if ($bug->getStatus() == "CLOSE"){
            $tab2[] = $bug;
        }else{
            $tab1[] = $bug;
        }
    }
    $retour = array($tab1, $tab2);
    return $retour;
}

function getAllBug(){
    require "bootstrap.php";
    $BugRepository = $entityManager->getRepository('Bug');
    $Bugs = $BugRepository->findAll();
    return $Bugs;
}

function getAllTech(){
    require "bootstrap.php";

    $dql = "SELECT u FROM User u WHERE u.fonction = 'Technicien'";

    $query = $entityManager->createQuery($dql);
    $Techs = $query->getResult();
    return $Techs;
}

function getAllProducts(){
    require "bootstrap.php";
    $productRepository = $entityManager->getRepository('Product');
    $products = $productRepository->findAll();
    return $products;
}

function ajouterNewBug(){
    $obj = $_POST['objet'];
    $lib = $_POST['libelle'];
    $apps = $_POST['apps'];


    //echo var_dump($apps);

    require "bootstrap.php";

    $reporter = $entityManager->find("User", $_SESSION['login']['id']);
    //$engineer = new User();

    $bug = new Bug();
    $bug->setDescription($lib);
    $bug->setCreated(new DateTime("now"));
    $bug->setStatus("OPEN");

    foreach ($apps as $productId) {
        $product = $entityManager->find("Product", $productId);
        $bug->assignToProduct($product);
    }

    $bug->setReporter($reporter);
    //$bug->setEngineer($engineer);

    $entityManager->persist($bug);
    $entityManager->flush();

    return "Le bug a été créé.";
}

function repareBug(){

    $resume = $_POST['resume'];
    $id = $_GET['id'];

    require "bootstrap.php";        //faire un update pour passer le statut de open a close

    $bug = $entityManager->find("Bug", $id);
    $bug->setdescription($resume);
    $bug->close();

    $entityManager->flush();


    return "Le bug a bien été réparée.";
}

function assignBug(){

    if($_SESSION['login']['fonction'] === "Responsable"){

        require "bootstrap.php";

        if(isset($_POST['attribuer'])){

            $idTech = $_POST['lst'];
            $idBug = $_POST['id'];
            $delai = $_POST['date'];

            $inge = $entityManager->find("User", $idTech);
            $bug = $entityManager->find("Bug", $idBug);
            $bug->setEngineer($inge);

            $delai_date = new DateTime();
            $delai_date->setDate(substr($delai, 6,4), substr($delai, 3,2),substr($delai, 0, 2) );

            $bug->setDelai($delai_date);
            $entityManager->flush();

            return "Le bug a bien été attribuée.";
        }

    }else{

        return "Le bug a bien été attribuée.";
    }

}

function uploadFiles($files){


    $dossier = 'upload/';
    $fichier = basename($files['name']);
    $taille_maxi = 10000000;
    $taille = filesize($files['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    $extension = strrchr($files['name'], '.');
    //Début des vérifications de sécurité...
    if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
    {
        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
    }
    if($taille>$taille_maxi)
    {
        $erreur = 'Le fichier est trop gros...';
    }
    if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
    {
        //On formate le nom du fichier ici...
        $fichier = strtr($fichier,
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if(move_uploaded_file($files['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        {
            echo 'Upload effectué avec succès !';
        }
        else //Sinon (la fonction renvoie FALSE).
        {
            echo 'Echec de l\'upload !';
        }
    }
    else
    {
        echo $erreur;
    }


}



function envoieFichier($file)
{
    $fichier = basename($file['name']);
    $taille_maxi = 1000000;
    $taille = filesize($file['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg' ,'.pdf','.doc','.odt' );
    $extension = strrchr($file['name'], '.');
    //Début des vérifications de sécurité...
    if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
    {
        $erreur = '<br>Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
    }
    if($taille>$taille_maxi)
    {
        $erreur = '<br>Le fichier est trop gros...';
    }
    if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
    {

        if(move_uploaded_file($file['tmp_name'], "upload/". $fichier))
            //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        {
            echo "</br>Le fichier a bien été envoyé";
            // echo var_dump($fichier);
            return $fichier;
        }
        else //Sinon (la fonction renvoie FALSE).
        {
            echo '<br>Echec de l\'upload !';
            return false;
        }
    }
    else
        echo $erreur;
}

?>