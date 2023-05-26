<?php


if (isset($_GET['nummatch'])) {
    $id= $_GET ['nummatch'];
    deleteSupprime($id);
    echo "<h1> Match supprimé !</h1>";
}


?>
<div id="tabl">
<table id="ta">
 Gestions des Matchs
<tr>
<th>n° du match</th>
<th>Date du Match</th>
<th>Heure du Match</th>
<th>Équipe 1</th>
<th>Équipe 2</th>
<th>Arbitre Primaire</th>
<th>Arbitre Secondaire</th>
<th>Supprimer</th>

</tr>




<?php
$listematch = selectMatch();
foreach($listematch as $nummatch){
    ?> 
    <form method="POST" action="./index.php?action=supprimer&nummatch="> 
    <tr>
    <td><center><?php echo $nummatch["num_match"];?></center></td>
    <td><center><?php echo $nummatch["date_match"];?></center></td>
    <td><center><?php echo $nummatch["heure_match"];?></center></td>
    <td><center><?php echo $nummatch["equipe1"];?></center></td>
    <td><center><?php echo $nummatch["equipe2"];?></center></td>
    <td><center><?php echo $nummatch["arbitreP"];?></center></td>
    <td><center><?php echo $nummatch["arbitreS"];?></center></td>
    <td><center><a href="index.php?action=supprimer&nummatch=<?php echo $nummatch['num_match'];?>">Supprimer</a></td>


 

    </tr>
    </form>
    
    <?php
}
?>
</table>
</div>


