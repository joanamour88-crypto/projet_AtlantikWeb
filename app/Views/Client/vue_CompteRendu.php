<div class="card p-2 mb-2 shadow d-flex justify-content-center bg-info align-items-center" style="text-align: center; height: 800px; width: 1000px; margin: auto; margin-top: 50px;">
    <?php
    echo "<h1 class='text-light'>Compte Rendu</h1>";
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
        $session = session();
        echo "<h3>Nom: " . $infosclient->NOM . "</h3>";
        echo "<h3>Adresse: " . $infosclient->ADRESSE . "</h3>";
        echo "<h3>Code postal: " . $infosclient->CODEPOSTAL . " / Ville: " . $infosclient->VILLE . "</h3>";
        $session->set('noclient', $infosclient->NOCLIENT);
        ?>
    </div>
    <div class="card p-2 mb-2 shadow d-flex justify-content-center align-items-center" style="text-align: center; height: 400px; width: 900px; margin: auto;">
        <?php
            echo "<h3>votre numero de reservation est : " . $noreservation . "</h3>";
            foreach($lesreserves as $unereserve)
            {
                echo "<h3>" . $unereserve->LIBELLE . " : " . $unereserve->QUANTITERESERVEE . "</h3>";
            }
            foreach($lesreserves as $unereserve)
            {
                echo "<h3> Le montant total est de : " . $unereserve->MONTANTTOTAL . " €</h3>";
                break;
            }

        ?>
    </div>
</div>