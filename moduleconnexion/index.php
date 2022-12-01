<!DOCTYPE html>
<html>
    <head>
        <title>Site</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
        <?php
            $servername = 'localhost';
            $username = 'root';
            $password = 'root';
            $dbname = "moduleconnexion";
            
            //On établit la connexion
            $connexion = mysqli_connect($servername, $username, $password, $dbname);// connexion à la base de donnée
            
            //On vérifie la connexion
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
        ?>
    <header>
        <?php require "header.php"; ?>
    </header>

    <body>
        <div class="background_index">
        </div>

    </body>
</html>

