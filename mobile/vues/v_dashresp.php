<a id='lnkDialog' href="#ticket_dialog" data-transition="flip" style='display:none;'></a>
    <div data-role="page">
        <div data-role="header">
            <?php
            echo '<table>';
            echo '<tr>';
            echo "<td><a href='index.php?uc=dash&action=assign' class='ui-btn ui-corner-all ui-icon-gear ui-btn-icon-notext'/></a></td>";
            echo "<td><a href='index.php?uc=dash&action=delete' class='ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext'/></a></td>";
            echo "<td><a href='index.php?uc=dash' class='ui-btn ui-corner-all ui-icon-bullets ui-btn-icon-notext'/></a></td>";
            echo "<td><a href='index.php?uc=deconnexion' class='ui-btn ui-corner-all ui-btn-icon-right ui-btn-b ui-icon-power ui-btn-icon-notext'/></a></td>";
            echo '</table>';
            echo '</tr>';
            ?>
        </div>
        <div data-role="content">
            <h4>Bienvenue sur votre tableau de bord</h4>
            <div data-role="collapsible-set" data-theme="c" data-content-theme="c">
                <div id="liste_tickets">
                    <div data-role="collapsible" data-collapsed="true">
    <h2>Tickets en cours</h2>
    <p>
        <!--<table><tr><th></th><th>Date création</th><th>Délai</th><th>Technicien</th><th>Produit concernés</th><th>Titre</th></tr>-->
    <table data-role="table" id="table-column-toggle" data-mode="columntoggle" class="ui-responsive table-stroke" data-column-btn-text="Colonnes">
        <thead>
            <tr>
                <th></th>
                    <th data-priority="1">Date Création</th>
                    <th data-priority="2">Délai</th>
                    <th data-priority="3">Technicien</th>
                    <th data-priority="4">Produits concernés</th>
                    <th data-priority="5">Titre</th>
            </tr>
        </thead>
    <?php
    foreach ($the_bugs as $bug) {
        if ($bug->getStatus() == "OPEN"){
            if ($bug->getEngineer() != null){
                $engineer = $bug->getEngineer()->getName();
            }else{
                $engineer = "non affecté";
            }

            echo "<tr><td><img src='../images/en_cours.png' width='30px' height='30px'/></td>";
            echo "<td>".$bug->getCreated()->format('d.m.Y')."</td>";

            if ($bug->getDelai() != null){
                echo "<td>  ".$bug->getDelai()->format('d.m.Y')."</td>";
            }else{
                echo "<td> Pas Définie </td>";
            }

            echo "<td> ".$engineer."</td>";
            echo "<td> ";
            foreach ($bug->getProducts() as $product) {
                echo " ".$product->getName()." "."</td>";
            }
            echo "<td>".$bug->getResume()."</td></tr>";
        }
    }
    ?>
    </table>
    </p>
</div>


    <div data-role="collapsible">
    <h2>Tickets fermés</h2>
        <p>
            <!--<table><tr><th></th><th>Date Création</th><th>Technicien</th><th>Produits concernés</th><th>Titre</th></tr>-->
        <table data-role="table" id="table-column-toggle" data-mode="columntoggle" class="ui-responsive table-stroke" data-column-btn-text="Colonnes">
            <thead>
                <tr>
                    <th></th>
                    <th data-priority="1">Date Création</th>
                    <th data-priority="2">Technicien</th>
                    <th data-priority="3">Produits concernés</th>
                    <th data-priority="4">Titre</th>
                </tr>
            </thead>
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
                echo $product->getName();
            }
            echo "</td>";
            echo "<td class='colonnedescrip'>".$bug->getResume()."</td>";
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