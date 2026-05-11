<h2><?php echo $TitreDeLaPage ?><h2>
<div class="card-body shadow d-flex justify-content-center align-items-center" style="text-align: center; height: 600px; width: 500px; margin: auto; margin-top: 100px;">
    <?php
    echo "<h1>Reservation</h1><br>";
    foreach($lestrajets as $untrajet)
    {
        echo "<h3>Liaison:" . $untrajet->nomportdep . "-" . $untrajet->nomportarr ."</H3><BR>";
        echo "<h3>Traversée n°" . $untrajet->NOTRAVERSEE . ".";
    }
   // echo "<h3>Liaison:" . $lestrajets->nomportdep . "-" . $lestrajets->nomportarr ."</H3><BR>";
   // echo "<h3>Traversée n°" . $untrajet->NOTRAVERSEE . ".";
    ?>

</div>