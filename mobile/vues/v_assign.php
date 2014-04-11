<a id='lnkDialog' href="#ticket_dialog" data-transition="flip" style='display:none;'></a>
<!-- <form name="assign" method="POST" data-ajax="false" action="index.php?uc=dash&action=assign"> -->

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
            <div id="liste_tickets_assign">
                <div data-role="collapsible" data-collapsed="true">
                    <h3>Tickets en cours</h3>
                    <p>
                    <table><tr><th></th><th>Date</th><th>Technicien</th> <th>Délai</th><th>Produits concernés</th><th></th><th>Descrption</th><th>Attribué</th></tr></table>

        <?php
        foreach ($the_bugs as $bug) {
            if ($bug->getEngineer() == null){
                if ($bug->getEngineer() != null){
                    $engineer = $bug->getEngineer()->getName();
                }else{
                    $engineer = "non affecté";
                }
                if ($bug->getStatus() === "OPEN"){

                    echo '<form name="assign'.$bug->getId().'" method="POST" data-ajax="false" action="index.php?uc=dash&action=assign">';
                    echo "<table><tr>";
                    echo "<td class='colonneimg'><img src='../images/en_cours.png' width='30px' height='30px'/></td>";
                    echo "<td class='colonnedate'>".$bug->getCreated()->format('d.m.Y')."</td>";

                    //echo "<label for='grid-select-1' class='ui-hidden-accessible'>Technicien</label>";
                    echo "<td class='colonneselect'><select id='lst' name='lst' data-shadow='false'>";
                        foreach($the_techs as $tech){
                            echo '<option value="'.$tech->getId().'">'.$tech->getName().'</option>';
                        }
                        foreach($the_resp as $resp){
                            echo '<option value="'.$resp->getId().'">'.$resp->getName().'</option>';
                        }
                    echo "</select></td>";
                    //echo '<input type="date" name="date" placeholder="jj-mm-aa">';
                    echo '<td class="colonnedelai">
                    <input type="date" name="date" data-role="date" placeholder="jj/mm/aaaa"></td>';
                    //echo "<li> affecté à : ".$engineer."</li>";
                    echo "<td class='colonneprod'>";
                    foreach ($bug->getProducts() as $product) {
                        echo " ".$product->getName()." ";
                    }
                    echo "</td>";
                    echo "<td></td><td class='colonnedescr'>".$bug->getDescription()."</td>";
                    //echo '<td><input type="submit" name="attribuer" value="Attribuer" ></td>';
                    echo '<td><button type="submit" name="attribuer" value="attribuer" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-plus ui-btn-icon-notext"></td>';
                    echo '<input type="hidden"  name="id" value="'.$bug->getId().'">';

                    echo "</tr></table>";
                    echo '</form>';
                }
            }
        }
        ?>
    </div>

                </table>
                </p>
            </div>
        </div>
    </div>
<div data-role="footer" data-position="fixed">
    <h4>Pied de page</h4>
</div>
</div>
<!--</form>-->


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