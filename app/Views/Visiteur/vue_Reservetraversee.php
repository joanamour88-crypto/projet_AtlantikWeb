<h2><?php echo $TitreDeLaPage ?><h2>
<div class="card p-2 mb-2 shadow d-flex justify-content-center bg-primary align-items-center" style="text-align: center; height: 1200px; width: 700px; margin: auto; margin-top: 50px;">
    <?php
    echo "<h1 class='text-light'>Reservation</h1>";
    echo "<br>";?>
    <div class="card p-2 mb-2 shadow d-flex justify-content-center align-items-center" style="text-align: center; height: 150px; width: 600px; margin: auto;">
        <?php
        echo "<h3>Traversée n°" . $lestrajets->NOTRAVERSEE . "</h3>";
        echo "<h3>Liaison:" . $lestrajets->nomportdep . "-" . $lestrajets->nomportarr ."</h3>";
        echo "<h3>Départ: " . $lestrajets->heure . " le " . $lestrajets->datdep ."</h3>";
        ?>
    </div>
    <div class="card p-2 mb-2 shadow" style="text-align: center; height: 200px; width: 600px;">
        <?php
        if (isset($_SESSION['MEL']))
        {
            echo "<h3>Nom: " . $infosclient->NOM . "</h3>";
            echo "<h3>Adresse: " . $infosclient->ADRESSE . "</h3>";
            echo "<h3>Code postal: " . $infosclient->CODEPOSTAL . " / Ville: " . $infosclient->VILLE . "</h3>";
        }
        else
        {
            echo "<h3>Veuillez vous connecter pour avoir acces aux reservations !</h3>";
        }   
        ?>
    </div>
    <div class="card p-2 mb-2 shadow d-flex justify-content-center align-items-center" style="text-align: center; height: 800px; width: 600px; margin: auto;">
        <table name="lemich" class='table table-striped'>
            <?php
            echo "<tr>
            <th>Libelle</th>
            <th>Tarif en €</th>
            <th>Quantité</th>
            </tr>";
            $i = 0;
            foreach($lestypes as $untype)
            {
                echo "<tr>
                <th>" . $untype->LIBELLE . "</th>
                <th>tarif</th>
                <th><input size='3' type='text' name='quantité[$i][quantite]' /></th>
                </tr>";
                $i += 1;
            }
            ?>
        </table>
    </div>
    <div>
        <?php
            if(isset($_SESSION['MEL']))
            {
                echo '<button type="button" class="btn btn-light text-primary">Validé</button>';
            }
            else
            {
                echo "<h3>Veuillez vous connecter</h3>";
            }
            
        ?>
    </div>
</div>