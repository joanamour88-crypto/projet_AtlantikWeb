<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h2><?php echo $TitreDeLaPage ?><h2>
</head>
<body>
    <div class="card p-3 mb-5">
        <div class="card-body shadow" style="width: 300px">
            <?php
            echo "<tr>";
            foreach($lessecteurs as $unsecteur)
            {
                echo "<TD>" . anchor('AfficheHTNumSect/' . $unsecteur->NOSECTEUR, $unsecteur->NOM) . "</TD>" . "<br>";
            }
            echo "</tr>";
            ?>
        </div>
    </div>
</body>
</html>