<div id="liste_tickets">
    <h2>Tickets en cours</h2>
    <?php
    foreach ($the_bugs as $bug) {
        if ($bug->getStatus() == "OPEN"){
            if ($bug->getEngineer() != null){
                $engineer = $bug->getEngineer()->getName();
            }else{
                $engineer = "non affecté";
            }
            echo "<ul>";
            //echo "<li><img src='./images/en_cours.png' width='30px' height='30px'/></li>";
            echo "<li><a href='index.php?uc=dash&action=repare&id=".$bug->getId()."'><img src='./images/en_cours.png' width='30px' height='30px'/></a></li>";
            //Repare tous les bug même si il lui sont pas attribuer IL FAUT PAS
            echo "<li> Création: ".$bug->getCreated()->format('d.m.Y')."</li>";

            if ($bug->getDelai() != null){
                echo "<li> Délai: ".$bug->getDelai()->format('d.m.Y')."</li>";
            }

            echo "<li> affecté à : ".$engineer."</li>";
            echo "<li> Produit(s) : ";
            foreach ($bug->getProducts() as $product) {
                echo "- ".$product->getName()." ";
            }
            echo "</li>";
            echo "<li>".$bug->getDescription()."</li>";
            echo "</ul>";
        }
    }
    ?>
</div>

<div id="liste_tickets">
    <h2>Tickets fermés</h2>
    <?php
    foreach ($the_bugs as $bug) {
        if ($bug->getStatus() == "CLOSE"){
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
    }
    ?>
</div>