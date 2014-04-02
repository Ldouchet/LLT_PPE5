<form name="repare" method="POST" action="">
    <fieldset>
    <legend>Reparation d'un bug</legend>
    <p>
        <label for="objet">Objet : </label>
        <input id="objet" type="text" name="objet" size="50" maxlength="50">
    </p>
    <p>
        <label for="resume">Compte Rendu : </label>
        <textarea id="resume" name="resume" size="500" maxlength="500"></textarea>
    </p>
        <p>
            <label for="image">Screen : </label>
            <img src="<?php echo $bug->getScreen(); ?>" width="550" height="350">
        </p>
    <p>
        <input type="submit" value="Valider" name="valider">
        <input type="reset" value="Annuler" name="annuler">
    </p>
        </fieldset>
    </form>