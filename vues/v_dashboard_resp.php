<form name="assign" method="POST" action="index.php?uc=dash&action=assign">
    <div id="liste_tickets">
        <h2>Tickets en cours</h2>
        <?php
        /**
         * Created by JetBrains PhpStorm.
         * User: ldouchet
         * Date: 21/03/14
         * Time: 16:01
         * To change this template use File | Settings | File Templates.
         */

        foreach ($the_bugs as $bug) {
            if ($bug->getEngineer() != null){
                $engineer = $bug->getEngineer()->getName();
            }else{
                $engineer = "non affecté";
            }
            if ($bug->getStatus() === "OPEN"){
                echo "<ul>";
                echo "<li><img src='./images/en_cours.png' width='30px' height='30px'/></li>";
                echo "<li>".$bug->getCreated()->format('d.m.Y')."</li>";
                echo "<li> affecté à : </li>";
                ?>
                <select id="lst" name="lst">
                    <?php
                    foreach($the_techs as $tech){
                        echo '<option value="'.$tech->getId().'">'.$tech->getName().'</option>';
                    }
                    ?>
                </select>
                <?php
                //echo "<li> affecté à : ".$engineer."</li>";
                echo "<li> Produit(s) : ";
                foreach ($bug->getProducts() as $product) {
                    echo "- ".$product->getName()." ";
                }
                echo "</li>";
                echo "<li>".$bug->getDescription()."</li>";
                echo '<input type="submit" name="attribuer" value="Attribuer" >';
                echo '<input type="hidden"  name="id" value="'.$bug->getId().'">';
                echo "</ul>";
            }
        }
        ?>
        </div>
    </div>
</form>