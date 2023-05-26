<?php


if (isset($_POST["btnValider"])) {
    MatchModifier($_GET["id"],$_POST["date_match"],$_POST["heure_match"],$_POST["equipe1"],$_POST["equipe2"],$_POST["arbitreP"],$_POST["arbitreS"]);
    echo "<h1> Match Modifié !</h1>";
}


?>
<div id="tabl">
<table id="ta">
 Gestions des Matchs
<tr>
<th>Date du Match</th>
<th>Heure du Match</th>
<th>Équipe 1</th>
<th>Équipe 2</th>
<th>Arbitre Primaire</th>
<th>Arbitre Secondaire</th>
<th>Modifier</th>
</tr>
<?php

$listematch = selectMatch();
$listeEquipe=selectEquipe();
$listeArbitre=selectArbitre();
foreach($listematch as $nummatch){
    ?> 
    <form method="POST" action="./index.php?action=supprimer&id="> 
    <tr>
    <input type="hidden" name="id" value="<?php echo $nummatch["num_match"]; ?>">
    <td><center><?php echo $nummatch["date_match"];?></center></td>
    <td><center><?php echo $nummatch["heure_match"];?></center></td>
    <td><center><?php echo $nummatch["equipe1"];?></center></td>
    <td><center><?php echo $nummatch["equipe2"];?></center></td>
    <td><center><?php echo $nummatch["arbitreP"];?></center></td>
    <td><center><?php echo $nummatch["arbitreS"];?></center></td>
    <td><center><a href="index.php?action=modifier&id=<?php echo $nummatch['num_match'];?>">Modifier</a></td>
    </tr>
    </form>
    
    <?php
}



if (isset($_GET['id'])) {
    $idma=$_GET["id"];
    $infomatch=selectMatchId($idma);
    ?> 
    <form method="POST" action="./index.php?action=modifier&id=<?php echo $idma; ?>">
    <tr>

                <td><input type='date' name='date_match' value="<?php echo $infomatch["date_match"]; ?>"></td>
                <td><input type='time' name='heure_match' value="<?php echo $infomatch["heure_match"]; ?>"></td>

                <td>
    <select name="equipe1">
        <option selected disabled>Sélectionnez une équipe</option>
        <?php
        foreach ($listeEquipe as $equipe) {
            $selected = ($equipe['num_equipe'] == $infomatch["equipe1"]) ? 'selected' : '';
            ?>
            <option value="<?php echo $equipe['num_equipe']; ?>" <?php echo $selected; ?>><?php echo $equipe['nom_equipe']; ?></option>
            <?php
        }
        ?>
    </select>
</td>
                </td>
                <td>
    <select name="equipe2">
        <option selected disabled>Sélectionnez une équipe</option>
        <?php
        foreach ($listeEquipe as $equipe) {
            $selected = ($equipe['num_equipe'] == $infomatch["equipe2"]) ? 'selected' : '';
            ?>
            <option value="<?php echo $equipe['num_equipe']; ?>" <?php echo $selected; ?>><?php echo $equipe['nom_equipe']; ?></option>
            <?php
        }
        ?>
    </select>
</td>
                
                
                
<td>
    <select name="arbitreP">
        <option selected disabled>Sélectionnez un arbitre</option>
        <?php
        foreach ($listeArbitre as $arbitre) {
            $selected = ($arbitre['num_arbitre'] == $infoarbitre["arbitreP"]) ? 'selected' : '';
            ?>
            <option value="<?php echo $arbitre['num_arbitre']; ?>" <?php echo $selected; ?>><?php echo $arbitre['nom_arbitre']; ?></option>
            <?php
        }
        ?>
    </select>
</td>
<td>
    <select name="arbitreS">
        <option selected disabled>Sélectionnez un arbitre</option>
        <?php
        foreach ($listeArbitre as $arbitre) {
            $selected = ($arbitre['num_arbitre'] == $infoarbitre["arbitreS"]) ? 'selected' : '';
            ?>
            <option value="<?php echo $arbitre['num_arbitre']; ?>" <?php echo $selected; ?>><?php echo $arbitre['nom_arbitre']; ?></option>
            <?php
        }
        ?>
    </select>
</td>

                <td><input type="submit" name="btnValider" value="VALIDER"></td>

    </tr>
    </form>
    
    <?php
}

?>
</table>
</div>


