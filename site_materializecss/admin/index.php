<?php include '../html/header.php' ?>
<?php include './bdd.php' ?>

<title>Page Admin</title>

<?php include '../html/materialize.php' ?>
<?php

session_name();
session_start();
 if (empty($_SESSION['admin']))
    {
        header('Location: ../login.php');
        exit();
    }
?>
</head>

<body>


<a class="waves-effect waves-light btn grey" href="./logout.php">Déconnexion</a>


<div class="col s12" >
    <div class="center-align">
        <h2 class="header">Création compétences</h2>
        <div class="row">
            <div class="col m3"></div>
                <form method="post" action="bdd.php" class="col s12 m6">
                    <div class="input-group">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <label>Nom competence</label>
                        <input type="text" name="nom_competences" value="">
                    </div>
                    <div class="input-group">
                        <label>Niveau</label>
                        <input type="number" name="niveau" value="">
                    </div>
                    <div class="input-group">
                        <?php if ($update == true) { ?>
                            <button class="btn" type="submit" name="update_competences" >Modifier</button>
                        <?php } else { ?>
                            <button class="btn" type="submit" name="save_competences" >Ajouter la compétence</button>
                        <?php } ?>
                    </div>
                </form>
            <div class="col m3"></div>
        </div>
    </div>

</div>


<?php

while($competence = $competences->fetch())
{
    echo '<p>' . $competence['nom_competences'] . ' - ' . $competence['niveau'] . '</p>';
?>
    <a href="index.php?edit_competences=<?php echo $competence['id_competences']; ?>" >Modifier</a>
    <a href="bdd.php?del_competences=<?php echo $competence['id_competences']; ?>" >Supprimer</a>

    <?php
}

?>







<div class="col s12" >
    <div class="center-align">
        <h2 class="header">Création diplômes</h2>
        <div class="row">
            <div class="col m3"></div>
            <form method="post" action="bdd.php" class="col s12 m6">
                <div class="input-group">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label>Nom diplomes</label>
                    <input type="text" name="nom_diplomes" value="">
                </div>
                <div class="input-group">
                    <label>Date obtention</label>
                    <input type="text" name="date_obtention" value="">
                </div>
                <div class="input-group">
                    <label>Complement</label>
                    <input type="text" name="complement" value="">
                </div>
                <div class="input-group">
                    <?php if ($update == true) { ?>
                        <button class="btn" type="submit" name="update_diplomes" >Modifier</button>
                    <?php } else { ?>
                        <button class="btn" type="submit" name="save_diplomes" >Ajouter le diplôme</button>
                    <?php } ?>
                </div>
            </form>
            <div class="col m3"></div>
        </div>
    </div>

</div>

<?php

while($diplomes = $formations->fetch())
{
    echo '<p>' . $diplomes['nom_diplome'] . ' - ' . $diplomes['date_obtention'] . ' - ' . $diplomes['complement'] . '</p>';
    ?>
    <a href="index.php?edit_diplomes=<?php echo $diplomes['id_formation']; ?>" >Modifier</a>
    <a href="bdd.php?del_diplomes=<?php echo $diplomes['id_formation']; ?>" >Supprimer</a>

    <?php
}

?>




<div class="col s12" >
    <div class="center-align">
        <h2 class="header">Création expérience pro</h2>
        <div class="row">
            <div class="col m3"></div>
            <form method="post" action="bdd.php" class="col s12 m6">
                <div class="input-group">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label>Nom travail</label>
                    <input type="text" name="nom_travail" value="">
                </div>
                <div class="input-group">
                    <label>Date début</label>
                    <input type="text" name="date_debut" value="">
                </div>
                <div class="input-group">
                    <label>Date fin</label>
                    <input type="text" name="date_fin" value="">
                </div>
                <div class="input-group">
                    <label>Descritif</label>
                    <input type="text" name="descriptif" value="">
                </div>
                <div class="input-group">
                    <label>Nom entreprise</label>
                    <input type="text" name="nom_entreprise" value="">
                </div>
                <div class="input-group">
                    <?php if ($update == true) { ?>
                        <button class="btn" type="submit" name="update_expe" >Modifier</button>
                    <?php } else { ?>
                        <button class="btn" type="submit" name="save_expe" >Ajouter l'expérience pro</button>
                    <?php } ?>
                </div>
            </form>
            <div class="col m3"></div>
        </div>
    </div>

