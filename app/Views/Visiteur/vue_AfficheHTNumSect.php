<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h2><?php echo $TitreDeLaPage ?><h2>
</head>
<body>
    <div class="card p-3 mb-5">
        <div class="card-body shadow mb-5" style="width: 400px">
            <?php
            echo "<tr>";
            foreach($lessecteurs as $unsecteur)
            {
                echo "<TD>" . anchor('AfficheHTNumSect/' . $unsecteur->NOSECTEUR, $unsecteur->NOM) . "</TD>" . "<br>";
            }
            echo "</tr>";
            ?>
        </div>
        <div class="card-body shadow" style="width: 1000px">
            <h3>Sélectionner la liaison et la date souhaitée</h3>
            <select name = "liaison">
                <?php
                    if (isset($lesliaisons))
                    {
                        foreach($lesliaisons as $uneliaison)
                        {
                            echo "<option value='" . $uneliaison->NOLIAISON . "'>" . $uneliaison->NOM_DEPART . " - " . $uneliaison->NOM_ARRIVEE . "</option>";
                        }
                    }
                    else
                    {
                        echo "<option>Aucune liaison disponible</option>";
                    }
                ?>
            </select>
            <select name = "date">
                <?php
                    if (isset($lesliaisons))
                    {
                        foreach($lesliaisons as $uneliaison)
                        {
                            foreach($lesdates as $unedate)
                            {
                                if($uneliaison->NOLIAISON == $unedate->NOLIAISON)
                                {
                                    echo "<option>" . $unedate->DATEHEUREDEPART . "</option>";
                                }
                            }
                        }
                    }
                ?>      
            </select>
            <button>Afficher les traversées</button>
        </div>
        </div>
</body>
</html>