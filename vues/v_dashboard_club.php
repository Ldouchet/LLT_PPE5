<a id='lnkDialog' href="#ticket_dialog" data-transition="flip" style='display:none;'></a>

<div id="liste_tickets">
    <div data-role="collapsible-set" data-theme="b" data-content-theme="a">
        <div id="liste_tickets">
            <div data-role="collapsible" data-collapsed="true">
    <h2>Tickets en cours</h2>
<?php
foreach ($bugs_en_cours as $bug) {
    if ($bug->getEngineer() != null){
        $engineer = $bug->getEngineer()->getName();
    }else{
        $engineer = "non affecté";
    }
    echo "<ul>";
    echo "<li><img src='./images/en_cours.png' width='30px' height='30px'/></li>";
    echo "<li>".$bug->getCreated()->format('d.m.Y')."</li>";
    echo "<li> affecté à : ".$engineer."</li>";
    echo "<li> Produit(s) : ";
    foreach ($bug->getProducts() as $product) {
        echo "- ".$product->getName()." ";
    }
    echo "</li>";
    echo "<li>".$bug->getDescription()."</li>";
    echo "</ul>";
}
?>
        </div>


<div id="liste_tickets">
    <div data-role="collapsible">
    <h2>Tickets fermés</h2>
    <?php
    foreach ($bugs_fermes as $bug) {
        if ($bug->getEngineer() != null){
            $engineer = $bug->getEngineer()->getName();
        }else{
            $engineer = "non affecté";
        }
        echo "<ul>";
        echo "<li><img src='./images/ferme.png' width='30px' height='30px'/></li>";
        echo "<li>".$bug->getCreated()->format('d.m.Y')."</li>";
        echo "<li> affecté à : ".$engineer."</li>";
        echo "<li> Produit(s) : ";
        foreach ($bug->getProducts() as $product) {
            echo "- ".$product->getName()." ";
        }
        echo "</li>";
        echo "<li>".$bug->getDescription()."</li>";
        echo "</ul>";
    }
    ?>
    </div>
</div>
        </div>
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