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
    <link rel="stylesheet" href="commandes.css" />
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
        <form action="clients.php" class="command_form">
            <input type="submit" name="clients" id="clients" value="CLIENTS" class="client_button">
        </form>
        <input type="submit" name="commandes" id="commandes" value="COMMANDES" class="command_button">
    </div>
    <div>
        <?php
        if (isset($_GET['reg_err'])) {
            $err = htmlspecialchars($_GET['reg_err']);

            switch ($err) {
                case 'status':
        ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> le status doit ??tre parmis la liste suivante : "?? payer", "en pr??paration", "en livraison", "livr??"
                    </div>
                <?php
                    break;
                case 'points':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> le nombre de points doit etre ??gale au montant de la commande
                    </div>
                <?php
                    break;

                case 'apayer':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> le montant restant ?? payer doit ??tre ??gale ?? la diff??rence entre le prix totale et ce qui ?? ??t?? pay??
                    </div>
                <?php
                    break;

                case 'depot_total':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> le d??pot total ne doit pas d??passer le montant de la commande
                    </div>
                <?php
                    break;
                case 'already':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> commande deja existante
                    </div>
        <?php

            }
        }



        ?>
        <form action="addCommande_traitement.php" method="post">
            <div>
                <input type="text" name="num??roCommande" class="num_commande" placeholder="num??ro de commande" required="required">
            </div>
            <div>
                <input type="date" name="dateCommande" class="inser_date" placeholder="date" required="required">
            </div>
            <div>
                <input type="text" name="nomR??f??rent" class="referent" placeholder="r??f??rent" required="required">
            </div>
            <div>
                <input type="text" name="totalCommande" id="totalCommande" class="total_commande" placeholder="total de la commande" required="required">
            </div>
            <div>
                <input type="text" name="d??potTotal" id="d??potTotal" class="depot_total" placeholder="depot total" required="required">
            </div>
            <div>
                <input type="text" name="??Payer" class="inser_apayer" placeholder="?? payer" required="required">
            </div>
            <div>
                <input type="text" name="points" class="inser_points" placeholder="points" required="required">
            </div>
            <div>
                <input type="text" name="statusCommande" class="inser_status" placeholder="status" required="required">
            </div>
            <div>
                <input type="text" name="num??roMois" class="num_mois" placeholder="num??ro dans le mois" required="required">
            </div>
            <div>
                <input type="submit" name="addArticle" class="btnadd" value="Ajouter Article" required="required">
            </div>
            <div>
                <button type="submit" class="btninsc btninsc-primary btninsc-block">Ajouter</button>
            </div>
        </form>
    </div>
</body>

</html>