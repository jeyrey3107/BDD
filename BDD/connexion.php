<?php 
    session_start(); 
    require_once 'config.php'; 

    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        
        

        $check = $bdd->prepare('SELECT email, password FROM user WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        

    
        if($row ==1)
        {
          
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                
                if($data['password']===$password)
                {
                    
                    $_SESSION['user'] = $data['email'];
                    header('Location: Clients.php');
                    die();
                }else{ header('Location: index.php?login_err=password'); die(); }
            }else{ header('Location: index.php?login_err=email'); die(); }
        }else{ header('Location: index.php?login_err=already'); die(); }
    }else{ header('Location: index.php'); die();}
