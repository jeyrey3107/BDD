<?php 
    session_start();
    require_once 'config.php'; 

   if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }
    $i=0;
    $client=$bdd->query('SELECT*FROM utilisateurs');
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
<div>
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert">
                                <strong>Succès</strong> commande créée !
                            </div>
                        <?php
                        break;

                        case 'num_mois':
                        ?>
                            <div class="alert2 alert2-danger">
                                <strong>Erreur</strong> numéro de mois invalide
                            </div>
                        <?php
                        break;
                        case 'status':
                            ?>
                                <div class="alert2 alert2-danger">
                                    <strong>Erreur</strong> status non valide
                                </div>
                            <?php
                            break;
                        case 'points':
                        ?>
                            <div class="alert2 alert2-danger">
                                <strong>Erreur</strong> points non valides
                            </div>
                        <?php
                        break;

                        case 'apayer':
                        ?>
                            <div class="alert2 alert2-danger">
                                <strong>Erreur</strong> à payer non valide
                            </div>
                        <?php 
                        break;

                        case 'depot_total':
                        ?>
                            <div class="alert2 alert2-danger">
                                <strong>Erreur</strong> dépot total non non valide
                            </div>
                        <?php 
                        case 'total_commande':
                            ?>
                                <div class="alert2 alert2-danger">
                                    <strong>Erreur</strong> total de la commande non valide
                                </div>
                            <?php
                            break;
                            case 'referent':
                                ?>
                                    <div class="alert2 alert2-danger">
                                        <strong>Erreur</strong> référent non valide
                                    </div>
                                <?php
                                break;
                                case 'date':
                                    ?>
                                        <div class="alert2 alert2-danger">
                                            <strong>Erreur</strong> date non valide
                                        </div>
                                    <?php
                                    break;
                                    case 'num_commande':
                                        ?>
                                            <div class="alert2 alert2-danger">
                                                <strong>Erreur</strong> numéro de commande non valide
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
            
            <form action="" method="POST">    
                <?php $commande=$_POST['text'];?>
                <div>
                    <input type="num_commande" name="num_commande" value="<?= $_POST['text']?>" class="num_commande" placeholder="<?= $_POST['text']?>" required="required" autocomplete="off">
                </div>
                <div>
                    <input type="date" name="date" class="inser_date" placeholder="date" required="required" autocomplete="off">
                </div>
                <div>
                    <input type="referent" name="referent" class="referent" placeholder="référent" required="required" autocomplete="off">
                </div>
                <div>
                    <input type="total_commande" name="total_commande" class="total_commande" placeholder="total de la commande" required="required" autocomplete="off">
                </div>
                <div>
                    <input type="depot_total" name="depot_total" class="depot_total" placeholder="depot total" required="required" autocomplete="off">
                </div>
                <div>
                    <input type="apayer" name="apayer" class="inser_apayer" placeholder="à payer" required="required" autocomplete="off">
                </div>
                <div>
                    <input type="points" name="points" class="inser_points" placeholder="points" required="required" autocomplete="off">
                </div>
                <div>
                    <input type="status" name="status" class="inser_status" placeholder="status" required="required" autocomplete="off">
                </div>
                <div>
                    <input type="num_mois" name="num_mois" class="num_mois" placeholder="numéro dans le mois" required="required" autocomplete="off">
                </div>
                <div>
                    <button type="submit" class="btninsc btninsc-primary btninsc-block">Ajouter</button>
                </div>   
            </form>
        </div>
  </body> 
</html> 