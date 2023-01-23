<?php
require_once 'config.php';
echo $_POST['supprimer'];
$delete=$bdd->prepare('DELETE FROM commande WHERE numéroCommande="'.$_POST['supprimer'].'"');
$delete->execute();

header('Location:commandes.php');


?>