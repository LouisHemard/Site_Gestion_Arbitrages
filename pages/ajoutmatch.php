
<?php

function selectSalle()
{
    $conn = connexionPDO();
    $requete = $conn->prepare("SELECT num_salle, adresse_salle FROM Salle");
    $requete->execute();
    while ($ligne = $requete->fetch(PDO::FETCH_OBJ)) {
        echo "<option value= '$ligne->num_salle'>$ligne->adresse_salle</option>";
    }
}

function selectEquipe1()
{
    $conn = connexionPDO();
    $requete = $conn->prepare("SELECT * FROM Equipe");
    $requete->execute();
    while ($ligne = $requete->fetch(PDO::FETCH_OBJ)) {
        echo "<option value='$ligne->num_equipe'>'$ligne->nom_equipe'</option>";
    }
}

function selectEquipe2()
{
    $conn = connexionPDO();
    $requete = $conn->prepare("SELECT * FROM Equipe");
    $requete->execute();
    while ($ligne = $requete->fetch(PDO::FETCH_OBJ)) {

        echo "<option value='$ligne->num_equipe'>$ligne->nom_equipe</option>";
    }
}

function selectArbitreP()
{
    $conn = connexionPDO();
    $requete = $conn->prepare("SELECT num_arbitre, nom_arbitre FROM Arbitre");
    $requete->execute();
    while ($ligne = $requete->fetch(PDO::FETCH_OBJ)) {
        echo "<option value= '$ligne->num_arbitre'>$ligne->nom_arbitre</option>";
    }
}

function selectArbitreS()
{
    $conn = connexionPDO();
    $requete = $conn->prepare("SELECT num_arbitre, nom_arbitre FROM Arbitre");
    $requete->execute();
    while ($ligne = $requete->fetch(PDO::FETCH_OBJ)) {
        echo "<option value= '$ligne->num_arbitre'>$ligne->nom_arbitre</option>";
    }
}

function insertValider()
{       
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO `Match` VALUES(NULL, :salle, :datematch, :heurematch, :equipe1, :equipe2 , :ArbitreP, :ArbitreS, NULL, NULL)");
        $req->bindValue('salle', $_POST['Salle']);
        $req->bindValue('equipe1', $_POST['Equipe1']);
        $req->bindValue('equipe2', $_POST['Equipe2']);
        $req->bindValue('datematch', $_POST['DateMatch']);
        $req->bindValue('heurematch', $_POST['HeureMatch']);
        $req->bindValue('ArbitreP', $_POST['ArbitreP']);
        $req->bindValue('ArbitreS', $_POST['ArbitreS']);
        $req->execute();
        echo "<h1> Match inseré !</h1>";

    
}
?>


<html>

<head>
    <meta charset="utf-8">
    <title>Information du match</title>
</head>

<body>
    <form method="POST" action="?action=ajoutmatch">
        <fieldset>
            <legend>Entrez les informations sur le match :</legend>
            <p>
                <label for="Salle"> Salle du match :</label>
                <select name="Salle" size="1">
                    <?php
                    selectSalle();
                    ?>
                </select>

                <br/><br/>

                <label for="Equipe 1"> Équipe 1 : </label>
                <select name="Equipe1">
                    <?php
                    selectEquipe1();
                    ?>
                </select>
                <label for="Equipe 2">Équipe 2 :</label>
                <select name="Equipe2">
                    <?php
                    selectEquipe2();
                    ?>
                    </select>

                    <br/><br/>

                <label for="ArbitreP"> Premier Arbitre : </label>
                <select name="ArbitreP">
                    <?php
                    selectArbitreP();
                    ?>
                </select>
                <label for="ArbitreS">Second Arbitre :</label>
                <select name="ArbitreS">
                    <?php
                    selectArbitreS();
                    ?>
                    </select>

                    <br/><br/>

                <label for="DateMatch">Date du match :</label>
                <input type="date" name="DateMatch" >
                    </select>

                    <br/><br/>

                <label for="HeureMatch">Heure du match :</label>
                <input type="time" name="HeureMatch" >
                    </select>

                <br/><br/>

                <button type="submit" name="boutonvalider" value="valider">Valider </button>
                <?php
                    if (isset($_POST['boutonvalider'])) {
                    insertValider();
                    }
                    ?>
            </p>
        </fieldset>
    </form>
</body>
</html>