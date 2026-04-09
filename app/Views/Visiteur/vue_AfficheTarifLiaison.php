<h2><?php echo $TitreDeLaPage ?><h2>
<?php
echo "<table class='table table-striped'>";
echo "
<tr>
<th rowspan = 2>Catégorie</th>
<th rowspan = 2>Type</th>
<th colspan = " . count($lesperiodes) . ">Periode</th>
</tr>";
"<tr>";
foreach ($lesperiodes as $uneperiode)
{
    echo "<td>" . $uneperiode->DATEDEBUT . "<br>" . $uneperiode->DATEFIN . "</td>";
}
"</tr>";
foreach ($lescategories as $unecategorie)
{
    foreach($lestypes as $untype)
    {
        if ($untype->LETTRECATEGORIE !== $unecategorie->LETTRECATEGORIE) continue;
        {
            echo "<tr>";
            echo "<td>" . $unecategorie->LETTRECATEGORIE . "<br>" . $unecategorie->LIBELLE . "</td>";
            echo "<td>". $untype->LETTRECATEGORIE . $untype->NOTYPE . "<br>" . $untype->LIBELLE . "</td>";

            foreach($lestarifs as $untarif)
            {
                if ($untarif->LETTRECATEGORIE === $unecategorie->LETTRECATEGORIE && $untarif->NOTYPE === $untype->NOTYPE)
                {
                    foreach ($lesperiodes as $unePeriode)
                    {
                        if ($unePeriode->NOPERIODE == $untarif->NOPERIODE)
                        {
                            echo '<td>' . $untarif->TARIF . ' €</td>';
                        }
                    }
                }
            }
        }
        echo "</tr>"; 
    }
     
}

echo "</table>";

?>





<?php
/*
var_dump($nbper);
die();

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

/*foreach ($lestypes as $untype)
    {
        /*echo "<tr>";
            echo "<td>". $unecategorie->LETTRECATEGORIE . "<br>" . $unecategorie->LIBELLE . "</td>";
            /*echo "<td>" . $untype->LETTRECATEGORIE . $untype->NOTYPE . "<br>" . $untype->LIBELLE . "</td>" ;*/

            /*if ($unecategorie->LETTRECATEGORIE == $untype->LETTRECATEGORIE);
            {
                echo "<td>". $unecategorie->LETTRECATEGORIE . "<br>" . $unecategorie->LIBELLE . "</td>";
                echo "<td>" . $untype->LETTRECATEGORIE . $untype->NOTYPE . "<br>" . $untype->LIBELLE . "</td>" ;
            }*/
            
            /*foreach($lesperiodes as $uneperiode){
                foreach ($lestarifs as $untarif)
                {
                    if ($untarif->NOTYPE === $untype->NOTYPE && $untarif->NOPERIODE === $uneperiode->NOPERIODE) 
                    {  
                            if($uneperiode->NOPERIODE == $untarif->NOPERIODE){
                                echo "<td>" . $untarif->TARIF . "</td>";
                            }
                    }  
                }
           
            
        echo "</tr>";       
    }*/
?>