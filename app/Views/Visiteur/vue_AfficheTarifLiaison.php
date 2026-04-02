<h2><?php echo $TitreDeLaPage ?><h2>

<?php
echo "<table class='table table-striped'>";
echo "
<tr>
<th>Catégorie</th>
<th>Type</th>
<th></th>
</tr>";
foreach ($lestarifs as $untarif)
{
    echo "<TR>";
    echo "<TD>".$untarif->LETCATCAT. " " .$untarif->LIBCAT. "</TD><TD>"
    .$untarif->LETCATTYP. $untarif->NOTYPE . " - ". $untarif->LIBTYP ."</TD><TD>"
    .$untarif->DATEDEPART."</TD><TD>"
    .$untarif->DATEARRIVEE."</TD><TD>"
    .$untarif->TARIF."</TD>";
    echo "</TR>";
}
echo "</table>";