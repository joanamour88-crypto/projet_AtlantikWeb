<h2><?php echo $TitreDeLaPage ?><h2>
<?php
foreach ($nombreperiode as $uneperiode)
{
    $nbper = $uneperiode->nbperiode;
}
echo "<table class='table table-striped'>";
echo "
<tr>
<th rowspan = 2>Catégorie</th>
<th rowspan = 2>Type</th>
<th colspan=". $nbper . ">Periode</th>
</tr>";
"<tr>";
foreach ($periode as $uneperiode)
{
    echo "<td>" . $uneperiode->DATEDEBUT . "<br>" . $uneperiode->DATEFIN . "</td>";
}
"</tr>";
echo "</table>";







/*
foreach ($lestarifs as $untarif)
{
    echo "<TR>";
    echo "<TD>".$untarif->LETCATCAT. " " .$untarif->LIBCAT. "</TD><TD>"
    .$untarif->LETCATTYP. $untarif->NOTYPE . " - ". $untarif->LIBTYP ."</TD><TD>"
    .$untarif->DATEDEBUT."</TD><TD>"
    .$untarif->DATEFIN."</TD><TD>"
    .$untarif->TARIF."</TD>";
    echo "</TR>";
}
*/
