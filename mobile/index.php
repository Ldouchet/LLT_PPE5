<?php
session_start();

?>

<!doctype html>
<html>
<head>
    <title>jQuery Mobile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./lib/jquery.mobile-1.4.2.min.css">
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="./lib/jquery.mobile-1.4.2.min.js"></script>
</head>
<body>
<div data-role="page">
    <div data-role="header">
        <h1>En-tête</h1>
    </div>
    <div data-role="content">
        <h4>Authentification</h4>
        <p>Veuillez vous authentifier pour continuer votre navigation sur la plate forme</p>
        <a href="#mon_dialog_info">Renseignements de connexion</a>

        <form name="connexion" method="POST" action="accueil_user.php" data-transition="flip">
                <div data-role="fieldcontain" class="ui-hide-label">
                        <label for="pseudo">Pseudo</label>
                        <input id="pseudo" type="text" name="pseudo" size="30" maxlength="45" placeholder="Login">
                </div>
                <div data-role="fieldcontain" class="ui-hide-label">
                        <label for="mdp">Mot de passe</label>
                        <input id="mdp" type="password" name="mdp" size="30" maxlength="45" placeholder="Mot de passe">
                </div>
                <input type="submit" value="Valider" name="valider">
                <input type="reset" value="Annuler" name="annuler">
        </form>
    </div>
    <div data-role="footer" data-position="fixed">
        <h4>Pied de page</h4>
    </div>
</div>
<div data-role="dialog" id="mon_dialog_info">
    <div data-role="header">
        <h1>Informations</h1>
    </div>
    <div data-role="content">
        <p style="text-align: center;">Vous devez vous identifier avec le login et mot de passe reçus par courrier électronique.
            <br/>
            Merci.</p>
    </div>
</div>
</body>
</html>