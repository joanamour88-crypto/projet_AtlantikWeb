<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h2><?php echo $TitreDeLaPage ?><h2>
</head>
<body>
    <div>
        <?php
        echo "<tr>";
        foreach($lessecteurs as $unsecteur)
        {
            echo "<TD>" . anchor('AfficheHTNumSect/' . $unsecteur->NOSECTEUR, $unsecteur->NOM) . "</TD>" . "<br>";
        }
        echo "</tr>";
        ?>
    </div>
    <div>
    <select name = "couleur ">
        <option value="b"> Blanc </option>
        <option value="v" selected> Vert </option>
        <option value="r"> Rouge </option>
    </select>
    </div>
</body>
</html>