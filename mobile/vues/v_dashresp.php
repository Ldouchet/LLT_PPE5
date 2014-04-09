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
            ?>
            <div data-role="collapsible-set" data-theme="c" data-content-theme="c">
                <div id="liste_tickets">
                    <div data-role="collapsible" data-collapsed="true">
    <h2>Tickets en cours</h2>
    <p>
    <div class="ui-grid-d">
        <div class="ui-block-a"></div> <div class="ui-block-b">Date création</div> <div class="ui-block-c"> Délai </div> <div class="ui-block-d">Technicien</div> <div class="ui-block-e">Produit concernés</div><div class="ui-block-f">Description</div>
    <?php
    foreach ($the_bugs as $bug) {
        if ($bug->getStatus() == "OPEN"){
            if ($bug->getEngineer() != null){
                $engineer = $bug->getEngineer()->getName();
            }else{
                $engineer = "non affecté";
            }

            echo "<div class='ui-block-a'><img src='../images/en_cours.png' width='30px' height='30px'/></div>";
            echo "<div class='ui-block-b'> Création: ".$bug->getCreated()->format('d.m.Y')."</div>";

            if ($bug->getDelai() != null){
                echo "<div class='ui-block-c'> Délai: ".$bug->getDelai()->format('d.m.Y')."</div>";
            }

            echo "<div class='ui-block-d'> affecté à : ".$engineer."</div>";
            echo "<div class='ui-block-e'> Produit(s) : ";
            foreach ($bug->getProducts() as $product) {
                echo "- ".$product->getName()." "."</div>";
            }
            echo "<div class='ui-block-f'>".$bug->getDescription()."</div>";
        }
    }
    ?>
    </div>
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