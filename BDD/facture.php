<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user'])) {
    header('Location:index.php');
    die();
}



if (isset($_POST['numéroCommande']) && isset($_POST['noFacture']) && isset($_POST['fraisService']) && isset($_POST['promotion']) && isset($_POST['idFacture'])) {
    $numéroCommande = htmlspecialchars($_POST['numéroCommande']);
    $noFacture = htmlspecialchars($_POST['noFacture']);
    $fraisService = htmlspecialchars($_POST['fraisService']);
    $promotion = htmlspecialchars($_POST['promotion']);
    $idFacture = htmlspecialchars($_POST['idFacture']);

    $totalCommande = $bdd->prepare("SELECT totalCommande FROM commande WHERE numéroCommande ='$numéroCommande' ");
    $totalCommande->execute(array($numéroCommande));
    $totalCommande = $totalCommande->fetch();
    $totalCommande= htmlspecialchars($totalCommande[0]);
    $dépotTotal = $bdd->prepare("SELECT dépotTotal FROM commande WHERE numéroCommande ='$numéroCommande' ");
    $dépotTotal->execute(array($numéroCommande));
    $dépotTotal = $dépotTotal->fetch();
    $dépotTotal= htmlspecialchars($dépotTotal[0]);
    $date = date("Y-m-d", (time()));
    $date= htmlspecialchars($date);


    $insert = $bdd->prepare("INSERT INTO facture(idFacture,noFacture,dateFacture,maj,fraisService,promotion,depot,montant,numéroCommande) VALUES('$idFacture','$noFacture','$date','$date','$fraisService','$promotion','$dépotTotal','$totalCommande','$numéroCommande')");
    $insert->execute(array());
    



    
   header('Location:commandes.php?');
    
    die();
}




?>
