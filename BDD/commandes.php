<?php 
    session_start();
    require_once 'config.php'; 

   if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }
    $i=0;
    $client=$bdd->query('SELECT*FROM commande');
    $stock=$bdd->query('SELECT*FROM gestion_stock');


    /* 
        admin:
        id:test@test.fr
        mdp:test
        user:
        id:rem3107@orange.fr    
        mdp:123     
    */?>
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
<form action="clients.php"  class="command_form">
    <input type="submit" name="clients" id="clients" value="CLIENTS" class="client_button">
</form>
        <input type="submit" name="commandes" id="commandes" value="COMMANDES" class="command_button">
</div>
<table class="table2">
<tr>
        <td class="id">n°</td>
        <td class="date">date</td>
        <td class="ref" >référent</td>
        <td class="totcom">total commande</td>
        <td class="deptot">depot total</td>
        <td class="apayer" >à payer</td>
        <td class="points">points</td>
        <td class="status">status</td>
        <td class="Nmois">N° mois</td>
        <td class="modifsupp">modifier/
                                        supprimer</td>
        </tr>
        <?php while($fiches=$client->fetch()) {?>
            <tr class="ligne">
            <td class="id" ><?= $fiches['numéroCommande'] ?></td>
            <td class="date" ><?= $fiches['date']?></td>
            <td class="ref" ><?= $fiches['nomRéférent']?></td>
            <td class="totcom" ><?= $fiches['totalCommande']?></td>
            <td class="deptot" > <?= $fiches['dépotTotal']?></td>
            <td class="apayer" > <?= $fiches['àPayer']?></td>
            <td class="points" > <?= $fiches['points']?></td>
            <td class="status"><?= $fiches['statusCommande']?></td>
            <td class="Nmois"><?= $fiches['numéroMois']?></td>
            <td class="Nmois"><?= $fiches['idClient']?></td>
            <td class="MF">
                <form methode="POST" action="modifierCommande.php">
                <label for="modifier"><img src="modifier.png" alt="modifier" class="modif"/></label>
                <input type="submit" name="modifier" id="modifier" class="caché" hidden/>
                <input type="text" value="<?= $fiches['numéroCommande'] ?>" class="caché2" name="text" hidden>
                /
                <img src="bean.png" alt="supprimer" class="suppr"/>
                </form>
            </td>

    </tr>
    <?php }?>
    </table>
    <form action="addCommande.php">
        <input type="submit" value="Créer une commande" class="btn" >
    </form>

</body>