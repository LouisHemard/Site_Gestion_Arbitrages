<?php
function connexionPDO()
{
    $login = "root";
    $mdp = "";
    $bd = "arbitrage_louishemard";
    $serveur = "localhost";

    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}

function selectMatch() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select num_match, adresse_salle, date_match, heure_match, 
        e1.nom_equipe as equipe1, e2.nom_equipe as equipe2, a1.nom_arbitre as arbitreP, 
        a2.nom_arbitre as arbitreS from `Match` m 
        inner join arbitre a1 on m.num_arbitre_p=a1.num_arbitre 
        inner join arbitre a2 on m.num_arbitre_s=a2.num_arbitre
        inner join equipe e1 on m.num_equipe_1=e1.num_equipe 
        inner join equipe e2 on m.num_equipe_2=e2.num_equipe 
        inner join salle on m.num_salle=salle.num_salle");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function selectMatchId($id) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from `Match` where num_match=:id");
        $req->bindValue(':id', $id);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function selectEquipe1Id($id) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from `Match` where num_equipe_1=:id");
        $req->bindValue(':id', $id);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function selectEquipe2Id($id) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from `Match` where num_equipe_2=:id");
        $req->bindValue(':id', $id);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function selectArbitrePId($id) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from `Match` where num_arbitre_p=:id");
        $req->bindValue(':id', $id);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function selectArbitreSId($id) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from `Match` where num_arbitre_s=:id");
        $req->bindValue(':id', $id);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function deleteSupprime($id)
{      
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM `Match` WHERE num_match =:num");
        $req->bindValue(':num', $id);
        $req->execute();
        

    
}



function MatchModifier($id, $date_match, $heure_match, $num_equipe_1, $num_equipe_2, $num_arbitre_p, $num_arbitre_s) {
    try {
           $cnx = connexionPDO();
           $req = $cnx->prepare("UPDATE `Match` SET  date_match = :datematch, heure_match=:heurematch, num_equipe_1 = :equipe1, num_equipe_2 = :equipe2, num_arbitre_p = :arbitreP,num_arbitre_s = :arbitreS WHERE num_match = :id");
           $req->bindValue(':id', $id);
           $req->bindValue(':datematch', $date_match);
           $req->bindValue(':heurematch', $heure_match);
           $req->bindValue(':equipe1', $num_equipe_1);
           $req->bindValue(':equipe2', $num_equipe_2);
           $req->bindValue(':arbitreP', $num_arbitre_p);
           $req->bindValue(':arbitreS', $num_arbitre_s);
           $req->execute();
       }catch (PDOException $e) {
           print "Erreur !: " . $e->getMessage();
           die();
       }
   }



   function selectArbitre() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Arbitre");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

   function selectEquipe() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Equipe");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


?>