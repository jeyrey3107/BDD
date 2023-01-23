<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user'])) {
    header('Location:index.php');
    die();
}
$i = 0;
$client = $bdd->query('SELECT*FROM utilisateurs');
$stock = $bdd->query('SELECT*FROM article');


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


        <div>
            <table class="table2" id="table">
                <tr>
                    <td class="id">id</td>
                    <td class="date">nom</td>
                    <td class="status">status</td>
                    <td class="Nmois">prix unitaire</td>
                    <td class="Nmois">nombre en stock</td>
                    <td class="modifsupp">nombre à ajouter/ ajouter</td>
                </tr>
                <?php while ($fiches = $stock->fetch()) { ?>
                    <tr class="ligne">
                        <td class="id"><?= $fiches['idArticle'] ?></td>
                        <td class="date"><?= $fiches['name'] ?></td>
                        <td class="status"><?= $fiches['statusArticle'] ?></td>
                        <td class="Nmois"><?= $fiches['prixUnitaire'] ?>€</td>
                        <td class="Nmois"><?= $fiches['nbArticle'] ?></td>

                        <td class="MF">
                            <form method="POST" action="gestionAddArticle.php">
                                <input type="text" name="nbArticle" class="nbadd">
                                <input type="text" value="<?= $fiches['idArticle'] ?>" class="caché" name="idArticle" hidden>
                                <input type="submit" name="ajouter" id="ajouter" class="add" value="+" />
                            </form>
                        </td>

                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>