<div id="bandeau">
<!-- Images En-t�te -->
    <h1>HelpDesk Maison des ligues</h1>
</div>
<!--  Menu haut-->
<ul id="menu">

    <?php
    if(estConnecter()){
        $use = $_SESSION['login']['fonction'];
        switch($use){

            case 'Responsable':{
                echo '<li><a href="index.php?uc=dash"> Mon tableau de bord </a></li>';
                echo '<li><a href="index.php?uc=dash&action=assign"> Assignations </a></li>';
                echo '<li><a href="index.php?uc=dash&action=delete"> Suppressions </a></li>';
                echo '<li><a href="index.php?uc=deconnexion">Se déconnecter</a></li>';
                break;
            }
            case 'Utilisateurs':{
                echo '<li><a href="index.php?uc=dash"> Mon tableau de bord </a></li>';
                echo '<li><a href="index.php?uc=dash&action=nouveau"> Nouvel incident</a></li>';
                echo '<li><a href="index.php?uc=deconnexion">Se déconnecter</a></li>';
                break;
            }
            case 'Technicien':{
                echo '<li><a href="index.php?uc=dash"> Mon tableau de bord </a></li>';
                echo '<li><a href="index.php?uc=deconnexion">Se déconnecter</a></li>';
                break;
            }

        }
    }else{
        echo '<li><a href="index.php?uc=accueil"> Accueil </a></li>';
    }


    ?>


</ul>
