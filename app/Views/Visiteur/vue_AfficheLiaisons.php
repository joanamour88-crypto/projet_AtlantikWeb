<h2><?php echo $TitreDeLaPage ?><h2>

<?php
echo "<table class='table table-striped'>";
echo "
<tr>
<th>Secteur</th>
<th>Code Liaison</th>
<th>Distance en milles marin</th>
<th>Port de départ</th>
<th>Port d'arrivée</th>
</tr>";
foreach ($lesliaisons as $uneliaison)
{
    echo "<TR>";
    echo "<TD>".$uneliaison->NOMSECTEUR."</TD><TD>"
    .anchor('voirtarif/' . $uneliaison->NOLIAISON, $uneliaison->NOLIAISON)."</TD><TD>"
    .$uneliaison->DISTANCE."</TD><TD>"
    .$uneliaison->PORTDEPART."</TD><TD>"
    .$uneliaison->PORTARRIVEE."</TD><TD>";
    echo "</TR>";
}
echo "</table>";

