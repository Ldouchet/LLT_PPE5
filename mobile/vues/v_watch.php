<!--/**
 * Created by PhpStorm.
 * User: pc thomas
 * Date: 18/04/14
 * Time: 22:51
 */-->
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
        <div id="liste_tickets_id">
        <p>

        <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive" data-column-btn-theme="b" data-column-btn-text="Colonnes" data-column-popup-theme="a">
            <thead>
               <tr class="ui-bar-d">
                 <th data-priority="1">Date Création</th>
                 <th data-priority="2">Produits concernés</th>
                 <th data-priority="3">Titre</th>
                 <th data-priority="4">Description</th>
               </tr>
            </thead>
            <tbody>
                <?php
                /*var_dump($the_bugs);              Récupère bien les données du bug mais ne passe pas dans la boucle
                exit;*/
                foreach ($the_bugs as $bug) {
                    if ($bug->getEngineer() != null){
                        $engineer = $bug->getEngineer()->getName();
                    }else{
                        $engineer = "non affecté";
                    }
                    if ($bug->getStatus() === "CLOSE"){
                        echo "<tr>";
                        echo "<td>".$bug->getCreated()->format('d.m.Y')."</td>";
                        echo "<td>".$engineer."</td>";
                        echo "<td>";
                        foreach ($bug->getProducts() as $product) {
                            echo $product->getName();
                        }
                        echo "</td>";
                        echo "<td>".$bug->getResume()."</td>";
                        echo "<td>".$bug->getDescription()."</td>";
                        echo "</tr>";

                    }
                }
                echo "Petit problème voir code"
                ?>
            </tbody>
        </table>
        </p>
        </div>
    </div>
</div>
<?php
//Résu var_dump

/*object(Bug)[89]
  protected 'id' => int 68
  protected 'resume' => string 'Test 58' (length=7)
  protected 'description' => string 'Test' (length=4)
  protected 'created' =>
    object(DateTime)[86]
      public 'date' => string '2014-04-18 13:49:30' (length=19)
      public 'timezone_type' => int 3
      public 'timezone' => string 'UTC' (length=3)
  protected 'status' => string 'CLOSE' (length=5)
  protected 'engineer' =>
    object(DoctrineProxies\__CG__\User)[115]
      public '__initializer__' =>
        object(Closure)[99]
      public '__cloner__' =>
        object(Closure)[100]
      public '__isInitialized__' => boolean false
      protected 'id' => int 2
      protected 'name' => null
      protected 'prenom' => null
      protected 'fonction' => null
      protected 'login' => null
      protected 'mdp' => null
      protected 'courriel' => null
      protected 'reportedBugs' => null
      protected 'assignedBugs' => null
      protected 'leClub' => null
  protected 'reporter' =>
    object(DoctrineProxies\__CG__\User)[113]
      public '__initializer__' =>
        object(Closure)[99]
      public '__cloner__' =>
        object(Closure)[100]
      public '__isInitialized__' => boolean false
      protected 'id' => int 3
      protected 'name' => null
      protected 'prenom' => null
      protected 'fonction' => null
      protected 'login' => null
      protected 'mdp' => null
      protected 'courriel' => null
      protected 'reportedBugs' => null
      protected 'assignedBugs' => null
      protected 'leClub' => null*/
?>
