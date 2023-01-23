<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="connexion.css">
    <title>Inscription</title>
</head>

<body>
    <div>
        <?php
        if (isset($_GET['reg_err'])) {
            $err = htmlspecialchars($_GET['reg_err']);

            switch ($err) {
                case 'success':
        ?>
                    <div class="alert2 alert2-success">
                        <strong>Succès</strong> inscription réussie !
                    </div>
                <?php
                    break;

                case 'password':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> mot de passe différent
                    </div>
                <?php
                    break;

                case 'email':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> email non valide
                    </div>
                <?php
                    break;

                case 'email_length':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> email trop long
                    </div>
                <?php
                    break;

                case 'pseudo_length':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> pseudo trop long
                    </div>
                <?php
                case 'already':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> compte deja existant
                    </div>
        <?php

            }
        }
        ?>

        <form action="inscription_traitement.php" method="post">
            <h1 class="h1isc">Inscription</h1>
            <a href="index.php" class="lien"><- retour</a>
                    <div>
                        <input type="pseudo" name="pseudo" class="searchbar2" placeholder="Pseudo" required="required" autocomplete="off">
                    </div>
                    <div>
                        <input type="email" name="email" class="searchbar3" placeholder="Email" required="required" autocomplete="off">
                    </div>
                    <div>
                        <input type="password" name="password" class="searchbar4" placeholder="Mot de passe" required="required" autocomplete="off">
                    </div>
                    <div>
                        <input type="password" name="password_retype" class="searchbar5" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                    </div>
                    <div>
                        <button type="submit" class="btninsc btninsc-primary btninsc-block">Inscription</button>
                    </div>
        </form>
    </div>
</body>

</html>