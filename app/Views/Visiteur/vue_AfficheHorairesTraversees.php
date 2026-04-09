<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h2><?php echo $TitreDeLaPage ?><h2>
</head>
<body>
    <?php
    echo "<tr>";
    foreach($lessecteurs as $unsecteur)
    {
        echo "<TD>" . anchor('', $unsecteur->NOM) . "</TD>" . "<br>";
    }
    echo "</tr>";
    ?>
</body>
</html>