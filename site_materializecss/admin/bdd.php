<?php
/*  BDD pour le site en ligne
   $database_host = 'stevendioqelite.mysql.db';
   $database_dbname = 'stevendioqelite';
   $database_user = 'stevendioqelite';
   $database_password = 'Elite14789';
   $database_charset = 'UTF8';
   $database_options = [
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
   ];

   $pdo = new PDO(
       'mysql:host=' . $database_host .
       ';port=' . $database_port .
       ';dbname=' . $database_dbname .
       ';charset=' . $database_charset,
       $database_user,
       $database_password,
       $database_options
   );
*/
?>


<?php

/* BDD localhost */
$database_host = 'localhost';
$database_port = '3306';
$database_dbname = 'cv';
$database_user = 'root';
$database_password = '';
$database_charset = 'UTF8';

$pdo = new PDO(
    'mysql:host=' . $database_host .
    ';port=' . $database_port .
    ';dbname=' . $database_dbname .
    ';charset=' . $database_charset,
    $database_user,
    $database_password
);

$competences = $pdo->query('SELECT * FROM comptences');
$experiences = $pdo->query('SELECT * FROM experience_pro');
$formations = $pdo->query('SELECT * FROM formation');
$loisirs = $pdo->query('SELECT * FROM loisir');
$projets = $pdo->query('SELECT * FROM projet');
$mail = $pdo->query('SELECT * FROM mail_contact');


/* Compétences */

$nom_competences = "";
$niveau_competences = "";
$update = false;
$id = 0;

if (isset($_POST['save_competences'])) {
    $nom_competences = $_POST['nom_competences'];
    $niveau_competences = $_POST['niveau'];
    $id = 0;
    $update = false;

    $pdo->query( 'INSERT INTO comptences (nom_competences, niveau) VALUES (" ' . $nom_competences . ' " , " ' . $niveau_competences . ' " )');
    header('location: index.php');
}


if (isset($_GET['edit_competences'])) {
    $id = $_GET['edit_competences'];
    $update = true;
    $record = $pdo->query( "SELECT * FROM comptences WHERE id_competences=$id");

    if (count($record->fetch()) == 1) {
        $nom_competences = $record['nom_competences'];
        $niveau_competences = $record['niveau_competences'];
    }
}

if (isset($_POST['update_competences'])) {
    $id = $_POST['id'];
    $nom_competences = $_POST['nom_competences'];
    $niveau_competences = $_POST['niveau'];



    $requete = $pdo->prepare( 'UPDATE comptences SET nom_competences = ?, niveau = ? WHERE id_competences = ?');
    $requete->execute([ $nom_competences, $niveau_competences, $id]);
    header('location: index.php');
}

if (isset($_GET['del_competences'])) {
    $id = $_GET['del_competences'];
    $pdo->query( "DELETE FROM comptences WHERE id_competences=$id");
    header('location: index.php');
}





/* Diplômes */


$date_obtention = "";
$nom_diplome = "";
$complement = "";

if (isset($_POST['save_diplomes'])) {
    $nom_diplome = $_POST['nom_diplomes'];
    $date_obtention = $_POST['date_obtention'];
    $complement = $_POST['complement'];
    $id = 0;
    $update = false;

    $pdo->query( 'INSERT INTO formation (date_obtention, nom_diplome, complement) VALUES (" ' . $date_obtention . ' ", " ' . $nom_diplome . ' ", " ' . $complement . ' ")');
    header('location: index.php');
}


if (isset($_GET['edit_diplomes'])) {
    $id = $_GET['edit_diplomes'];
    $update = true;
    $record = $pdo->query( "SELECT * FROM formation WHERE id_formation=$id");

    if (count($record->fetch()) == 1) {
        $date_obtention = $record['date_obtention'];
        $nom_diplome = $record['nom_diplomes'];
        $complement = $record['complement'];
    }
}

if (isset($_POST['update_diplomes'])) {
    $id = $_POST['id'];
    $date_obtention = $_POST['date_obtention'];
    $nom_diplome = $_POST['nom_diplomes'];
    $complement = $_POST['complement'];



    $requete = $pdo->prepare( 'UPDATE formation SET date_obtention = ?, nom_diplome = ?, complement = ? WHERE id_formation = ?');
    $requete->execute([$date_obtention, $nom_diplome, $complement, $id]);
    header('location: index.php');
}

if (isset($_GET['del_diplomes'])) {
    $id = $_GET['del_diplomes'];
    $pdo->query( "DELETE FROM formation WHERE id_formation=$id");
    header('location: index.php');
}





/* Expe pro */

$nom_travail = "";
$date_debut = "";
$date_fin = "";
$descriptif = "";
$nom_entreprise = "";

