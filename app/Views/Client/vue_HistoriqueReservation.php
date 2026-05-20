<div>
    <table name="historique" class='table table-striped'>
        <?php 
        if(isset($leshistoriques))
        {
            ?>
            <tr>
            <th>N°</th>
            <th>Date de réservation</th>
            <th>Port de départ</th>
            <th>Port d'arrivée</th>
            <th>Date de départ</th>
            <th>Montant total</th>
            <th>Payé</th>
            </tr>
            <?php
            //var_dump($leshistoriques);
            //die();
            foreach($leshistoriques as $unehistorique)
            {
                echo "<tr>";
                echo "<td>" . $unehistorique->NORESERVATION . "</td>";
                echo "<td>" . $unehistorique->DATEHEURE . "</td>";
                echo "<td>" . $unehistorique->portdep . "</td>";
                echo "<td>" . $unehistorique->portarr . "</td>";
                echo "<td>" . $unehistorique->DATEHEUREDEPART . "</td>";
                echo "<td>" . $unehistorique->MONTANTTOTAL . "€</td>";
                if ($unehistorique->PAYE == 1)
                {
                    echo "<td>Oui</td>";
                }else
                {
                    echo "<td>Non</td>";
                }
                
                echo "</tr>";
            }
        }
        else
        {
            echo '<p> Vous n\'avez aucune réservation. </p>';
        }
        ?>
    </table>
    <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href=<?= $pager ?>>Previous</a></li>
        <li class="page-item"><a class="page-link" href=<?= $pager ?>>1</a></li>
        <li class="page-item"><a class="page-link" href=<?= $pager ?>>2</a></li>
        <li class="page-item"><a class="page-link" href=<?= $pager ?>>3</a></li>
        <li class="page-item"><a class="page-link" href=<?= $pager ?>>Next</a></li>
    </ul>
</div>