<a id='lnkDialog' href="#ticket_dialog" data-transition="flip" style='display:none;'></a>
    <div data-role="page">
        <div data-role="header">
            <h1>En-tête</h1>
        </div>
        <div data-role="content">
            <h4>Bienvenue sur votre console de gestion</h4>
            <?php
                echo "<a href='index.php?uc=dash&action=assign' class='ui-btn ui-shadow ui-corner-all ui-icon-gear ui-btn-icon-notext ui-btn-inline'/></a>";
                echo "<a href='index.php?uc=dash&action=delete' class='ui-btn ui-shadow ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-inline'/></a>";
                echo "<a href='index.php?uc=deconnexion' class='ui-btn ui-shadow ui-corner-all ui-icon-power ui-btn-icon-notext ui-btn-inline'/></a>";
            ?>
            <div data-role="collapsible-set" data-theme="c" data-content-theme="c">
                <div id="liste_tickets">
                    <div data-role="collapsible" data-collapsed="true">
    <h2>Tickets en cours</h2>
    <p>
    <table>
        <tr><th></th></th><th>Date création</th><th>délai</th><th>Technicien</th><th>Produit concernés</th><th>Description</th></tr>
    <?php
    foreach ($the_bugs as $bug) {
        if ($bug->getStatus() == "OPEN"){
            if ($bug->getEngineer() != null){
                $engineer = $bug->getEngineer()->getName();
            }else{
                $engineer = "non affecté";
            }

            echo "<tr></tr><td><img src='../images/en_cours.png' width='30px' height='30px'/></td>";
            echo "<td> Création: ".$bug->getCreated()->format('d.m.Y')."</td>";

            if ($bug->getDelai() != null){
                echo "<td>  ".$bug->getDelai()->format('d.m.Y')."</td>";
            }

            echo "<td> ".$engineer."</td>";
            echo "<td> ";
            foreach ($bug->getProducts() as $product) {
                echo " ".$product->getName()." "."</td>";
            }
            echo "<td>".$bug->getDescription()."</td></tr>";
        }
    }
    ?>
    </table>
    </p>
</div>


    <div data-role="collapsible">
    <h2>Tickets fermés</h2>
        <p>
        <table><tr><th></th><th>Numéro</th><th>Date</th><th>Technicien</th><th>Produits concernés</th></tr>
    <?php
    foreach ($the_bugs as $bug) {
        if ($bug->getStatus() == "CLOSE"){
            if ($bug->getEngineer() != null){
                $engineer = $bug->getEngineer()->getName();
            }else{
                $engineer = "non affecté";
            }
            echo "<tr>";
            echo "<td><img src='../images/ferme.png' width='30px' height='30px'/></td>";
            echo "<td class='colonnedate'>".$bug->getCreated()->format('d.m.Y')."</td>";
            echo "<td class='colonnetech'> affecté à : ".$engineer."</td>";
            echo "<td> Produit(s) : ";
            foreach ($bug->getProducts() as $product) {
                echo "- ".$product->getName()." ";
            }
            echo "</td>";
            echo "<td class='colonnedescrip'>".$bug->getDescription()."</td>";
            echo "</tr>";
        }
    }
    ?>

            </table>
        </p>

</div>
                </div>
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