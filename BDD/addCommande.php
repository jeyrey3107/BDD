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
                        <strong>Erreur</strong> le status doit être parmis la liste suivante : "à payer", "en préparation", "en livraison", "livré"
                    </div>
                <?php
                    break;
                case 'points':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> le nombre de points doit etre égale au montant de la commande
                    </div>
                <?php
                    break;

                case 'apayer':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> le montant restant à payer doit être égale à la différence entre le prix totale et ce qui à été payé
                    </div>
                <?php
                    break;

                case 'depot_total':
                ?>
                    <div class="alert2 alert2-danger">
                        <strong>Erreur</strong> le dépot total ne doit pas dépasser le montant de la commande
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
                <input type="text" name="numéroCommande" class="num_commande" placeholder="numéro de commande" required="required">
            </div>
            <div>
                <input type="date" name="dateCommande" class="inser_date" placeholder="date" required="required">
            </div>
            <div>
                <input type="text" name="nomRéférent" class="referent" placeholder="référent" required="required">
            </div>
            <div>
                <input type="text" name="totalCommande" id="totalCommande" class="total_commande" placeholder="total de la commande" required="required">
            </div>
            <div>
                <input type="text" name="dépotTotal" id="dépotTotal" class="depot_total" placeholder="depot total" required="required">
            </div>
            <div>
                <input type="text" name="àPayer" class="inser_apayer" placeholder="à payer" required="required">
            </div>
            <div>
                <input type="text" name="points" class="inser_points" placeholder="points" required="required">
            </div>
            <div>
                <input type="text" name="statusCommande" class="inser_status" placeholder="status" required="required">
            </div>
            <div>
                <input type="text" name="numéroMois" class="num_mois" placeholder="numéro dans le mois" required="required">
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