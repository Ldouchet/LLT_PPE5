<form name="repare" method="POST" action="index.php?uc=dash&action=rapport">
    <fieldset>
    <legend>Reparation d'un bug</legend>
    <p>
        <label for="objet">Objet : </label>
        <input id="objet" type="text" name="objet" size="50" maxlength="50">
    </p>
    <p>
        <label for="compte">Compte Rendu : </label>
        <textarea id="compte" name="compte" size="500" maxlength="500"></textarea>
    </p>
    <p>
        <input type="submit" value="Valider" name="valider">
        <input type="reset" value="Annuler" name="annuler">
    </p>
    </fieldset>
</form>