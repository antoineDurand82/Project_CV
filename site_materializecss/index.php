<?php include './html/header.php' ?>
<?php include './bdd/bdd.php' ?>
<?php include './admin/bdd.php' ?>

    <title>Le beau CV</title>

<?php include './html/materialize.php' ?>

</head>



<body>

<!-- La navbar -->
<div class="navbar-fixed">
    <div class="col s12 m8 offset-m2 l6 offset-l3">
        <nav class=" blue lighten-1">
            <div class="nav-wrapper " >
                <div class="black-text">
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="#competences" class="black-text">Compétences</a></li>
                        <li><a href="#diplomes" class="black-text">Diplômes</a></li>
                        <li><a href="#experiences" class="black-text">Expériences pro</a></li>
                        <li><a href="#projets" class="black-text">Projets</a></li>
                        <li><a href="#loisirs" class="black-text">Loisirs</a></li>
                        <li><a href="#contactes" class="black-text">Contactez moi</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>



<div class="container">
<!-- Photo profil -->
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row">
                    <div class="col m12 l2">
                        <img src="images/profil.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                    </div>
                    <div class="col m12 l10">
                      <span class="black-text">
                          Bonjour, je suis Durand Antoine et bienvenue sur mon CV. <br>
                          Il a été réalisé durant l'année 2019 lors de ma première année en école d'informatique au campus de Ynov Bordeaux.<br>
                          Vous retrouverez sur ce site, mes différentes compétences, mes diplômes, ainsi que mes loisirs lors de mon temps libre.<br>
                          Et comme vous pouvez le constater, je n'aime vraiment pas le dev web.
                      </span>
                    </div>
                </div>
            </div>
        </div>
</div>


    <div class="divider"></div>

<div class="container">
<!-- Compétences -->

        <div class="col s12" >
            <div class="center-align">
                <h2 class="header"><a name="competences">Compétences</a></h2>


                <div class="card horizontal" >
                    <div class="row" >
                        <?php
                        while($donnees = $competences->fetch())
                        {
                        ?>
                            <div class="col s12 m6 min-width:50%">
                                <div class="card-stacked">
                                    <div class="card-content">
                                        <h4><?= $donnees['nom_competences'] ?><h4>
                                    </div>
                                    <div class="progress">
                                        <div class="determinate" style="width:<?= $donnees['niveau'] ?>%"></div>
                                    </div>
                                    <div >
                                        <p><?= $donnees['niveau'] ?>%</p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>

            </div>
        </div>

     <div class="divider"></div>


    <!-- Diplômes -->

    <div class="col s12" >
        <div class="center-align">
            <h2 class="header"><a name="diplomes">Diplômes</a></h2>


            <div class="card horizontal" >
                <div class="row" >
                    <?php
                    while($diplome = $formations->fetch())
                    {
                    ?>
                        <div class="col s12 m6" >
                            <div class="card-stacked" >
                                <div class="card-content" >
                                    <h4><?= $diplome['nom_diplome'] ?><h4>
                                </div>
                                <div class="row">
                                    <div class="col s12 m2">
                                        <div>
                                            <p><?= $diplome['date_obtention'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col s12 m10">
                                        <div>
                                            <p><?= $diplome['complement'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>


                </div>

            </div>

        </div>
    </div>

    <div class="divider"></div>

<!-- Expériences pro -->

    <div class="col s12">
        <div class="center-align">
            <h2 class="header"><a name="experiences">Expériences professionnelles</a></h2>


            <div class="card horizontal">
                <div class="row">
                    <?php
                    while($exp = $experiences->fetch())
                    {
                    ?>
                    <div class="col s12 m6">
                        <div class="card-stacked">
                            <div class="card-content">
                                <p><?= $exp['nom_travail'] ?></p>
                            </div>

                            <div class="row">
                                <div class="col s12 m2">
                                    <div>
                                        <p><?= $exp['nom_entreprise'] ?></p>
                                    </div>
                                </div>
                                <div class="col s12 m10">
                                    <div class="col s12 m4">
                                        <div>
                                            <p><?= $exp['date_debut'] ?> - <?= $exp['date_fin'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col s12 m6">
                                        <div>
                                            <p><?= $exp['descriptif'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <div class="divider"></div>


<!-- Projets -->

    <div class="col s12">
        <div class="center-align">
            <h2 class="header"><a name="projets">Projets</a></h2>



            <div class="row">

                <?php
                while($projet = $projets->fetch())
                {
                ?>
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= $projet['photo'] ?>">
                            <span class="card-title"><?= $projet['nom_projet'] ?></span>
                        </div>
                        <div class="card-content">
                            <p><?= $projet['descriptif'] ?></p>
                        </div>
                        <div class="card-action">
                            <a href="<?= $projet['lien'] ?>" target="_blanck">Lien github vers projet</a>
                        </div>
                    </div>
                </div>

                    <?php
                }
                ?>

            </div>
        </div>
    </div>

    <div class="divider"></div>
    <!-- Loisirs -->

    <div class="col s12" >
        <div class="center-align">
            <h2 class="header"><a name="loisirs">Loisirs</a></h2>


            <div class="card horizontal" >
                <div class="s12">
                    <div class="row" >

                        <?php
                        while($loisir = $loisirs->fetch())
                        {
                        ?>
                        <div class="col s12 m6"  >
                                <div class="card-content"  >
                                    <p><?= $loisir['nom'] ?><p>
                                </div>
                                <div class="row">
                                    <div class="col s8 m10">
                                        <div class="progress">
                                            <div class="determinate" style="width:<?= $loisir['niveau'] ?>%"></div>
                                        </div>
                                    </div>
                                    <div class="col s2 m2">
                                        <p><?= $loisir['niveau'] ?>%</p>
                                    </div>
                                </div>

                        </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="divider"></div>

    <!-- Contactes -->

    <div class="col s12" >
        <div class="center-align">
            <h2 class="header"><a name="contactes">Contactez-moi</a></h2>

            <div class="row">
                <form method="post" action="./admin/bdd.php" class="col s12">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="nom" type="text" class="validate" name="nom">
                            <label for="nom">Votre nom</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="prenom" type="text" class="validate" name="prenom">
                            <label for="prenom">Votre prénom</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="adresse_mail">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="objet" type="text" class="validate" name="objet">
                            <label for="objet">Objet</label>
                        </div>
                    </div>
                    <div class="row">
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="message" class="materialize-textarea" name="contenue"></textarea>
                                    <label for="message">Votre message</label>
                                </div>
                            </div>
                    </div>
                    <button class="btn waves-effect waves-light blue lighten-1" type="submit" name="save_mail">
                        <i class="material-icons right">Envoyer</i>
                    </button>

                </form>
            </div>

        </div>

    </div>


</div>

        <footer class="page-footer blue lighten-1">
            <div class="footer-copyright">
                <div class="container">
                    © 2019 Copyright Text
                </div>
            </div>
        </footer>

</body>
</html>