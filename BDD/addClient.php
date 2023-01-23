<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user'])) {
    header('Location:index.php');
    die();
}
$i = 0;
$client = $bdd->query('SELECT*FROM utilisateurs');
$stock = $bdd->query('SELECT*FROM gestion_stock');


/* 
        admin:
        id:test@test.fr
        mdp:test
        user:
        id:rem3107@orange.fr    
        mdp:123     
    */ ?>




<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="clients.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rancho&effect=neon">
    <meta charset="utf-8">
    <title>Table clients</title>
</head>


<body>
    <div class="bandeau">
        <p class="accueil">ACCUEIL</p>
        <p class="magasin">MAGASIN</p>
        <p class="gestion">GESTION</p>
        <div class="icones">
            <img src="heart.png" alt="coeur" class="coeur">
            <img src="shopping_cart.png" alt="panier" class="panier">
            <img src="message_square.png" alt="message" class="message">
        </div>
        <p class="name"> USER</p>
    </div>
    <img src="pp.png" alt="pp" class="pp">

    <div class="bandeau2">
        <input type="search" name="search" id="search" class="nav">
        <div class="icones2">
            <img src="Vector.png" alt="vector" class="vector">
            <img src="grid.png" alt="grid" class="grid">
            <img src="list.png" alt="list" class="list">
        </div>
    </div>

    <div class="bandeau3">
        <input type="button" name="clients" id="clients" value="CLIENTS" class="client_button">
        <form action="commandes.php" class="command_form">
            <input type="submit" name="commandes" id="commandes" value="COMMANDES" class="command_button">
        </form>
    </div>
    <div>
        <?php
        if (isset($_GET['reg_err'])) {
            $err = htmlspecialchars($_GET['reg_err']);

            switch ($err) {
                case 'success':
        ?>
                    <div class="alert">
                        <strong>Succès</strong> inscription réussie !
                    </div>
                <?php
                    break;

                case 'instagram':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> compte instagram non valide
                    </div>
                <?php
                    break;
                case 'facebook':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> compte facebook non valide
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

                case 'tel':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> tel non valide
                    </div>
                <?php
                case 'nom':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> nom trop long
                    </div>
                <?php
                    break;
                case 'prenom':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> prenom trop long
                    </div>
                <?php
                    break;
                case 'already':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> compte deja existant
                    </div>
        <?php

            }
        }
        ?>

        <form action="addClient_traitement.php" method="post">
            <h1 class="h1isc">Inscription</h1>
            <div>
                <input type="prenom" name="prenom" class="saisie_prenom" placeholder="Prénom" required="required" autocomplete="off">
            </div>
            <div>
                <input type="nom" name="nom" class="saisie_nom" placeholder="Nom" required="required" autocomplete="off">
            </div>
            <div>
                <input type="tel" name="tel" class="saisie_tel" placeholder="tel" required="required" autocomplete="off">
            </div>
            <div>
                <input type="email" name="email" class="saisie_mail" placeholder="Email" required="required" autocomplete="off">
            </div>
            <div>
                <input type="facebook" name="facebook" class="saisie_facebook" placeholder="Facebook" autocomplete="off">
            </div>
            <div>
                <input type="instagram" name="instagram" class="saisie_insta" placeholder="Instagram" autocomplete="off">
            </div>
            <div>
                <button type="submit" class="btninsc btninsc-primary btninsc-block">Ajouter</button>
            </div>
        </form>
    </div>
</body>

</html>