<?php 
    require_once 'config.php';
    
    if(isset($_POST['numéroCommande'])&& isset($_POST['date']) && isset($_POST['nomRéférent']) && isset($_POST['totalCommande']) && isset($_POST['dépotTotal']) && isset($_POST['àPayer']) && isset($_POST['points']) && isset($_POST['statusCommande']) && isset($_POST['numéroMois'])&& isset($_POST['idClient']))
    {

        $num_commande = htmlspecialchars($_POST['numéroCommande']);
        $date = htmlspecialchars($_POST['date']);
        $referent = htmlspecialchars($_POST['nomRéférent']);        
        $total_commande = htmlspecialchars($_POST['totalCommande']);
        $depot_total = htmlspecialchars($_POST['dépotTotal']);
        $apayer = htmlspecialchars($_POST['àPayer']);
        $points = htmlspecialchars($_POST['points']);
        $status = htmlspecialchars($_POST['statusCommande']);
        $num_mois = htmlspecialchars($_POST['numéroMois']);
        $idClient = htmlspecialchars($_POST['idClient']);
     
        $check = $bdd->prepare('SELECT numéroCommande,date,nomRéférent,totalCommande,dépotTotal,àPayer,points,statusCommande,numéroMois,idClient FROM commande WHERE numéroCommande = ?');
        $check->execute(array($num_commande));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 0){ 
            if(strlen($num_commande) <= 100){
                if(strlen($date) <= 100){
                if(strlen($referent) <= 30){  
                if(strlen($total_commande) <= 100){ 
                        if(strlen($depot_total) <= 100){ 
                            if(strlen($apayer) <= 100){
                                if(strlen($points) <= 100){
                                    if(strlen($status) <= 100){
                                        if(strlen($num_mois) <= 100){


                            
                            $insert = $bdd->prepare('INSERT INTO commande(numéroCommande,date,nomRéférent,totalCommande,dépotTotal,àPayer,points,statusCommande,numéroMois,idClient) VALUES(:numéroCommande,:date,:nomRéférent,:totalCommande,:dépotTotal,:àPayer,:points,:statusCommande,:numéroMois,:idClient)');
                            $insert->execute(array(
                                'numéroCommande' => $num_commande,
                                'date' => $date,
                                'nomRéférent' => $referent,
                                'totalCommande' => $total_commande,
                                'dépotTotal' => $depot_total,
                                'àPayer' => $apayer,
                                'points' => $points,
                                'statusCommande' => $status,
                                'numéroMois' => $num_mois,
                                'idClient' => $idClient,

                            ));
                            
                            header('Location:commandes.php?reg_err=success');
                            die();
                        }else{ header('Location: addCommande.php?reg_err=num_mois'); die();}
                    }else{ header('Location: addCommande.php?reg_err=status'); die();}
                    }else{ header('Location: addCommande.php?reg_err=points'); die();}
                }else{ header('Location: addCommande.php?reg_err=apayer'); die();}
            }else{ header('Location: addCommande.php?reg_err=depot_total'); die();}
            }else{ header('Location: addCommande.php?reg_err=total_commande'); die();}
        }else{ header('Location: addCommande.php?reg_err=referent'); die();}
        }else{ header('Location: addCommande.php?reg_err=date'); die();}
        }else{ header('Location: addCommande.php?reg_err=num_commande'); die();}  
        }else{ header('Location: addCommande.php?reg_err=already'); die();}
    }
?>