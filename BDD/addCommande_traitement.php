<?php
require_once 'config.php';

if (isset($_POST['numéroCommande']) && isset($_POST['dateCommande']) && isset($_POST['nomRéférent']) && isset($_POST['totalCommande']) && isset($_POST['dépotTotal']) && isset($_POST['àPayer']) && isset($_POST['points']) && isset($_POST['statusCommande']) && isset($_POST['numéroMois'])) {

    $numéroCommande = htmlspecialchars($_POST['numéroCommande']);
    $dateCommande = htmlspecialchars($_POST['dateCommande']);
    $nomRéférent = htmlspecialchars($_POST['nomRéférent']);
    $totalCommande = htmlspecialchars($_POST['totalCommande']);
    $dépotTotal = htmlspecialchars($_POST['dépotTotal']);
    $àPayer = htmlspecialchars($_POST['àPayer']);
    $points = htmlspecialchars($_POST['points']);
    $statusCommande = htmlspecialchars($_POST['statusCommande']);
    $numéroMois = htmlspecialchars($_POST['numéroMois']);
    $cli = $bdd->prepare('SELECT idClient FROM client WHERE prenom="' . $nomRéférent . '"');
    $cli->execute(array($nomRéférent));
    $idC = $cli->fetch();
    echo $idC[0];
    $idClient = htmlspecialchars($idC[0]);
    echo $idClient;




    $check = $bdd->prepare('SELECT numéroCommande,dateCommande,nomRéférent,totalCommande,dépotTotal,àPayer,points,statusCommande,numéroMois,idClient FROM commande WHERE numéroCommande = ?');
    $check->execute(array($numéroCommande));
    $data = $check->fetch();
    $row = $check->rowCount();

    if ($row == 0) {
        if (intval($dépotTotal) <= intval($totalCommande)) {
            if (intval($àPayer) == intval($totalCommande) - intval($dépotTotal)) {
                if (intval($points) == intval($totalCommande)) {
                    if ($statusCommande != "à payer" || $statusCommande != "en préparation" || $statusCommande != "en livraison" || $statusCommande != "livré") {




                        $insert = $bdd->prepare('INSERT INTO commande(numéroCommande,dateCommande,nomRéférent,totalCommande,dépotTotal,àPayer,points,statusCommande,numéroMois,idClient) VALUES("' . $numéroCommande . '","' . $dateCommande . '","' . $nomRéférent . '","' . $totalCommande . '","' . $dépotTotal . '","' . $àPayer . '","' . $points . '","' . $statusCommande . '","' . $numéroMois . '","' . $idClient . '")');
                        $insert->execute(array());


                        //echo $cli;   
                        header('Location:commandes.php?reg_err=success');
                        die();
                    } else {
                        header('Location: addCommande.php?reg_err=status');
                        die();
                    }
                } else {
                    header('Location: addCommande.php?reg_err=points');
                    die();
                }
            } else {
                header('Location: addCommande.php?reg_err=apayer');
                die();
            }
        } else {
            header('Location: addCommande.php?reg_err=depot_total');
            die();
        }
    } else {
        header('Location: addCommande.php?reg_err=already');
        die();
    }
}
