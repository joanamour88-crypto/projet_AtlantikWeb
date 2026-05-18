<h2><?php echo $TitreDeLaPage ?><h2>
<div class="card p-2 mb-2 shadow d-flex justify-content-center bg-primary align-items-center" style="text-align: center; height: 1100px; width: 1000px; margin: auto; margin-top: 50px;">
    <?php
    echo "<h1 class='text-light'>Reservation</h1>";
    echo "<br>";?>
    <div class="card p-2 mb-2 shadow d-flex justify-content-center align-items-center" style="text-align: center; height: 150px; width: 900px; margin: auto;">
        <?php
        echo "<h3>Traversée n°" . $lestrajets->NOTRAVERSEE . "</h3>";
        echo "<h3>Liaison:" . $lestrajets->nomportdep . "-" . $lestrajets->nomportarr ."</h3>";
        echo "<h3>Départ: " . $lestrajets->heure . " le " . $lestrajets->datdep ."</h3>";
        ?>
    </div>
    <div class="card p-2 mb-2 shadow" style="text-align: center; height: 200px; width: 900px;">
        <?php
        if (isset($_SESSION['MEL']))
        {
            echo "<h3>Nom: " . $infosclient->NOM . "</h3>";
            echo "<h3>Adresse: " . $infosclient->ADRESSE . "</h3>";
            echo "<h3>Code postal: " . $infosclient->CODEPOSTAL . " / Ville: " . $infosclient->VILLE . "</h3>";
        }
        else
        {
            echo "<h3>Veuillez vous connecter pour avoir accès aux réservations !</h3>";
        }   
        ?>
    </div>
    <div class="card p-2 mb-2 shadow d-flex justify-content-center align-items-center" style="text-align: center; height: 900px; width: 900px; margin: auto;">
        <table name="reservation" class='table table-striped'>
            <?php
            echo "<tr>
            <th>Libellé</th>
            <th>Tarif</th>
            <th>Quantité</th>
            </tr>";
            $i = 0;
                foreach($lestarifs as $untarif)
                {
                    echo "<tr>";
                    echo "<th>" . $untarif->libelle . "</th>";
                    echo "<th name='QuantitéTarif[$i][tarif]'>" . $untarif->TARIF . " €" . "</th>
                    <th><input type='number' name='QuantitéTarif[$i][quantite]' size='3' pattern='[0-9]+' required /></th>";
                    echo "</tr>";
                    $i += 1;
                }
            ?>
        </table>
    </div>
    <div>
        <button type="submit" class="btn btn-light text-primary" onclick="window.location.href='/compterendu'" name="Valide" value="1"> 
        Validé 
        </button>
    </div>
</div>