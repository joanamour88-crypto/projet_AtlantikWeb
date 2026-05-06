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
                    <input type="date" name="datededepart">
                    <input type="submit" name="affichertraversees" value="Afficher les traversées">
                </form>
            </div>
            <div class="card-body shadow col-md-10">
                <table name="lemich" class='table table-striped'>
                    <?php 
                    if(isset($_POST['affichertraversees']))
                    {
                        echo "<tr>
                        <th>N°</th>
                        <th>Heure</th>
                        <th>Bateau</th>";
                        foreach($lescategories as $unecategorie)
                        {
                            echo "<th>" . $unecategorie->LETTRECATEGORIE . " " . $unecategorie->LIBELLE . "</th>";
                        }
                        echo "</tr>";
                        foreach($lestraversees as $unetraversee)
                        {
                            if($_POST['liaison'] == $unetraversee->NOLIAISON and $_POST['datededepart'] == $unetraversee->date)
                            {
                                echo "<tr>";
                                echo "<td>" . $unetraversee->NOTRAVERSEE . "</td>";
                                echo "<td>" . $unetraversee->heure . "</td>";
                                echo "<td>" . $unetraversee->nombateau . "</td>";
                                foreach($lescapasmax as $unecapamax) //erreur a corriger/trouver la solution pour afficher les places disponibles
                                {
                                    if ($unecategorie->LETTRECATEGORIE == $unecapamax->LETTRECATEGORIE and $unetraversee->NOBATEAU == $unecapamax->NOBATEAU)
                                    {
                                        echo "<td>" . $unecapamax->CAPACITEMAX . "</td>";
                                    }
                                    /*
                                    foreach($lesresultats as $unresultat)
                                    {
                                        if ($unecategorie->LETTRECATEGORIE == $unecapamax->LETTRECATEGORIE and $unetraversee->NOBATEAU == $unecapamax->NOBATEAU)
                                        {
                                            echo "<td>" . $unecapamax->CAPACITEMAX . "</td>";
                                        }   
                                    }
                                        */
                                }
                                echo "</tr>";
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