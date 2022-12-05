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
        ?>
    <header>
        <?php require "header.php"; ?>
    </header>

    <body>
        <div class="background_index">
        </div>
    </body>
    <footer><a href="https://github.com/nicolas-brement?tab=repositories"><img id="github" src="image/git.png"></a>
    </footer>
</html>