if (isset($_POST['save_expe'])) {
    $nom_travail = $_POST['nom_travail'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $descriptif = $_POST['descriptif'];
    $nom_entreprise = $_POST['nom_entreprise'];
    $id = 0;
    $update = false;

    $pdo->query( 'INSERT INTO experience_pro (nom_travail, nom_entreprise, date_debut, date_fin, descriptif) VALUES (" ' . $nom_travail . ' ", " ' . $nom_entreprise . ' ", " ' . $date_debut . ' ", " ' . $date_fin . ' ", " ' . $descriptif . ' ")');
    header('location: index.php');
}


if (isset($_GET['edit_expe'])) {
    $id = $_GET['edit_expe'];
    $update = true;
    $record = $pdo->query( "SELECT * FROM experience_pro WHERE id_experience=$id");

    if (count($record->fetch()) == 1) {
        $nom_travail = $record['nom_travail'];
        $date_debut = $record['date_debut'];
        $date_fin = $record['date_fin'];
        $descriptif = $record['descriptif'];
        $nom_entreprise = $record['nom_entreprise'];
    }
}

if (isset($_POST['update_expe'])) {
    $id = $_POST['id'];
    $nom_travail = $_POST['nom_travail'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $descriptif = $_POST['descriptif'];
    $nom_entreprise = $_POST['nom_entreprise'];



    $requete = $pdo->prepare( 'UPDATE experience_pro SET nom_travail = ?, nom_entreprise = ?, date_debut = ?, date_fin = ?, descriptif = ? WHERE id_experience = ?');
    $requete->execute([$nom_travail, $nom_entreprise, $date_debut, $date_fin, $descriptif, $id]);
    header('location: index.php');
}

if (isset($_GET['del_expe'])) {
    $id = $_GET['del_expe'];
    $pdo->query( "DELETE FROM experience_pro WHERE id_experience=$id");
    header('location: index.php');
}










/* Projets */

$nom_projet = "";
$lien = "";
$photo = "";
$descriptif = "";

if (isset($_POST['save_projet'])) {
    $nom_projet = $_POST['nom_projet'];
    $lien = $_POST['lien'];
    $photo = $_POST['photo'];
    $descriptif = $_POST['descriptif'];
    $id = 0;
    $update = false;

    $pdo->query( 'INSERT INTO projet (nom_projet, lien, photo, descriptif) VALUES (" ' . $nom_projet . ' ", " ' . $lien . ' ", " ' . $photo . ' ", " ' . $descriptif . ' ")');
    header('location: index.php');
}


if (isset($_GET['edit_projet'])) {
    $id = $_GET['edit_projet'];
    $update = true;
    $record = $pdo->query( "SELECT * FROM projet WHERE id_projet=$id");

    if (count($record->fetch()) == 1) {
        $nom_projet = $record['nom_projet'];
        $lien = $record['lien'];
        $photo = $record['photo'];
        $descriptif = $record['descriptif'];
    }
}

if (isset($_POST['update_projet'])) {
    $id = $_POST['id'];
    $nom_projet = $_POST['nom_projet'];
    $lien = $_POST['lien'];
    $photo = $_POST['photo'];
    $descriptif = $_POST['descriptif'];



    $requete = $pdo->prepare( 'UPDATE projet SET nom_projet = ?, lien = ?, photo = ?, descriptif = ? WHERE id_projet = ?');
    $requete->execute([$nom_projet, $lien, $photo, $descriptif, $id]);
    header('location: index.php');
}

if (isset($_GET['del_projet'])) {
    $id = $_GET['del_projet'];
    $pdo->query( "DELETE FROM projet WHERE id_projet=$id");
    header('location: index.php');
}



/* Loisir */

$nom_loisir = "";
$niveau = "";

if (isset($_POST['save_loisir'])) {
    $nom_projet = $_POST['nom'];
    $lien = $_POST['niveau'];
    $id = 0;
    $update = false;

    $pdo->query( 'INSERT INTO loisir (nom_loisir, niveau) VALUES (" ' . $nom_loisir . ' ", " ' . $niveau . ' ")');
    header('location: index.php');
}


if (isset($_GET['edit_loisir'])) {
    $id = $_GET['edit_loisir'];
    $update = true;
    $record = $pdo->query( "SELECT * FROM loisir WHERE id_loisir=$id");

    if (count($record->fetch()) == 1) {
        $nom_loisir = $record['nom'];
        $niveau = $record['niveau'];
    }
}

if (isset($_POST['update_loisir'])) {
    $id = $_POST['id'];
    $nom_loisir = $_POST['nom'];
    $niveau = $_POST['niveau'];



    $requete = $pdo->prepare( 'UPDATE projet SET nom_loisir = ?, niveau = ? WHERE id_loisir = ?');
    $requete->execute([$nom_loisir, $niveau, $id]);
    header('location: index.php');
}

if (isset($_GET['del_loisir'])) {
    $id = $_GET['del_loisir'];
    $pdo->query( "DELETE FROM loisir WHERE id_loisir=$id");
    header('location: index.php');
}






$nom = "";
$prenom = "";
$adresse_mail = "";
$objet = "";
$contenue = "";

if (isset($_POST['save_mail'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse_mail = $_POST['adresse_mail'];
    $objet = $_POST['objet'];
    $contenue = $_POST['contenue'];
    $id = 0;

    $pdo->query( 'INSERT INTO mail_contact (nom, prenom, adresse_mail, objet_mail, contenue) VALUES (" ' . $nom . ' ", " ' . $prenom . ' ", " ' . $adresse_mail . ' ", " ' . $objet . ' ", " ' . $contenue . ' " )');
    header('location: ../index.php');
}

if (isset($_GET['del_mail'])) {
    $id = $_GET['del_mail'];
    $pdo->query( "DELETE FROM mail_contact WHERE id_mail=$id");
    header('location: index.php');
}

?>
