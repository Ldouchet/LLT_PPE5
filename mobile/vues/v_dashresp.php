<a id='lnkDialog' href="#ticket_dialog" data-transition="flip" style='display:none;'></a>

<div id="liste_tickets">
    <div data-role="page">
        <div data-role="header">
            <h1>En-tête</h1>
        </div>
        <div data-role="content">
            <h4>Bienvenue sur votre console de gestion</h4>

            <div data-role="collapsible-set" data-theme="c" data-content-theme="c">
                <div id="liste_tickets">
                    <div data-role="collapsible" data-collapsed="true">
    <h2>Tickets en cours</h2>

    <p>
    <table><tr><th></th><th>Numéro</th><th>Date</th><th>Technicien</th><th>Produits concernés</th></tr>
    <?php
    foreach ($the_bugs as $bug) {
        if ($bug->getStatus() == "OPEN"){
            if ($bug->getEngineer() != null){
                $engineer = $bug->getEngineer()->getName();
            }else{
                $engineer = "non affecté";
            }
            echo "<tr>";
            echo "<td><img src='../images/en_cours.png' width='30px' height='30px'/></td>";
            echo "<td class='colonnedate'> Création: ".$bug->getCreated()->format('d.m.Y')."</td>";

            if ($bug->getDelai() != null){
                echo "<td class='colonnedelai'> Délai: ".$bug->getDelai()->format('d.m.Y')."</td>";
            }

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