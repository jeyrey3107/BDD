<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">



            <link rel="stylesheet" href="connexion.css">
            <title>Connexion</title>
        </head>
        <body>
        
        <div>
             <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;
                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
            
            <form action="connexion.php" method="post">
                <div class="div">
                <h1>Connexion</h1>       
                <div>
                    <input type="email" name="email" class="searchbar0" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div>
                    <input type="password" name="password" class="searchbar1" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>
                </div>  
            </form>
        </div>
        </body>
</html>