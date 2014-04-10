<form name="delete" method="POST" action="index.php?uc=dash&action=delete">
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
            <h4>Bienvenue sur votre console de gestion</h4>

            <div data-role="collapsible-set" data-theme="c" data-content-theme="c">
                <div id="liste_tickets_delete">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>Tickets en cours</h3>
                        <p>
                        <table><tr><th></th><th>Date</th><th>Technicien</th><th>Produits concernés</th><th>Descrption</th><th>Supprimer</th></tr>

                            <?php
                                foreach ($the_bugs as $bug) {
                                    if ($bug->getEngineer() != null){
                                        $engineer = $bug->getEngineer()->getName();
                                    }else{
                                        $engineer = "non affecté";
                                    }
                                    if ($bug->getStatus() === "OPEN"){
                                        echo "<tr>";
                                        echo "<td class='colonneimg'><img src='../images/en_cours.png' width='30px' height='30px'/></td>";
                                        echo "<td class='colonnedate'>".$bug->getCreated()->format('d.m.Y')."</td>";
                                        echo "<td class='colonnetech'> affecté à : ".$engineer."</td>";
                                        echo "<td class='colonneprod'> Produit(s) : ";
                                        foreach ($bug->getProducts() as $product) {
                                            echo "- ".$product->getName()." ";
                                        }
                                        echo "</td>";
                                        echo "<td class='colonnedesc'>".$bug->getDescription()."</td>";
                                        echo '<form method="POST" action="#">';
                                        //echo '<input type="submit" name="supprimer" value="Supprimer" >';
                                        echo '<td><button type="submit" value="Supprimer" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-delete ui-btn-icon-notext"></button></td>';
                                        echo '<input type="hidden"  name="id" value="'.$bug->getId().'">';
                                        echo '</form>';
                                        echo "</tr>";
                                    }
                                }
                            ?>
                    </table>
                    </p>
                </div>
            </div>
        </div>
        <div data-role="footer" data-position="fixed">
            <h4>Pied de page</h4>
        </div>
    </div>
</form>


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