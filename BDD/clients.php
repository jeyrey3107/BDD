<?php 
    session_start();
    require_once 'config.php'; 

   if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }
    $i=0;
    $client=$bdd->query('SELECT*FROM client');



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
    <form action="commandes.php"  class="command_form">
        <input type="submit" name="commandes" id="commandes" value="COMMANDES" class="command_button">
    </form>
</div>

    <table class="table2">
        <tr>
        <td class="id">id</td>
        <td class="prenom" ">prénom</td>
        <td class="nom" >nom</td>
        <td class="tel">tel</td>
        <td class="mail">mail</td>
        <td class="facebook" >facebook</td>
        <td class="instagrame">instagrame</td>
        </tr>
        <?php while($fiches=$client->fetch()) {?>
            <tr class="ligne">
            <td class="id" ><?= $fiches['idClient'] ?></td>
            <td class="prenom" ><?= $fiches['prenom']?></td>
            <td class="nom" ><?= $fiches['nom']?></td>
            <td class="tel" ><?= $fiches['tel']?></td>
            <td class="mail" > <?= $fiches['email']?></td>
            <td class="facebook" > <?= $fiches['facebook']?></td>
            <td class="instagrame" > <?= $fiches['instagram']?></td>
    </tr>
    <?php }?>
    </table>
    <form action="addClient.php">
        <input type="submit" value="Ajouter un client" class="btn" >
    </form>
  </body> 
</html> 