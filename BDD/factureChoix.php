<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user'])) {
    header('Location:index.php');
    die();
}
$i = 0;
$client = $bdd->query('SELECT*FROM commande');




/* 
        admin:
        id:test@test.fr
        mdp:test
*/ 
?>
<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="facture.css" />
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
    <form action="facture.php" method="POST">
        <div>
            <p class="indic">Saisissez l'id de la commande dont vous voulez générer la facture</p>
            <input type="text" name="numéroCommande" placeholder="numéro de la commande" class="id_saisie">
            <input type="text" name="idFacture" placeholder="identifiant de la facture" class="id_saisie">
            <input type="text" name="noFacture" placeholder="numéro de la facture à générer" class="id_saisie">
            <input type="text" name="fraisService" placeholder="montant des frais de services" class="id_saisie">
            <input type="text" name="promotion" placeholder="montant de la remise" class="id_saisie">
            <input type="submit" value="Générer" class="btn" required="required">
        </div>
    </form>    
</body>