</div>

<?php

while($expe = $experiences->fetch())
{
    echo '<p>' . $expe['nom_entreprise'] . ' - ' . $expe['nom_travail'] . ' - ' . $expe['date_debut'] . ' - ' . $expe['date_fin'] . ' - ' . $expe['descriptif'] . '</p>';
    ?>
    <a href="index.php?edit_expe=<?php echo $expe['id_experience']; ?>" >Modifier</a>
    <a href="bdd.php?del_expe=<?php echo $expe['id_experience']; ?>" >Supprimer</a>

    <?php
}

?>







<div class="col s12" >
    <div class="center-align">
        <h2 class="header">Création projets</h2>
        <div class="row">
            <div class="col m3"></div>
            <form method="post" action="bdd.php" class="col s12 m6">
                <div class="input-group">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label>Nom projet</label>
                    <input type="text" name="nom_projet" value="">
                </div>
                <div class="input-group">
                    <label>Lien vers git ou autre</label>
                    <input type="text" name="lien" value="">
                </div>
                <div class="input-group">
                    <label>Lien donnant sur une photo</label>
                    <input type="text" name="photo" value="">
                </div>
                <div class="input-group">
                    <label>Descriptif</label>
                    <input type="text" name="descriptif" value="">
                </div>
                <div class="input-group">
                    <?php if ($update == true) { ?>
                        <button class="btn" type="submit" name="update_projet" >Modifier</button>
                    <?php } else { ?>
                        <button class="btn" type="submit" name="save_projet" >Ajouter l'expérience pro</button>
                    <?php } ?>
                </div>
            </form>
            <div class="col m3"></div>
        </div>
    </div>

</div>

<?php

while($projet = $projets->fetch())
{
echo '<p>' . $projet['nom_projet'] . ' - ' . $projet['lien'] . ' - ' . $projet['photo'] . ' - ' . $projet['descriptif'] . '</p>';
?>
<a href="index.php?edit_projet=<?php echo $projet['id_projet']; ?>" >Modifier</a>
<a href="bdd.php?del_projet=<?php echo $projet['id_projet']; ?>" >Supprimer</a>

<?php
}

?>




<div class="col s12" >
    <div class="center-align">
        <h2 class="header">Création loisir</h2>
        <div class="row">
            <div class="col m3"></div>
            <form method="post" action="bdd.php" class="col s12 m6">
                <div class="input-group">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label>Nom loisir</label>
                    <input type="text" name="nom_loisir" value="">
                </div>
                <div class="input-group">
                    <label>Choisissez votre intérêt pour ce loisir</label>
                    <input type="number" name="niveau" value="">
                </div>
                <div class="input-group">
                    <?php if ($update == true) { ?>
                        <button class="btn" type="submit" name="update_loisir" >Modifier</button>
                    <?php } else { ?>
                        <button class="btn" type="submit" name="save_loisir" >Ajouter votre loisir</button>
                    <?php } ?>
                </div>
            </form>
            <div class="col m3"></div>
        </div>
    </div>

</div>

<?php

while($loisir = $loisirs->fetch())
{
    echo '<p>' . $loisir['nom'] . ' - ' . $loisir['niveau'] . '</p>';
    ?>
    <a href="index.php?edit_loisir=<?php echo $projet['id_loisir']; ?>" >Modifier</a>
    <a href="bdd.php?del_loisir=<?php echo $projet['id_loisir']; ?>" >Supprimer</a>

    <?php
}

?>


<div class="col s12" >
    <div class="center-align">
        <h2 class="header">Mails</h2>
        <div class="row">
        </div>
    </div>
</div>






<?php

while($mails = $mail->fetch())
{
    echo '<p>' . $mails['nom'] . ' - ' . $mails['prenom'] . ' - ' . $mails['adresse_mail'] . ' - ' . $mails['objet_mail'] . ' - ' . $mails['contenue'] . '</p>';
    ?>
    <a href="bdd.php?del_mail=<?php echo $mails['id_mail']; ?>" >Supprimer</a>
    <?php
}

?>




</body>
</html>