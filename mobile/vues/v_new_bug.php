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
                <h4>Signalement d'un nouveau bug</h4>
                <form name="new_bug" method="POST" action="index.php?uc=dash&action=nouveau" data-ajax="false" enctype="multipart/form-data">
                    <fieldset>
                        <p>
                            <label for="objet">Objet : </label>
                            <input id="objet" type="text" name="objet" size="50" maxlength="50">
                        </p>
                        <p>
                            <label for="libelle">Description du problème : </label>
                            <textarea id="libelle" name="libelle" size="500" maxlength="500"></textarea>
                        </p>
                        <p>
                            <label for="apps">Application(s) concernées : </label>
                            <select id="apps" name="apps[]" data-shadow='false' required="true">
                                <?php
                                foreach($the_products as $p){
                                    echo '<option value="'.$p->getId().'">'.$p->getName().'</option>';
                                }
                                ?>
                            </select>
                        </p>

                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                        Fichier : <input type="file" name="avatar">
                        <p>
                            <input type="submit" value="Valider" name="valider">
                            <input type="reset" value="Annuler" name="annuler">
                        </p>
                    </fieldset>
                </form>
            </div>
        </div>
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
