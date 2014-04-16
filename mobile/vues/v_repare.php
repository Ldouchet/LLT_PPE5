<form name="repare" method="POST" data-ajax="false" action="index.php?uc=dash&action=repare" enctype="multipart/form-data">
    <a id='lnkDialog' href="#ticket_dialog" data-transition="flip" style='display:none;'></a>
    <div data-role="page">
        <div data-role="header">
            <?php
            echo '<table>';
            echo '<tr>';
            echo "<td><a href='index.php?uc=dash' class='ui-btn ui-corner-all ui-icon-bullets ui-btn-icon-notext'/></a></td>";
            echo "<td><a href='index.php?uc=deconnexion' class='ui-btn ui-corner-all ui-btn-icon-right ui-btn-b ui-icon-power ui-btn-icon-notext'/></a></td>";
            echo '</table>';
            echo '</tr>';
            ?>
        </div>
        <div data-role="content">
            <h4>Reparation d'un bug</h4>
                <fieldset>
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
        </div>
    </div>
</form>
    <div data-role="footer" data-position="fixed">
        <h4>Pied de page</h4>
    </div>

    <div data-role="dialog" id="ticket_dialog">
        <div data-role="header">
            <h1>Detail du ticket <div id="id_ticket"></div></h1>
        </div>
        <div data-role="content">
            <div id="descri_ticket"></div>
            <hr/>
            <div id="solution_ticket"></div>
        </div>
    </div>