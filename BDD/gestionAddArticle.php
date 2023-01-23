<?php
require_once 'config.php';

if (isset($_POST['nbArticle']) && isset($_POST['idArticle'])) {

    $idArticle = htmlspecialchars($_POST['idArticle']);
    $nbArticle = htmlspecialchars($_POST['nbArticle']);



    $insert = $bdd->prepare('INSERT INTO envoie(idArticle) VALUES("' . $idArticle . '")');
    $insert->execute(array());


    //echo $cli;   
    header('Location:addCommande.php?');
    die();
}
