<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h2><?php echo $TitreDeLaPage ?><h2>
</head>
<body>
    <div class="row justify content">
        <div class="card-body shadow col-md-2">
            <?php
            echo "<tr>";
            foreach($lessecteurs as $unsecteur)
            {
                echo "<TD>" . anchor('AfficheHTNumSect/' . $unsecteur->NOSECTEUR, $unsecteur->NOM) . "</TD>" . "<br>";
            }
            echo "</tr>";
            ?>
        </div>
        <div class="col-md-10">
            <div class="card-body shadow">
                <form method="post">
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
                                            echo "<option>" . $unedate->dates . "</option>";
                                        }
                                    }
                                }
                            }
                        ?>      
                    </select>
                    <input type="submit" name="affichertraversees" value="Afficher les traversées">
                </form>
            </div>
            <div class="card-body shadow col-md-10">
                <table class='table table-striped'>
                    <?php 
                    echo "
                    <tr>
                    <th>N°</th>
                    <th>Heure</th>
                    <th>Bateau</th>
                    </tr>";
                    if(isset($_POST['affichertraversees']))
                    {
                        foreach($lestraversees as $unetraversee)
                        {
                            foreach($lesliaisons as $uneliaison)
                            {
                                if($unetraversee->NOLIAISON == $uneliaison->NOLIAISON)
                                {
                                    echo "<tr>";
                                    echo "<td>" . $unetraversee->NOTRAVERSEE . "</td>";
                                    echo "<td>" . $unetraversee->heure . "</td>";
                                    echo "<td>" . $unetraversee->nombateau . "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                    }else
                    {
                        echo '<p> Veuillez choisir une liaison et une date. </p>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>