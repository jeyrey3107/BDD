<?php 
    require_once 'config.php';

    if(isset($_POST['prenom'])&& isset($_POST['nom']) && isset($_POST['tel']) && isset($_POST['email']) && isset($_POST['facebook']) && isset($_POST['instagram']))
    {

        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $tel = htmlspecialchars($_POST['tel']);        
        $email = htmlspecialchars($_POST['email']);
        $facebook = htmlspecialchars($_POST['facebook']);
        $instagram = htmlspecialchars($_POST['instagram']);

     
        $check = $bdd->prepare('SELECT prenom,nom,tel,email,facebook,instagram FROM client WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); 
        if($row == 0){ 
            if(strlen($prenom) <= 100){
                if(strlen($nom) <= 100){
                if(strlen($tel) <= 15){  
                if(strlen($email) <= 100){ 
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ 
                        if(strlen($facebook) <= 100){ 
                            if(strlen($instagram) <= 100){
                        
                            
                           

                            
                            $insert = $bdd->prepare('INSERT INTO client(prenom,nom,tel,email,facebook,instagram) VALUES(:prenom,:nom,:tel,:email,:facebook,:instagram)');
                            $insert->execute(array(
                                'prenom' => $prenom,
                                'nom' => $nom,
                                'tel' => $tel,
                                'email' => $email,
                                'facebook' => $facebook,
                                'instagram' => $instagram,

                            ));
                            
                            header('Location:Clients.php?reg_err=success');
                            die();
                        }else{ header('Location: addClient.php?reg_err=instagram'); die();}
                    }else{ header('Location: addClient.php?reg_err=facebook'); die();}
                    }else{ header('Location: addClient.php?reg_err=email'); die();}
                }else{ header('Location: addClient.php?reg_err=email_length'); die();}
            }else{ header('Location: addClient.php?reg_err=tel'); die();}
            }else{ header('Location: addClient.php?reg_err=nom'); die();}
        }else{ header('Location: addClient.php?reg_err=prenom'); die();}
        }else{ header('Location: addClient.php?reg_err=already'); die();}
    }
?>